@extends('layout')

@section('content')

<div class="content-body">
    <div class="tp-banner-container">
      <div class="tp-banner-slider">
        <ul>
            <li data-masterspeed="700" data-slotamount="7" data-transition="fade"><img src="rs-plugin/assets/loader.gif" data-lazyload="pic/slider/main/S0-wonders-of-ladakh-1.jpg" data-bgposition="center" alt="" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10">
                <div data-x="['center','center','center','center']" data-y="center" data-transform_in="x:-150px;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="x:150px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="400" class="tp-caption sl-content">
                  <div class="sl-title-top">Welcome to</div>
                    <div class="sl-title">Ladakh</div>
                  <div class="sl-title-bot"><a href="packages-details.php?id=1" class="sbtn">Package Detail</a></div>
                </div>
            </li> 
          </ul>
      </div>
   
      <!-- search tours form-->
      <div class="search-tours-form">
        <div class="container">
          <div class="search-tours-wrap">
            <div class="search-tours-content">
              <div data-tours-cat="tab-cat-1" class="tours-container active">
                <div class="tours-box">
                  <div class="tours-search">
                    @if(session()->has('getQuote'))
                      <p id="color:green">{{ session()->get('getQuote') }}</p>
                    @endif
                    <form method="POST" action="{{ route('store') }}" class="form search divider-skew">
                      @csrf
                      <div class="search-wrap">
                        <input type="text" placeholder="I want to go to" class="form-control search-field" id="place" value="{{ old('place') }}" name="place" onkeyup="limitlength(this,100)"><i class="flaticon-suntour-map search-icon"></i>
                      </div>
                    
                    <div class="tours-calendar divider-skew"> 
                      <input placeholder="Date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="date" value="{{ old('date') }}" class="calendar-default textbox-n" id="date1"><i class="flaticon-suntour-calendar calendar-icon"></i>
                    </div>
                  
                    <div class="tours-calendar divider-skew"> 
                      <input placeholder="Duration" type="text" class="calendar-default textbox-n" name="duration" value="{{ old('duration') }}" id="duration"><i class="fa fa-clock-o calendar-icon"></i>
                    </div>
                    <div class="tours-calendar divider-skew"> 
                      <input placeholder="Mobile No." type="text" class="calendar-default textbox-n" name="contact_no" value="{{ old('contact_no') }}" id="mobile" onkeyup="limitlength(this,14)"><i class="flaticon-suntour-phone calendar-icon"></i>
                    </div> 
                    <div class="tours-calendar divider-skew"> 
                      <input placeholder="Email ID" type="text" class="calendar-default textbox-n" name="email" value="{{ old('email') }}" id="emailid" onkeyup="limitlength(this,30)"><i class="flaticon-suntour-email calendar-icon"></i>
                    </div>
                    {{-- <div class="button-search" id="submitButton" onclick="submitDetail()">GET QUOTES</div> --}}
                    {{-- <div class="button-search" id="submitButton" type="submit">GET QUOTES</div> --}}
                    <button class="button-search" id="submitButton" type="submit">GET QUOTES</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @if(session()->has('quote_status'))
         <p style="color:green">
            {{ session()->get('quote_status') }}
         </p>
        @endif
      <p id="myerrid" >hi this is my error!</p>
      </div>
      <!-- ! search tours form-->
    </div>

    
      {{-- @foreach($packageCategory as $packageCate)
      <p>{{ $packageCategory->first()->packages->first()->name }}</p>
      @endforeach --}}

          @foreach($packageCategories as $packageCategory)
          {{-- @foreach($packages as $package) --}}
          <section class="page-section-c">
            <div class="container">
              <div class="row">
                <div class="col-md-2">
                    <img src="http://holiday.test/storage/{{ $packageCategory->image }}" data-at2x="http://holiday.test/storage/{{ $packageCategory->image }}" alt class="mt-md-0 mt-minus-20">
                    {{-- <img src="{{ Storage::url($packageCategory->image) }}" data-at2x="{{ Storage::url($packageCategory->image) }}" alt class="mt-md-0 mt-minus-20"> --}}
                </div>
                <div class="col-md-8 col-md-offset-right-2">
                  <h6 class="title-section-top font-4">Special offers</h6>
                  <h2 class="title-section">{{ $packageCategory->title }}</h2>
                  {{-- <h2 class="title-section">{{ $packageCategory->title }}</h2>--}}
                  <div class="cws_divider mb-25 mt-5"></div>
                  {{-- <p class="mb-50">An occasion in an outside land is an everlasting memory.</p> --}}
                  <p class="mb-50">{{ $packageCategory->short_description }}</p>
                </div>
              </div>
            </div>
            
            <div class="features-tours-full-width">
              <div class="features-tours-wrap clearfix">
                <div class="owl-four-item">
                  @foreach($packages as $package)
                    @if($package->category_id==$packageCategory->id)
                    <div class="testimonial-item">
                        <div class="features-tours-item">
                          <div class="features-media">
                            <a href="packages-details.php?id=1">
                                <img src="/assets/images/packageImage/{{ $package->image }}" alt>
                            </a>
                            <div class="features-info-top">
                              <div class="info-price font-4"><span>start at</span> &#8377;{{ $package->price }}</div>
                            </div>
                            <div class="features-info-bot">
                              <a href="packages-details.php?id=1"><h4 class="title"><span class="font-4">{{ $package->name }}</span> {{ $package->location }}</h4></a><a href="package/{{ $packageCategory->url }}/detail/{{ $package->id }}" class="button">Details</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
               </div>
             </div>
           </div>
           
          </section>
          <!-- ! page section-->

          @endforeach

      <!-- counter section -->
      <section class="small-section">
        <div class="container">
          <div class="row">
            <div class="col-md-2 col-xs-6 mb-md-30">
              <div class="counter-block"><i class="counter-icon flaticon-suntour-world"></i>
                <div class="counter-name-wrap">
                  <div data-count="115" class="counter">0</div>
                  <div class="counter-name">Tours</div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-xs-6 mb-md-30">
              <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-fireworks"></i>
                <div class="counter-name-wrap">
                  <div data-count="85" class="counter">0</div>
                  <div class="counter-name">Holidays</div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-xs-6 mb-md-30">
              <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-hotel"></i>
                <div class="counter-name-wrap">
                  <div data-count="250" class="counter">0</div>
                  <div class="counter-name">Hotels</div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-xs-6 mb-md-30">
              <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-ship"></i>
                <div class="counter-name-wrap">
                  <div data-count="10" class="counter">0</div>
                  <div class="counter-name">Cruises</div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-xs-6">
              <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-airplane"></i>
                <div class="counter-name-wrap">
                  <div data-count="45" class="counter">0</div>
                  <div class="counter-name">Flights</div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-xs-6">
              <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-car"></i>
                <div class="counter-name-wrap">
                  <div data-count="140" class="counter">0</div>
                  <div class="counter-name">Cars</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ! counter section-->

      <!-- page section parallax-->
      <section class="small-section cws_prlx_section bg-gray-40"><img src="pic/parallax-1.jpg" alt class="cws_prlx_layer">
        <div class="container">
          <div class="row">
            <div class="col-md-5 color-yellow">
              <h2 class="title-section-top alt">About</h2>
              <h2 class="title-section alt mb-20">Da Vacanza Holidays</h2>
              <p class="color-white">Da vacanza holidays is traveller‘s craftsman, we craft every plan uniquely to meet the expectation of traveller and that make us different from others.<br>
At Da vacanza, our resources and our network of partners, combined with our carefully selected destinations provide the means to pursue your dreams and turn them into reality.<br>Submit your travel requirement on Davacanza holidays you will get  Customized itineraries from our travel expert.</p>
              <div class="cws_divider short mb-30 mt-30"></div>
              <h3 class="font-5 color-white font-medium">Samiksha</h3>
            </div>
            <div class="col-md-7">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.youtube.com/embed/yib7tvIrL6k" class="embed-responsive-item"></iframe>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ! page section parallax-->

      <!-- gallery section-->
      <section class="small-section">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <h6 class="title-section-top font-4">Happy Memories</h6>
              <h2 class="title-section"><span>Photo</span> Gallery</h2>
              <div class="cws_divider mb-25 mt-5"></div>
              <!-- <p>Vestibulum feugiat vitae tortor ut venenatis. Sed cursus, purus eu euismod bibendum, diam nisl suscipit odio, vitae ultrices mauris dolor quis mauris. Curabitur ac metus id leo maximus porta.</p> -->
            </div>
            <div class="col-md-4"><i class="flaticon-suntour-photo title-icon"></i></div>
          </div>
          <div class="row portfolio-grid">
            <!-- portfolio item-->
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="portfolio-item">
                <!-- portfolio image-->
				<a href="pic/gallery/big_img/G01-29.jpg" class="fancy">
                  <div class="portfolio-media">
						<img src="pic/gallery/thumb/G01-29.jpg" data-at2x="pic/gallery/thumb/G01-29.jpg" alt>
				  </div>
				</a>
                <div class="links"><a href="pic/gallery/big_img/G01-29.jpg
				G01-29.jpg" class="fancy"><i class="fa fa-expand"></i></a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="portfolio-item">
                  <!-- portfolio image-->
                  <a href="pic/gallery/big_img/G02-30.jpg" class="fancy">
                    <div class="portfolio-media">
                          <img src="pic/gallery/thumb/G02-30.jpg" data-at2x="pic/gallery/thumb/G02-30.jpg" alt>
                    </div>
                  </a>
                  <div class="links"><a href="pic/gallery/big_img/G02-30.jpg
                  G02-30.jpg" class="fancy"><i class="fa fa-expand"></i></a></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="portfolio-item">
                  <!-- portfolio image-->
                  <a href="pic/gallery/big_img/G03-31.jpg" class="fancy">
                    <div class="portfolio-media">
                          <img src="pic/gallery/thumb/G03-31.jpg" data-at2x="pic/gallery/thumb/G03-31.jpg" alt>
                    </div>
                  </a>
                  <div class="links"><a href="pic/gallery/big_img/G03-31.jpg
                  G03-31.jpg" class="fancy"><i class="fa fa-expand"></i></a></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="portfolio-item">
                  <!-- portfolio image-->
                  <a href="pic/gallery/big_img/G04-32.jpg" class="fancy">
                    <div class="portfolio-media">
                          <img src="pic/gallery/thumb/G04-32.jpg" data-at2x="pic/gallery/thumb/G04-32.jpg" alt>
                    </div>
                  </a>
                  <div class="links"><a href="pic/gallery/big_img/G04-32.jpg
                  G04-32.jpg" class="fancy"><i class="fa fa-expand"></i></a></div>
                </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ! gallery section-->
	  
      <!-- testimonials section-->
      <div id="mycsttest">
      <section class="small-section cws_prlx_section bg-blue-40"><img src="pic/parallax-2.jpg" alt class="cws_prlx_layer">
        <div class="container">
          <div class="row">
            <div class="col-md-8 color-yellow">
              <h6 class="title-section-top font-4">Happy Memories</h6>
              <h2 class="title-section alt-2">Testimonials</h2>
              <div class="cws_divider mb-25 mt-5"></div>
            </div>
          </div>
          @foreach($testimonials as $testimonial)
          <div class="row">
            <div class="owl-three-item">
              <div class="testimonial-item">
                <div class="testimonial-top">
                  <a href="#">
                    <div class="pic">
                      <img src="pic/testimonial/top-bg/1.jpg" data-at2x="pic/testimonial/top-bg/1@2x.jpg" alt>
                    </div>
                  </a>
                    <div class="author">
                      <img src="@if($testimonial->image=='') pic/testimonial/default.jpg @else /assets/images/testimonial/thumbnail/{{ $testimonial->image }} @endif"
                      data-at2x="pic/testimonial/default.jpg" alt>
                    </div>
                </div>
                <div class="testimonial-body">
                  <h5 class="title"><span>{{ $testimonial->name }}</span></h5>
                  <p class="align-center">{{ $testimonial->testimonial }}</p>
                  {{-- <a href="#" class="testimonial-button">Read more</a> --}}
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </section>
</div>
      <!-- call out section-->
      <section class="page-section pt-90 pb-80 bg-main pattern relative">
        <div class="container">
          <div class="call-out-box clearfix with-icon">
            <div class="row call-out-wrap">
              <div class="col-md-5">
                <h6 class="title-section-top gray font-4">subscribe today</h6>
                <h2 class="title-section alt-2"><span>Get</span> Latest offers</h2><i class="flaticon-suntour-email call-out-icon"></i>
              </div>
              <div class="col-md-7">
                <form id="subscribe" class="form contact-form1 mt-10">
                  @csrf
                  <div class="input-container">
                    <input type="text" placeholder="Enter your email" name="subscribeEmail" id="subscribeName" class="newsletter-field mb-0 form-row" required><i class="flaticon-suntour-email icon-left"></i>
                    <button type="submit" class="subscribe-submit"><i class="flaticon-suntour-arrow icon-right"></i></button>
                  </div>
                  <p id="result" style="margin-top:8px;text-transform:capitalize;display: none">fgfdgdfgfd</p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ! call out section-->
    </div>

    <script>
      $('#subscribe').submit(function(e){
        e.preventDefault();
        // alert('hi');
        var subscribeName=document.getElementById('subscribeName').value;
        var err=0;
        if(subscribeName.indexOf("@")<1 || subscribeName.lastIndexOf(".")<subscribeName.indexOf("@")+2 || subscribeName.length<=subscribeName.lastIndexOf(".")+1){
            err=1;
        };
        if(err==1){
            document.getElementById('subscribeName').setAttribute('style','border:2px solid red');
            setTimeout(function(){
              document.getElementById('subscribeName').setAttribute('style','border:2px solid #fff');
            },2000);
        }else{
  //         var xhr3;  
  //         if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
  //           xhr3 = new XMLHttpRequest();  
  //         } 
  //         else if (window.ActiveXObject) { // IE 8 and older  
  //           xhr3 = new ActiveXObject("Microsoft.XMLHTTP");  
  //         }

  //         var datastring3='email=' + subscribeName;
  // //alert(datastring3);
  //         function display_data3() {   
  //           alert(xhr3.responseText);
  //                     if (xhr3.readyState == 4) {  
  //                       if (xhr3.status == 200) { 
  //                         // var xh=xhr3.responseText;
  //                         // alert(xh);
  //                       }
  //                     }
  //                   }

  //             xhr3.open("POST", "/", true);   
  //             xhr3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
  //             xhr3.send(datastring3);  
  //             xhr3.onreadystatechange = display_data3;
          $.ajax({
            type:'POST',
            url:'/subscribe',
            data: $('#subscribe').serialize(),
            success: function(update){
              $('#result').css('color','#fff');
                $('#result').html('Your are subscribe successfully!');
                $('#result').slideDown('slow');
                setTimeout(function(){
                $('#result').slideUp();
                  $('#subscribe')[0].reset();
                },3000);
            },
            error: function(error){
              alert(error.responseText);
              $('#result').css('color','red');
                $('#result').html('Something went wrong. Please call our representative!Your are subscribe successfully!');
                $('#result').slideDown('slow');
                setTimeout(function(){
                $('#result').slideUp();
                },3000);
            }
          });
       }
      });
    </script>
    
    {{-- <script>
      $('form').submit(function( event ) {
        event.preventDefault();
        $.ajax({
            url: 'http://myserver.dev/myAjaxCallURI',
            type: 'post',
            data: $('form').serialize(), // Remember that you need to have your csrf token included
            dataType: 'json',
            success: function( _response ){
                // Handle your response..
            },
            error: function( _response ){
                // Handle error
            }
        });
      });
    </script>   --}}

@endsection('content')