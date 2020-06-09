@extends('layout')

@section('breadcrumb')
<section style="background-image:url('/pic/breadcrumbs/bg-2.png');" class="breadcrumbs">
    <div class="container">
      <div class="text-left breadcrumbs-item">
        <h2><span>International</span> Packages Detail</h2>
      </div>
    </div>
  </section>
@endsection('breadcrumb')

@section('content')

{{-- <p>This is package detail page</p> --}}


<div class="content-body">
  <!-- page section about-->
  <section class="small-section cws_prlx_section bg-white-80 pb-80">
    <div class="container">
      <div class="row">
        @foreach ($showPackageDetail as $showPackageDetails)
          <div class="col-md-6 mb-md-60">
            <!-- section title-->
            <h4 class="title-section alt gray mb-10"><span>{{ $showPackageDetails->name }}</span></h4>
            <p class="color-green">Starting at just ₹ {{ $showPackageDetails->price }}/-</p>
            <!-- ! section title-->
            <p class="mb-30">{{ $showPackageDetails->description }}</p>
          </div>
          <div class="col-md-5 flex-item-end col-md-offset-1">
            <img src="/assets/images/packageImage/{{ $showPackageDetails->image }}" alt class="">
          </div>
        @endforeach
      </div>
  
      @php $k=0; @endphp
      @foreach($packageDays as $packageDay)
      @php $k++ @endphp
        <div class="row mt-5">
          <div class="col-md-5 col-sm-9"><img src="/assets/images/packageDaysImage/{{ $packageDay->image }}" alt class="img-responsive"></div>
          <div class="col-md-2 col-sm-3">
            <div class="btn-center">
              <center>
                <img src="/pic/packages/d-btn.png" alt style="position: relative;top: 90px;" class="days-btn-bg">
                <p class="days-btn" style="position: relative;top: 49px;color: #fff;">Days {{ $k }}</p>
              </center>
            </div>
          </div>
          <div class="col-md-5 col-sm-12 mb-md-60">
            <!-- section title-->
            <h6 class="title-section alt gray mb-10"><span>{!! $packageDay->title !!}</span></h6>
            <!-- ! section title-->
            <p class="mb-30">{!! $packageDay->description !!}</p>
          </div>
        </div>
      @endforeach
  
  
      <!--<div class="row">
        <div class="col-md-5 col-sm-9"><img src="pic/packages/osaka.jpg" alt class="img-responsive"></div>
  <div class="col-md-2 col-sm-3 btn-center">
    <center><a href="" style="background-image:url('pic/packages/d-btn.png');padding: 20px 31px;">Day 2</a></center>
  </div>
        <div class="col-md-5 col-sm-12 mb-md-60">

          <h6 class="title-section alt gray mb-10"><span>JAPAN - 7 N/8D</span></h6>

    <p class="mb-30">Arrival in Tokyo the capital of Japan! Welcome to the glorious city of Japan - Fuji! Proceed to Fuji to visit the beautiful Lake Ashi <span class="color-black">(optional)</span> which is known for its views of Mt.Fuji, Its numerous Hotsprings, Historical Sites, and Ryokan.<span class="color-black">(94.59KM,3Hrs)</span> After Sightseeing Dinner at Indian Restaurant & Check In<br>
    Meals: Dinner<br>
    <span class="color-black">Overnight Stay In Fuji</span></p>
        </div>
      </div> -->
    </div>
  </section>
  <!-- ! page section about-->
<!-- content-->
{{-- <div class="content-body">
  <div class="container page-section-contact">
    <div class="row">
      <div class="col-md-5 col-md-offset-right-1">
      <h4 class="title-section"><span class="font-bold">Contact us</span></h4>
  <p>Fill the details bellow and get a call back.</p>
      <div class="widget-contact-form pb-30">
        <!-- contact-form-->
        <div class="email_server_responce"></div>
        <form action="php/contacts-process.php" method="post" class="form contact-form alt clearfix">
          <div class="row">
            <div class="col-md-12 clearfix">
              <div class="input-container">
                <input type="text" name="name" value="" size="40" placeholder="Name" aria-invalid="false" aria-required="true" class="form-row form-row-first">
              </div>
            </div>
            <div class="col-md-12">
              <div class="input-container">
                <input type="text" name="email" value="" size="40" placeholder="Email" aria-required="true" class="form-row form-row-last">
              </div>
            </div>
            <div class="col-md-12">
              <div class="input-container">
                <input type="text" name="text" value="" size="14" placeholder="Contact" aria-required="true" class="form-row form-row-last">
              </div>
            </div>
          </div>
          <div class="input-container">
            <textarea name="message" cols="40" rows="4" placeholder="Comment" aria-invalid="false" aria-required="true"></textarea>
          </div>
          <center><input type="submit" value="Submit now" class="cws-button alt"></center>
        </form>
        <!-- /contact-form-->
      </div>
      </div>
  
      <div class="col-md-4 col-md-offset-2">
        <div class="contact-item">
          <h4 class="title-section"><span class="font-bold">Contacts</span></h4>
    <p>Feel free to call us, we are happy to help you!</p>
          <ul class="icon">
            <li> <a href="#">3710 Ridge Avenue, Erie, PA 16506<i class="flaticon-suntour-map"></i></a></li>
            <li> <a href="#">(723)-700-1183<i class="flaticon-suntour-phone"></i></a></li>
            <li> <a href="#">support.suntour@example.com<i class="flaticon-suntour-email"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ! content-->
</div> --}}

@endsection('content')