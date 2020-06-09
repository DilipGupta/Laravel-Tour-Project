<?php

namespace App\Http\Controllers\admin;

use App\admin\testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class testimonialController extends Controller
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
        return view('admin.show-testimonial',['testimonials'=>testimonial::all()->where('status','=',1)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-testimonial');
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
            'name'=>'bail|required',
            'testimonial'=>'bail|required|max:500',
            'testimonialImage'=>'bail|required|mimes:jpg,jpeg,png',
            'status'=>'bail|required',
        ]);

        $testimonial=new testimonial();
        $testimonial->name=$request->input('name');
        $testimonial->testimonial=$request->input('testimonial');
        $testimonial->status=$request->input('status');

        if($request->hasFile('testimonialImage'))
        {
            $file=$request->file('testimonialImage');
            $filename=Str::random().'.'.$file->extension();
            $destination_path=public_path('/assets/images/testimonial/thumbnail');
            $img=Image::make($file->path());
            $img->resize(100,100, function($constrtaint){
                $constrtaint->aspectRatio();
            })->save($destination_path.'/'.$filename);

            $destination_path=public_path('/assets/images/testimonial/');
            $file->move($destination_path,$filename);
            $testimonial->image=$filename;

            $testimonial->save();
            $request->session()->flash('testimonialCreated','Testimnoial inserted successfully!');
            return redirect()->route('testimonial.index');

        }
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
        return view('admin.edit-testimonial',['testimonial'=>testimonial::findOrFail($id)]);
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
            'name'=>'bail|required',
            'testimonial'=>'bail|required',
            'status'=>'bail|required',
        ]);

        $testimonial=testimonial::findOrFail($id);
        $testimonial->name=$request->input('name');
        $testimonial->testimonial=$request->input('testimonial');
        $testimonial->status=$request->input('status');
        
        if($request->hasFile('testimonialImage')){
            unlink(public_path('/assets/images/testimonial/thumbnail/'.$testimonial->image));
            unlink(public_path('/assets/images/testimonial/'.$testimonial->image));
            $file=$request->file('testimonialImage');
            $filename=Str::random().'.'.$file->extension();
            $destination_path=public_path('/assets/images/testimonial/thumbnail');
            $img=Image::make($file->path());
            $img->resize(100,100, function ($constraint){
                $constraint->aspectRatio();
            })->save($destination_path.'/'.$filename);

            $destination_path=public_path('/assets/images/testimonial/');
            $file->move($destination_path,$filename);

            $testimonial->image=$filename;
        }else{
            $testimonial->image=$testimonial->image;
        }

        $testimonial->save();
        $request->session()->flash('testimonialUpdated','Testimnoial updated successfully!');
        return redirect()->route('testimonial.index');

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
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
