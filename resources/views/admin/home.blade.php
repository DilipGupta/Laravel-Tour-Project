{{-- <p>Hi Admin Home</p> --}}
@extends('/admin/layout')

@section('title', ' | DashBoard')

@section('pageCSS')   
 <!-- Select 2 -->
 <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

{{ Cookie::get('adminEmail') }}
{{ Cookie::get('adminPass') }}

 

@endsection

@section('pageJS')

   
 @endsection








