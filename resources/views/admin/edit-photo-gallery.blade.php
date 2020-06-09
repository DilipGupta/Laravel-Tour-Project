@extends('admin/layout')

@section('title', ' | Edit Photo Gallery')

@section('content')

<div class="card-body">
   

        <h4 class="mt-0 header-title"> Edit Photo Gallery</h4>
        <p class="text-muted m-b-30 font-14"> Fill all information below </p>

        <form class="sh-grid m-b-30" method="POST" action="{{ route('photo-gallery.update',['photo_gallery'=>$photoGallery->id]) }}"  enctype="multipart/form-data">
           @csrf
           @method('PATCH')

        <div class="row">
            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label>Photo Gallery Image</label> <br>
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" value="{{ $photoGallery->image }}" name="photoGalleryImage">
                    <label class="custom-file-label btn-purple" for="customFile">Choose file</label>
                    </div>
                    <img src="/assets/images/photo-gallery/{{ $photoGallery->image }}"  name="photoGalleryImage" alt="product img"  class="img-fluid" style="width: 80px; height: 70px;">
                    <br> 
                </div>
            </div>

            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label for="price">Status</label>
                    <select class="form-control" name="status" required>
                        <option value="1" @if($photoGallery->status==1)selected @endif>Active</option>
                        <option value="0" @if($photoGallery->status==0)selected @endif>Inactive</option>
                    </select>
                </div> 
            </div>
        </div>
                                          
        <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
        
        @if($errors->any())
        <div class="notificaiton is-danger">
           <ul>
           
           @foreach($errors->all() as $error)
           
           <li>{{ $error }}</li>
           
           
           @endforeach
           
           </ul>
       </div>
       
       @endif
       
        </form>
       
       
       
        </div>

@endsection('content')