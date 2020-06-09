<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Holiday Admin  @yield('title')</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- C3 charts css -->
        <link href="/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />
		@yield('pageCSS')
        <!-- Basic Css files -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
          <link href="/assets/css/admin-custom.css" rel="stylesheet" type="text/css">
		
		
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="">
                        <!--<a href="index.html" class="logo text-center">Admiria</a>-->
                        <a href="/admin/dashbaord" class="logo"><img src="/assets/images/logo-sm.png" height="36" alt="logo"></a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <ul>

<li class="menu-title">Main Dashboard</li>

<li> <a href="/admin/package-categories" class="waves-effect"><i class="mdi mdi-cube-outline"></i><span>Package Categories </span></a> </li>
<li> <a href="/admin/package" class="waves-effect"><i class="mdi mdi-cube-outline"></i><span>Packages</span></a> </li>
<li> <a href="/admin/package-days" class="waves-effect"><i class="mdi mdi-cube-outline"></i><span>Add Packages Days</span></a> </li>
<li> <a href="/admin/photo-gallery" class="waves-effect"><i class="mdi mdi-cube-outline"></i><span>Photo Gallery</span></a> </li>
<li> <a href="/admin/enquiry" class="waves-effect"><i class="mdi mdi-cube-outline"></i><span>Enquiries </span></a> </li>




<li> <a href="/admin/testimonial" class="waves-effect"><i class="mdi mdi-cube-outline"></i><span>Testimonial </span></a> </li>

<li> <a href="/admin/change-password" class="waves-effect"><i class="mdi mdi-cube-outline"></i><span>Change Password</span></a> </li>

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->


            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">
                            <!-- Search input -->
                            <div class="search-wrap" id="search-wrap">
                                <div class="search-bar">
                                    <input class="search-input" type="search" placeholder="Search" />
                                    <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                        <i class="mdi mdi-close-circle"></i>
                                    </a>
                                </div>
                            </div>

   
                            <ul class="list-inline float-right mb-0">
                                
                                <!-- Fullscreen -->
                                <li class="list-inline-item dropdown notification-list hidden-xs-down">
                                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                        <i class="mdi mdi-fullscreen noti-icon"></i>
                                    </a>
                                </li>
                                <!-- language-->
                                
                                <!-- User-->
                                <li class="list-inline-item dropdown notification-list">
                                     <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    
                                </li>
                            </ul>

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Dashboard</h3>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">
                        	 @yield('content')
                        </div>

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2019 DSW <span class="text-muted d-none d-sm-inline-block float-right">Designed and Developed by Apex</span>
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/modernizr.min.js"></script>
        <script src="/assets/js/jquery.slimscroll.js"></script>
        <script src="/assets/js/waves.js"></script>
        <script src="/assets/js/jquery.nicescroll.js"></script>
        <script src="/assets/js/jquery.scrollTo.min.js"></script>

        <!-- Peity chart JS -->
        <script src="/plugins/peity-chart/jquery.peity.min.js"></script>

        <!--C3 Chart-->
        <script src="/plugins/d3/d3.min.js"></script>
        <script src="/plugins/c3/c3.min.js"></script>

        <!-- KNOB JS -->
        <script src="/plugins/jquery-knob/excanvas.js"></script>
        <script src="/plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Page specific js -->
        <script src="/assets/pages/dashboard.js"></script>
		@yield('pageJS')
          <!--Wysiwig js-->
           <!-- Required datatable js -->
        <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="/plugins/datatables/jszip.min.js"></script>
        <script src="/plugins/datatables/pdfmake.min.js"></script>
        <script src="/plugins/datatables/vfs_fonts.js"></script>
        <script src="/plugins/datatables/buttons.html5.min.js"></script>
        <script src="/plugins/datatables/buttons.print.min.js"></script>
        <script src="/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="/assets/pages/datatables.init.js"></script>

        <script src="/plugins/tinymce/tinymce.min.js"></script>
   <script>
            $(document).ready(function () {
                if($(".elm1").length > 0){
                    tinymce.init({
                        selector: "textarea.elm1",
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


        
        <!-- App js -->
        <script src="/assets/js/app.js"></script>

        <script>
            // Select2
            $(".select2").select2();
        </script>
        
         
		
    </body>
</html>