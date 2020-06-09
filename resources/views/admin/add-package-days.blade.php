@extends('admin/layout')

@section('title', ' | Add Package Days')

@section('pageCSS')   
 <!-- Select 2 -->
 <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection('pageCSS')

@section('content')

<div class="row">
    <div class="col-lg-12"> 
    <div class="card m-b-20">
   
    <div class="card-body">
   

    <h4 class="mt-0 header-title"> Add Package Days</h4>
    <p class="text-muted m-b-30 font-14"> Fill all information below </p>
   
    <form class="sh-grid m-b-30" method="POST" action="{{ route('package-days.store') }}"  enctype="multipart/form-data">
       {{ csrf_field() }}
    <div class="row">
    <div class="col-sm-4 bord-grid">
        <div class="form-group">
            <label for="courcename">Select Package</label>
            <select class="form-control" name="package" id="" required>
                @foreach($packageLists as $packageList)
                  <option value="{{ $packageList->id }}">{{ $packageList->name }}</option>
                @endforeach
            </select>
        </div> 
    </div>
    <div class="col-sm-4 bord-grid">
        <div class="form-group">
        <label for="courcename">Title</label>
        <input id="title" name="title" type="text" class="form-control" value="{{ old('title') }}" required> 
        </div> 
    </div>
    <div class="col-sm-4 bord-grid">
        <div class="form-group">
        <label for="courcedesc">Description</label>
        <textarea class="form-control" name="description" id="description" rows="1">{{ old('description') }}</textarea>
        </div>
    </div>
   
    <div class="col-sm-2 bord-grid">
    
    <div class="form-group">
    <label>Image</label> <br>
      <div class="custom-file">
       <input type="file" class="custom-file-input" id="image" name="packageDaysImage">
       <label class="custom-file-label btn-purple" for="customFile">Choose file</label>
     </div>
    <img src="/assets/images/products-list.jpg"  name="image" alt="product img"  class="img-fluid" style="width: 80px; height: 70px;">
    <br> 
    </div>
   
    </div>
   
    <div class="col-sm-2 bord-grid">
   
    <div class="form-group">
    <label for="price">Status</label>
               <select class="form-control" name="status" required="">
                                           <option>
                                               Select Status
                                           </option>
                                           <option value="1">Active</option>
                                           <option value="0">Inactive</option>
                                       </select>
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