@extends('/admin/layout')

@section('title', ' | Show Photo Gallery')

@section('pageCSS')   
 <!-- Select 2 -->
 <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
 
<div class="row">
 <div class="col-lg-12">
 <div class="card m-b-20">
 <div class="card-body">

 @if(session()->has('photoGalleryDeleted'))
   <p style="color:red">{{ session()->get('photoGalleryDeleted') }}</p>
 @endif

 @if(session()->has('photoGalleryInserted'))
 <p style="color:green">{{ session()->get('photoGalleryInserted') }}</p>
 @endif

 <h4 class="mt-0 header-title">Photo Gallery</h4>
@if(session()->has('photoGalleryUpdated'))
<p style="color:green">{{ session()->get('photoGalleryUpdated') }}</p>
@endif
 <a href="{{ url('/admin/photo-gallery/create') }}" class="btn btn-sm btn-primary m-b-20">Add New</a>
                                            
 <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
 <thead>
 <tr>
 <th>Id</th>
 <th>Image</th>
 <th>Status</th>
 <th>Action</th>
 </tr>
 </thead>

 <tbody>
                                    
@php
 $k=0;
@endphp

@foreach ($photoGalleries as $photoGallery)
@php
 $k++;
@endphp

 <tr>
 <td>{{ $k }}</td>
 <td><img src="/assets/images/photo-gallery/{{ $photoGallery->image }}" class="img-fluid" style="width:60px" alt=""></td>
 <td>@if($photoGallery->status==1) Active @else Inactive @endif</td>
 <td>
      <a href="{{ route('photo-gallery.edit', ['photo_gallery'=>$photoGallery->id]) }}"><input type="submit" value="Edit"></a>

    <form method="POST" onclick="return confirm('are you sure?')"  action="{{ route('photo-gallery.destroy', ['photo_gallery'=>$photoGallery->id]) }}">
      @csrf
      @method('DELETE')
   <a href=""><input type="submit" value="Delete"></a>
  </form>
 </td>  
 </tr> 
@endforeach
 </tbody>

 </table>
 </div>
 </div>
 </div> <!-- end col -->

 </div> <!-- end row -->











 

@endsection

@section('pageJS')

   
 @endsection








