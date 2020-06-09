@extends('/admin/layout')

@section('title', ' | Show Package Categories')

@section('pageCSS')   
 <!-- Select 2 -->
 <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
 
<div class="row">
 <div class="col-lg-12">
 <div class="card m-b-20">
 <div class="card-body">

 @if(session()->has('updatePackageCategory'))
   <p style="color:green">{{ session()->get('updatePackageCategory') }}</p>
 @endif

 @if(session()->has('insertPackageCategory'))
 <p style="color:green">{{ session()->get('insertPackageCategory') }}</p>
 @endif

 <h4 class="mt-0 header-title">Enquiries</h4> 
 <p class="text-muted m-b-10 font-14"> Information table</p>

 <a href="{{ url('/admin/package-categories/create') }}" class="btn btn-sm btn-primary m-b-20">Add New</a>
                                            
 <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
 <thead>
 <tr>
 <th>Title</th>
 <th>Short Description</th>
 <th>Image</th>
 <th>Status</th>
 <th>Action</th>
 </tr>
 </thead>

 <tbody>
                                    
       
@foreach ($package_category as $showPackageCategoryDetail)

 <tr>
 <td>{{ $showPackageCategoryDetail->title }}</td>
 <td>{{ $showPackageCategoryDetail->short_description }}</td>
 <td><img src="{{ Storage::url($showPackageCategoryDetail->image) }}" class="img-fluid" style="width:60px" alt=""></td>
 <td>@if($showPackageCategoryDetail->status == 1) Active @else Inactive @endif</td>
 <td>
    {{-- <form method="POST" action="{{ route('show-package-categories.destroy', ['show_package_category'=>$showPackageCategoryDetail->id]) }}">
        @csrf
        @method('PUT') --}}
     <a href="{{ route('package-categories.edit',['package_category'=>$showPackageCategoryDetail->id]) }}"><input type="submit" value="Edit"></a>
    {{-- </form> --}}
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








