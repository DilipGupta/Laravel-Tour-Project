<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\package_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class packageCategoriesController extends Controller
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
        return view('admin.show-package-categories',['package_category'=>package_categories::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-package-categories');
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
            'title'=>'required',
            'short_description'=>'required',
            'status'=>'required',
            'packageCategoryImage'=>'bail|required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        // Input::merge(array_map('trim', Input::all()));  You can automatically trim all input by using using this:

        $url=Str::lower(request('title'));
        $url=str_replace(' ','-',$url);

        $package_category=new package_categories();
        $package_category->title=request('title');
        $package_category->url=$url;
        $package_category->short_description=request('short_description');
        $package_category->status=request('status');

        if($request->hasFile('packageCategoryImage')){
            //Start Custome file name
            
            $file=$request->file('packageCategoryImage');
            $filename=Str::random().'.'.$file->getOriginalExtension();
            // $filename=$file->storeAs('packageCategoryImage', time(). '.' . $file->guessClientExtension());
            // $package_category->image=$filename;

            //End

            // $package_category->image=$request->file('packageCategoryImage')->store('packageCategoryImage');
            $destination_path=public_path('/assets/images/packageCategories/thumbnail');
            $img=Image::make($file->path());
            $img->resize(100,100, function($constraint){
                $constraint->aspectRatio();
            })->save($destination_path,$filename);

            $destination_path=public_path('/assets/images/packageCategories/');
            $file->move($destination_path,$filename);

            $package_category->image=$filename;

        }
        $package_category->save();

        $request->session()->flash('insertPackageCategory','Package category added successfully!');

        return redirect()->route('package-categories.index');

        
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
        return view('admin.edit-package-categories',['package_category'=>package_categories::findOrFail($id)]);
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
            'title'=>'required',
            'short_description'=>'required',
            'status'=>'required',
            // 'packageCategoryImage'=>'bail|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $url=Str::lower(request('title'));
        $url=str_replace(' ','-',$url);

        $package_category= package_categories::findOrFail($id);
        $package_category->url=$url;
        $package_category->title=$request->input('title');
        $package_category->short_description=$request->input('short_description');
        $package_category->status=$request->input('status');

        if($request->hasFile('packageCategoryImage')){
            $file=$request->file('packageCategoryImage');
            $filename=Str::random().'.'.$file->getClientOriginalExtension();
            $destination_path=public_path('/assets/images/packageCategories/thumbnail');
            $img=Image::make($file->path());
            $img->resize(100,100, function($constraint){
                $constraint->aspectRatio();
            })->save($destination_path.'/'.$filename);

            $destination_path=public_path('/assets/images/packageCategories/');
            $file->move($destination_path,$filename);
        }
        // else{
        //    $package_category->image=$request->input('packageCategoryImage');
        // }
        $package_category->save();

        $request->session()->flash('updatePackageCategory','Package category updated successfully!');

        return redirect()->route('package-categories.index');
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
