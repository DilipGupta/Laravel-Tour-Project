<!DOCTYPE html>
<html>
  <head>
    <title>Da Vacanza Holidays</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="img/favicon.png" type="image/gif"> 
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.css">
    <link rel="stylesheet" href="/fonts/fi/flaticon.css">
    <link rel="stylesheet" href="/css/flexslider.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/indent.css">
	<link rel="stylesheet" href="/fonts/stylesheet.css">
    <link rel="stylesheet" href="/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="/rs-plugin/css/layers.css">
    <link rel="stylesheet" href="/rs-plugin/css/navigation.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  </head>
  <style>
    #myerrid{
          background: #ccc;
    text-align: center;
    color: #f00;
    display: none;
    }
  </style>
  <body>
    <!-- header page-->
    <header>
      <!-- site top panel-->
      <div class="site-top-panel">
        <div class="container p-relative">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <!-- lang select wrapper-->
              <div class="top-left-wrap font-3">
                <div class="mail-top"><a href="mailto:Email"> <i class="flaticon-suntour-email"></i>Email</a></div><span>/</span>
                <div class="tel-top"><a href="tel:+91 Phone"> <i class="flaticon-suntour-phone"></i>+91 Phone</a></div>
              </div>
              <!-- ! lang select wrapper-->
            </div>
          </div>
        </div>
      </div>
      <!-- ! site top panel-->
      <!-- Navigation panel-->
      <nav class="main-nav js-stick">
        <div class="full-wrapper relative clearfix container">
          <!-- Logo ( * your text or image into link tag *)-->
          <div class="nav-logo-wrap local-scroll"><a href="index.php" class="logo"><img src="/img/logo.png" data-at2x="img/logo@2x.png" alt></a></div>
          <!-- Main Menu-->
          <div class="inner-nav desktop-nav" style="opacity: 1;">
            <ul class="clearlist magic-line-main">
              <li id="li1"><a class="{{ Request::is('/') ? 'active':'' }}" href="/.">Home</a></li>
              <li class="slash">/</li>
              <li id="li2" class="button_open"><a href="#" class="mn-has-sub {{ Request::is('package/*') ? 'active':'' }}">Packages <i class="fa fa-angle-down"></i></a>
                <ul class="mn-sub">

                  @foreach($packageCategories as $packageCategory)
                   {{-- Request::segment(2) it get url's second string  --}}
                   <li class="@if(Request::segment(2) == $packageCategory->url ) active @else  @endif"><a href="/package/{{ $packageCategory->url }}">{{ $packageCategory->title }}</a></li>  
                  @endforeach
                  {{-- <li><a href="international-packages.php">International Holidays</a></li>
                  <li><a href="holidays-in-india.php">Holidays In India</a></li>
                  <li><a href="gorup-packages.php">Group Packages</a></li>
                  <li><a href="pilgrim-packages.php">Pilgrim Packages</a></li> --}}
                  {{-- <li><a href="{{ route('international-holidays') }}">International Holidays</a></li>
                  <li><a href="{{ route('holidays-in-india') }}">Holidays In India</a></li>
                  <li><a href="{{ route('group-packages') }}">Group Packages</a></li>
                  <li><a href="{{ route('pilgrim-packages') }}">Pilgrim Packages</a></li> --}}
                </ul>
              </li>
              <li class="slash">/</li>
			  <li id="li3"><a class="{{ Request::is('about-us') ? 'active':'' }}" href="/about-us">About Us</a></li>
        <li class="slash">/</li>
        {{-- <li id="li3"><a href="testimonials">Testimonial</a></li> --}}
              {{-- <li class="slash">/</li> --}}
			  <li id="li4"><a class="{{ Request::is('gallery') ? 'active':'' }}" href="/gallery">Gallery</a></li>
              <li class="slash">/</li>
              <li id="li5"><a class="{{ Request::is('contact-us') ? 'active':'' }}" href="/contact-us">Contact Us</a></li>
              <li class="search"><a href="#" class="mn-has-sub" style="color:#fff !important;">Search</a>
                <ul class="search-sub">
                  <li>
                    <div class="container">
                      <div class="mn-wrap">
                        {{-- <form method="post" class="form">
                          <div class="search-wrap">
                            <input type="text" placeholder="Where will you go next?" autocomplete="off" id="packageName" class="form-control search-field" onblur="retPackage1(this)" onkeyup="retPackage(this)"><i class="flaticon-suntour-search search-icon"></i>
                          </div>
                        </form> --}}
                      </div>
                      <div class="close-button"><span>Search</span></div>
                    </div>
                  </li>
                </ul>
                
              </li>
              <!-- End Search-->
            </ul>
          </div>
          <!-- End Main Menu-->
        </div>
      </nav>
      <div class="area-list-container" id="area-list-container">
                             
                </div>
      @yield('breadcrumb')
    </header>
      <!-- End Navigation panel-->
                    {{-- @foreach($packageCategory as $packageCate)
                      {{ $packageCate }} 
                    @endforeach   --}}

@yield('content')


      <footer style="background-image: url('/pic/footer/footer-bg.jpg')" class="footer">
        <div class="container">
          <div class="row">
            <!-- widget footer-->
            <div class="col-md-7 col-sm-7">
              <div class="footer-about">
                  <!-- <p class="color-g2 mt-10">Vestibulum tincidunt venenatis scelerisque. Proin quis enim lacinia, vehicula massa et, mollis urna. Proin nibh mauris, blandit vitae convallis at, tincidunt vel tellus. Praesent posuere nec lectus non.</p> -->
                  <img src="/img/logo.png" alt="" class="footer-logo col-md-6">
                  <!-- social-->
                  <div class="social-link dark text-right col-md-6">
                      <a href="https://www.facebook.com/davacanzaholidays/" class="cws-social fa fa-facebook"></a><a href="https://twitter.com/DaVacanza" class="cws-social fa fa-twitter"></a><a href="https://www.instagram.com/davacanzaholidays/" class="cws-social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                  </div>
                  <!-- ! social-->
                  <br>
                  <div class="col-md-12 col-sm-12">
                      <div class="text-right footer-menu" style="border-bottom: 1px solid #fff;">
                        <a href="index.php" class="footer-nav">Home</a>
                        <a href="about-us.php" class="footer-nav">About Us</a>
                        {{-- <a href="testimonials.php" class="footer-nav">Testimonials</a> --}}
                        <a href="gallery.php" class="footer-nav">Gallery</a>
                        <a href="contact-us.php" class="footer-nav">Contact Us</a>
                      </div>
                      <p class="copyright-first"><br>© Copyright 2020 <span>XXXX XXXXXXXX</span> &nbsp;&nbsp;|&nbsp;&nbsp; All Rights Reserved.</p>
                      <p class="copyright-first">Designed &amp; Developed by <a href="http://www.transformingweb.com/">XXXXX XXXXXXXXX</a></p>
                  </div>
              </div>
            </div>
            <!-- ! widget footer-->
            <!-- widget footer-->
            <div class="col-md-4 col-sm-5 col-md-offset-right-1" style="background-color:#43a3b3;">
              <div class="widget-footer">
                  <ul class="contact-info">
                      <li><i class="flaticon-suntour-map fa"></i> office Address</li>
                      <li><i class="flaticon-suntour-map fa"></i> Personal Address</li>
                      <li><i class="flaticon-suntour-phone fa"></i> (+91) Phone 1</li>
                      <li><i class="flaticon-suntour-phone fa"></i> (+91) Phone 2</li>
                      <li><i class="fa fa-whatsapp" aria-hidden="true"></i> (+91) Whatsapp Number</li>
                      <li><i class="flaticon-suntour-email fa"></i> Email</li>
                  </ul>
              </div>
            </div>
            <!-- end widget footer-->
          </div>
        </div>
  
        <!-- copyright-->
        <div class="copyright"> 
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <p>© Copyright 2017 <span>Da Vacanza Holidays</span> &nbsp;&nbsp;|&nbsp;&nbsp; All Rights Reserved. Designed &amp; Developed by <a href="http://www.transformingweb.com/">Naseha Enterprises</a></p>
              </div>
            </div>
          </div>
        </div>
        <!-- end copyright-->
        <!-- scroll top-->
      </footer>
      <div id="scroll-top"><i class="fa fa-angle-up"></i></div>
  {{-- <script src="https://use.fontawesome.com/da5799a745.js"></script> --}}
  
  
  {{-- <script src="https://www.youtube.com/player_api"></script> --}}
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.js"></script>
  <script type="text/javascript" src="/js/owl.carousel.js"></script>
  <script type="text/javascript" src="/js/jquery.sticky.js"></script>
  <script type="text/javascript" src="/js/TweenMax.min.js"></script>
  <script type="text/javascript" src="/js/cws_parallax.js"></script>
  <script type="text/javascript" src="/js/jquery.fancybox.pack.js"></script>
  <script type="text/javascript" src="/js/jquery.fancybox-media.js"></script>
  <script type="text/javascript" src="/js/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="/js/imagesloaded.pkgd.min.js"></script>
  <script type="text/javascript" src="/js/masonry.pkgd.min.js"></script>
  <script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
  <script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
  <script type="text/javascript" src="/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
  <script type="text/javascript" src="/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
  <script type="text/javascript" src="/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
  <script type="text/javascript" src="/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
  <script type="text/javascript" src="/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
  <script type="text/javascript" src="/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
  <script type="text/javascript" src="/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
  <script type="text/javascript" src="/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
  <script type="text/javascript" src="/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="/js/jquery.form.min.js"></script>
  <script type="text/javascript" src="/js/script.js"></script>
  {{-- <script type="text/javascript" src="/js/bg-video/cws_self_vimeo_bg.js"></script> --}}
  {{-- <script type="text/javascript" src="/js/bg-video/jquery.vimeo.api.min.js"></script> --}}
  {{-- <script type="text/javascript" src="/js/bg-video/cws_YT_bg.js"></script> --}}
  <script type="text/javascript" src="/js/jquery.tweet.js"></script>
  <script type="text/javascript" src="/js/jquery.scrollTo.min.js"></script>
  <script type="text/javascript" src="/js/jquery.flexslider.js"></script>
  <script type="text/javascript" src="/js/retina.min.js"></script>
  
  <!--my live chat plugin-->
  {{-- <script type="text/javascript">function add_chatinline(){var hccid=81862008;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);} --}}
  {{-- add_chatinline(); </script> --}}

      