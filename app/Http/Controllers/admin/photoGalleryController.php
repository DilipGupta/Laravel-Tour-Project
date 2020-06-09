<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\photo_gallery;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class photoGalleryController extends Controller
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
        return view('admin.show-photo-gallery',['photoGalleries'=>photo_gallery::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-photo-gallery');
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
            'photoGalleryImage.*'=>'bail|required|mimes:jpg,jpeg'
        ]);
        
        if($request->hasFile('photoGalleryImage'))
        {
            // $allowedfileExtension=['jpeg','jpg','png'];
            $files=$request->file('photoGalleryImage');
            
            foreach($files as $file)
            {
                $photoGallery=new photo_gallery();

                // $filename = $file->getClientOriginalName();
                // $extension = $file->getClientOriginalExtension();
                // $check=in_array($extension,$allowedfileExtension);

                $filename=Str::random().'.'. $file->extension();
                
                $destination_path=public_path('/assets/images/photo-gallery/thumbnail');
                $img = Image::make($file->path());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destination_path.'/'.$filename);

                $destination_path=public_path('/assets/images/photo-gallery');
                $file->move($destination_path,$filename);
                
                $photoGallery->image=$filename;
                $photoGallery->status=$request->input('status');
                $photoGallery->save();
                
            }
            $request->session()->flash('photoGalleryInserted','All images uploaded successfully!');
            return redirect()->route('photo-gallery.index');
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
        return view('admin.edit-photo-gallery',['photoGallery'=>photo_gallery::findOrFail($id)]);
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
        $photoGallery=photo_gallery::findOrFail($id);
        $file=$request->file('photoGalleryImage');

        if($file)
        {
            $imageFind=photo_gallery::findOrFail($id);
            $img=$imageFind->image;
            if($imageFind){
                unlink(public_path('/assets/images/photo-gallery/thumbnail/') . $imageFind->image);
                unlink(public_path('/assets/images/photo-gallery/') . $imageFind->image);

                $filename=Str::random().'.'. $file->getClientOriginalExtension();
                $destination_path=public_path('/assets/images/photo-gallery/thumbnail');
                $img=Image::make($file->path());
                $img->resize(100,100,function($constraint){
                    $constraint->aspectRatio();
                })->save($destination_path.'/'.$filename);

                $destination_path=public_path('/assets/images/photo-gallery/');
                $file->move($destination_path,$filename);

                $photoGallery->image=$filename;
                $photoGallery->status=$request->input('status');
                $photoGallery->save(); 
            }
        }
        $request->session()->flash('photoGalleryUpdated','Photo gallery updated successfully!');
        return redirect()->route('photo-gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $photoGallery=photo_gallery::findOrFail($id);
        unlink(public_path('/assets/images/photo-gallery/thumbnail/').$photoGallery->image);
        unlink(public_path('/assets/images/photo-gallery/').$photoGallery->image);
        $photoGallery->delete();
        $request->session()->flash('photoGalleryDeleted','Image deleted successfully!');
        return redirect()->route('photo-gallery.index');
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
