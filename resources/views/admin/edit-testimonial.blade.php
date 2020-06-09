@extends('admin/layout')

@section('title', ' | Edit Testimonial')

@section('content')

<div class="card-body">
   

        <h4 class="mt-0 header-title"> Edit Testimonial</h4>
        <p class="text-muted m-b-30 font-14"> Fill all information below </p>

        <form class="sh-grid m-b-30" method="POST" action="{{ route('testimonial.update',['testimonial'=>$testimonial->id]) }}"  enctype="multipart/form-data">
           @csrf
           @method('PATCH')

        <div class="row">
            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label>Testimonial Image</label> <br>
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" value="{{ $testimonial->image }}" name="testimonialImage">
                    <label class="custom-file-label btn-purple" for="customFile">Choose file</label>
                    </div>
                    <img src="/assets/images/testimonial/{{ $testimonial->image }}"  name="testimonialImage" alt="product img"  class="img-fluid" style="width: 80px; height: 70px;">
                    <br> 
                </div>
            </div>

            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input name="name" class="form-control" type="text" value="{{ $testimonial->name }}" required>
                </div>
            </div>

            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Testimonial</label>
                    <input name="testimonial" class="form-control" type="text" value="{{ $testimonial->testimonial }}" required>
                </div>
            </div>

            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label for="price">Status</label>
                    <select class="form-control" name="status" required>
                        <option value="1" @if($testimonial->status==1)selected @endif>Active</option>
                        <option value="0" @if($testimonial->status==0)selected @endif>Inactive</option>
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