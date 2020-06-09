@extends('/admin/layout')

@section('title', ' | Enquries')

@section('pageCSS')   
 <!-- Select 2 -->
 <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
 
<div class="row">
 <div class="col-lg-12">
 <div class="card m-b-20">
 <div class="card-body">

 @if(session()->has('enquiryDelete'))
   <p style="color:green">{{ session()->get('enquiryDelete') }}</p>
 @endif

 <h4 class="mt-0 header-title">Enquiries</h4> 
 <p class="text-muted m-b-10 font-14"> Information table</p>

 {{-- <a href="{{ url('/admin/enquiry/create') }}" class="btn btn-sm btn-primary m-b-20">Add New</a> --}}
                                            
 <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
 <thead>
 <tr>
 <th>Place</th>
 <th>Date</th>
 <th>Duration</th>
 <th>Contact No.</th>
 <th>Email</th>
 <th>Action</th>
 </tr>
 </thead>

 <tbody>
                                    
       
@foreach ($enquiryDetails as $enquiryDetail)

 <tr>
 <td>{{ $enquiryDetail->place }}</td>
 <td>{{ $enquiryDetail->date }}</td>
 <td>{{ $enquiryDetail->duration }}</td>
 <td>{{ $enquiryDetail->contact_no }}</td>
 <td>{{ $enquiryDetail->email }}</td>
 <td>
    <form method="POST" action="{{ route('enquiry.destroy',['enquiry'=>$enquiryDetail->id]) }}">
        @csrf
        @method('DELETE')
     <input type="submit" onclick="return confirm('Are you sure?')"  value="Delete">
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








