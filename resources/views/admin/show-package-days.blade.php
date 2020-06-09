@extends('/admin/layout')

@section('title', ' | Show Package Days')

@section('pageCSS')   
 <!-- Select 2 -->
 <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
 
<div class="row">
 <div class="col-lg-12">
 <div class="card m-b-20">
 <div class="card-body">

 @if(session()->has('packageDaysUpdated'))
   <p style="color:green">{{ session()->get('packageDaysUpdated') }}</p>
 @endif

 @if(session()->has('packageDaysCreated'))
 <p style="color:green">{{ session()->get('packageDaysCreated') }}</p>
 @endif

 @if(session()->has('packageDaysDeleted'))
 <p style="color:red">{{ session()->get('packageDaysDeleted') }}</p>
 @endif

 <h4 class="mt-0 header-title">Package</h4> 
 {{-- <p class="text-muted m-b-10 font-14"> Information table</p> --}}

 <a href="{{ url('/admin/package-days/create') }}" class="btn btn-sm btn-primary m-b-20">Add New</a>
                                            
 <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
 <thead>
 <tr>
<th>No.</th>
 <th>Package Name</th>
 <th>Title</th>
 <th>Description</th>
 <th>Image</th>
 <th>Status</th>
 <th>Action</th>
 </tr>
 </thead>

 <tbody>
                                    
@php
 $k=0;
@endphp
@foreach ($packageLists as $packageList)
@php
  $k++;
@endphp
 <tr>
 <td>{{ $k }}</td>
 <td>{{ $packageList->package_name }}</td>
 <td>{{ $packageList->title }}</td>
 <td>{{ $packageList->description }}</td>
 <td><img src="/assets/images/packageDaysImage/thumbnail/{{ $packageList->image }}" class="img-fluid" style="width:60px" alt=""></td>
 <td>@if($packageList->status == 1) Active @else Inactive @endif</td>
 <td>
    {{-- <form method="POST" action="{{ route('show-package.destroy', ['package'=>$packageList->id]) }}">
        @csrf
        @method('PUT') --}}
     <a href="{{ route('package-days.edit',['package_day'=>$packageList->id]) }}"><input type="submit" value="Edit"></a>
    {{-- </form> --}}
    <form method="POST" onclick="return confirm('are you sure?')" action="{{ route('package-days.destroy', ['package_day'=>$packageList->id]) }}">
        @csrf
        @method('DELETE')
        <a href=""><input type="submit" value="DELETE"></a>
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








