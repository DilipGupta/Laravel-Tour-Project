@extends('layout')

@section('content')
      <!-- gallery section-->
      <section class="page-section-about">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <h6 class="title-section-top font-4">Happy Memories</h6>
              <h2 class="title-section"><span>Photo</span> Gallery</h2>
              <div class="cws_divider mb-25 mt-5"></div>
            </div>
            <div class="col-md-4"><i class="flaticon-suntour-photo title-icon"></i></div>
          </div>
          <div class="row portfolio-grid">
            <!-- portfolio item-->
            @foreach($photoGalleries as $photoGallery)
              <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="portfolio-item">
                  <!-- portfolio image-->
                  <a href="/assets/images/photo-gallery/{{ $photoGallery->image }}" class="fancy">
                    <div class="portfolio-media">
                          <img src="/assets/images/photo-gallery/{{ $photoGallery->image }}" data-at2x="/assets/images/photo-gallery/{{ $photoGallery->image }}" alt>
                    </div>
                  </a>
                  <div class="links"><a href="/assets/images/photo-gallery/{{ $photoGallery->image }}" class="fancy"><i class="fa fa-expand"></i></a></div>
                </div>
              </div>
            @endforeach
			
          </div>
        </div>
      </section>
      <!-- ! gallery section-->
@endsection('content')