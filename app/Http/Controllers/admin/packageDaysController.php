<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\package;
use App\packageDays;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class packageDaysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packageList=DB::table('packages')
                     ->join('package_days','packages.id','=','package_days.package_id')
                     ->select('packages.name as package_name','package_days.*')
                     ->where('packages.status',true)
                     ->orderBy('package_days.id','desc')
                     ->get();
        //  dd($packageList);
        return view('admin.show-package-days',['packageLists'=>$packageList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-package-days',['packageLists'=>package::all()->where('status','=',1)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'package'=>'bail|required',
            'title'=>'bail|required',
            'description'=>'bail|required',
            'status'=>'bail|required',
            'packageDaysImage'=>'bail|required|mimes:jpg,jpeg,gif'
        ]);

        $packageDays=new packageDays();
        $packageDays->package_id=$request->input('package');
        $packageDays->title=$request->input('title');
        $packageDays->description=$request->input('description');
        $packageDays->status=$request->input('status');

        if($request->hasFile('packageDaysImage')){
            $file=$request->file('packageDaysImage');
            $filename=Str::random().'.'.$file->getClientOriginalExtension();
            $destination_path=public_path('/assets/images/packageDaysImage/thumbnail');            

            $img=Image::make($file->path());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination_path.'/'.$filename);

            $destination_path=public_path('/assets/images/packageDaysImage/');
            $file->move($destination_path,$filename);

            $packageDays->image=$filename;
        }
        $packageDays->save();

        $request->session()->flash('packageDaysCreated','Package day added successfully!');
        return redirect()->route('package-days.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit-package-days',['packageId'=>$id,'packageLists'=>package::all()->where('status','=',1),'packageDays'=>packageDays::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'package'=>'bail|required',
            'title'=>'bail|required',
            'status'=>'bail|required',
            // 'packageDaysImage'=>'bail|required|mimes:jpg,jpeg,gif'
        ]);
        
        
        $packageD=packageDays::findOrFail($id);
        $packageD->package_id=$request->input('package');
        $packageD->title=$request->input('title');
        $packageD->description=$request->input('description');
        $packageD->status=$request->input('status');

        if($request->hasFile('packageDaysImage')){
            request()->validate([
                'packageDaysImage'=>'bail|required|mimes:jpg,jpeg,gif'
            ]);
            $file=$request->file('packageDaysImage');
            $filename=Str::random().'.'.$file->getClientOriginalExtension();
            $destination_path=public_path('/assets/images/packageDaysImage/thumbnail');            

            $img=Image::make($file->path());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination_path.'/'.$filename);

            $destination_path=public_path('/assets/images/packageDaysImage/');
            $file->move($destination_path,$filename);

            $packageD->image=$filename;
        }
        $packageD->save();

        $request->session()->flash('packageDaysUpdated','Package day updated successfully!');
        return redirect()->route('package-days.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $packageDay=packageDays::findOrFail($id);
        unlink(public_path('/assets/images/packageDaysImage/thumbnail/').$packageDay->image);
        unlink(public_path('/assets/images/packageDaysImage/').$packageDay->image);
        $packageDay->delete();
        $request->session()->flash('packageDaysDeleted','Package day deleted successfully!');
        return redirect()->route('package-days.index');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
