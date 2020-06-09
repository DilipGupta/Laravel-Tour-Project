@extends('/admin/layout')

@section('title', ' | Show Package')

@section('pageCSS')   
 <!-- Select 2 -->
 <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
 
<div class="row">
 <div class="col-lg-12">
 <div class="card m-b-20">
 <div class="card-body">

 @if(session()->has('packageUpdated'))
   <p style="color:green">{{ session()->get('packageUpdate') }}</p>
 @endif

 @if(session()->has('packageCreated'))
 <p style="color:green">{{ session()->get('packageCreated') }}</p>
 @endif

 <h4 class="mt-0 header-title">Package</h4> 
 {{-- <p class="text-muted m-b-10 font-14"> Information table</p> --}}

 <a href="{{ url('/admin/package/create') }}" class="btn btn-sm btn-primary m-b-20">Add New</a>
                                            
 <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
 <thead>
 <tr>
 <th>Name</th>
 <th>Duration</th>
 <th>Price</th>
 <th>Description</th>
 <th>Image</th>
 <th>Status</th>
 <th>Action</th>
 </tr>
 </thead>

 <tbody>
                                    
       
@foreach ($package as $showPackageDetail)

 <tr>
 <td>{{ $showPackageDetail->name }}</td>
 <td>{{ $showPackageDetail->duration }}</td>
 <td>{{ $showPackageDetail->price }}</td>
 <td>{{ $showPackageDetail->description }}</td>
 <td><img src="/assets/images/packageImage/thumbnail/{{ $showPackageDetail->image }}" class="img-fluid" style="width:60px" alt=""></td>
 <td>@if($showPackageDetail->status == 1) Active @else Inactive @endif</td>
 <td>
    {{-- <form method="POST" action="{{ route('show-package.destroy', ['package'=>$showPackageDetail->id]) }}">
        @csrf
        @method('PUT') --}}
     <a href="{{ route('package.edit',['package'=>$showPackageDetail->id]) }}"><input type="submit" value="Edit"></a>
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








