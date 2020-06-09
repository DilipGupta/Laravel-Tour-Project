@extends('/admin/layout')

@section('title', ' | Change Password')

@section('pageCSS')   
 <!-- Select 2 -->
 <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection('pageCSS')

@section('content')

<div class="row">
    <div class="col-lg-12"> 
    <div class="card m-b-20">
   
    <div class="card-body">
        
    <h4 class="mt-0 header-title">Change Password</h4>
    <p class="text-muted m-b-30 font-14"> Fill all information below </p>
    @if(session()->has('currentPasswordCheck'))
      <p style="background:red;color:#fff;padding:8px 15px;">{{ session()->get('currentPasswordCheck') }}</p>
    @endif
    <form class="sh-grid m-b-30" method="POST" action="{{ route('change-password.update',['change_password'=>Auth::user()->id]) }}"  enctype="multipart/form-data">
       {{ csrf_field() }}
       @method('PUT')
    <div class="row">
    <div class="col-sm-4 bord-grid">
        <div class="form-group">
        <label for="current_password">Current Password</label>
        <input id="current_password" name="current_password" type="password" class="form-control" value="{{ old('current_password') }}" required> 
        </div> 
    </div>
    <div class="col-sm-4 bord-grid">
        <div class="form-group">
        <label for="password">New Password</label>
        <input id="password" name="password" type="password" class="form-control" value="{{ old('password') }}" required> 
        </div> 
    </div>
    <div class="col-sm-4 bord-grid">
        <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" value="{{ old('password_confirmation') }}" required> 
        </div> 
    </div>
   
    </div>                                    
   
    <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
    <button type="submit" class="btn btn-secondary waves-effect">Cancel</button>
    
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

@section('pageJS')
 
        <!-- jQuery  -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/modernizr.min.js"></script>
        <script src="/assets/js/jquery.slimscroll.js"></script>
        <script src="/assets/js/waves.js"></script>
        <script src="/assets/js/jquery.nicescroll.js"></script>
        <script src="/assets/js/jquery.scrollTo.min.js"></script>

        <!-- select2 js -->
        <script src="/plugins/select2/js/select2.min.js"></script>
        
         <!--Wysiwig js-->
        <script src="/plugins/tinymce/tinymce.min.js"></script>
        <!-- App js -->
        <script src="/assets/js/app.js"></script>

        <script>
            // Select2
            $(".select2").select2();
        </script>


        <script>
            $(document).ready(function () {
                if($("#elm1").length > 0){
                    tinymce.init({
                        selector: "textarea#elm1",
                        theme: "modern",
                        height:300,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                        style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ]
                    });
                }
            });
        </script>
   
 @endsection