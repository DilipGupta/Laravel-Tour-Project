<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\package;
use App\package_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class packageController extends Controller
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
        return view('admin.show-package',['package'=>package::orderBy('id','desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-packages',['package_category'=>package_categories::all('id','title')]);
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
            'category'=>'bail|required',
            'package_name'=>'bail|required',
            'location'=>'bail|required',
            'duration'=>'bail|required',
            'price'=>'bail|required',
            'offer'=>'bail|required',
            'description'=>'bail|required',
            'inclusion'=>'bail|required',
            'exclusion'=>'bail|required',
            'others'=>'bail|required',
            'packageImage'=>'bail|required|mimes:jpg,jpeg,png|max:1024',
            'status'=>'bail|required',

        ]);

        $package=new package();
        $package->category_Id=$request->input('category');
        $package->name=$request->input('package_name');
        $package->location=$request->input('location');
        $package->duration=$request->input('duration');
        $package->price=$request->input('price');
        $package->offer=$request->input('offer');
        $package->description=$request->input('description');
        $package->inclusion=$request->input('inclusion');
        $package->exclusion=$request->input('exclusion');
        $package->others=$request->input('others');
        $package->status=$request->input('status');

        if($request->hasFile('packageImage')){
            $package->image=$request->file('packageImage')->store('packageImage');
        }
        $package->save();

        $request->session()->flash('packageCreated','Package added successfully!');
        return redirect()->route('package.index');
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
        return view('admin.edit-package',['package_category'=>package_categories::all(),'package'=>package::findOrFail($id)]);
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
            'category'=>'bail|required',
            'package_name'=>'bail|required',
            'location'=>'bail|required',
            'duration'=>'bail|required',
            'price'=>'bail|required',
            'offer'=>'bail|required',
            'description'=>'bail|required',
            'inclusion'=>'bail|required',
            'exclusion'=>'bail|required',
            'others'=>'bail|required',
            'packageImage'=>'bail|mimes:jpg,jpeg,png|max:1024',
            'status'=>'bail|required',

        ]);

        $package=package::findOrFail($id);
        $package->category_Id=$request->input('category');
        $package->name=$request->input('package_name');
        $package->location=$request->input('location');
        $package->duration=$request->input('duration');
        $package->price=$request->input('price');
        $package->offer=$request->input('offer');
        $package->description=$request->input('description');
        $package->inclusion=$request->input('inclusion');
        $package->exclusion=$request->input('exclusion');
        $package->others=$request->input('others');
        $package->status=$request->input('status');

        if($request->hasFile('packageImage')){
            // $file=$package->image;
            // if(Storage::exists($file))
            // {
            //   Storage::delete($file);
            // }
            // $package->image=$request->file('packageImage')->store('packageImage');
            // $imageFind=$package->image;
            // if($imageFind){
            //     unlink(public_path('/assets/images/packageImage/thumbnail/') . $imageFind);
            //     unlink(public_path('/assets/images/packageImage/') . $imageFind);
            // }

            $file=$request->file('packageImage');
            $filename=Str::random().'.'.$file->getClientOriginalExtension();
            $destination_path=public_path('/assets/images/packageImage/thumbnail');
            $img=Image::make($file->path());
            $img->resize(100,100, function($constraint){
                $constraint->aspectRatio();
            })->save($destination_path.'/'.$filename);

            $destination_path=public_path('/assets/images/packageImage/');
            $file->move($destination_path,$filename);

            $package->image=$filename;

        }else
        {
            $package->image;
        }
        $package->save();
        // dd($package);

        $request->session()->flash('packageUpdated','Package updated successfully!');
        return redirect()->route('package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

            /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('admins');
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
