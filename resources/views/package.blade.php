@extends('layout');

@section('content')

@section('breadcrumb')
<section style="background-image:url('/pic/breadcrumbs/bg-2.png');" class="breadcrumbs">
    <div class="container">
      <div class="text-left breadcrumbs-item">
        <h2><span>International</span> Packages</h2>
      </div>
    </div>
  </section>
@endsection('breadcrumb')
  
    <!-- ! header page-->
    <div class="content-body">
      <div class="container page-section-about">
        <div class="row">
        
              @foreach ($packagesLists as $packagesList)
                <!-- Recomended item-->
                <div class="col-md-6">
                  <div class="recom-item border">
                    <div class="recom-media">
                      <a href="packages-details.php?id=34">
                          <div class="pic"><img src="/assets/images/packageImage/{{ $packagesList->image }}" alt=""></div>
                      </a>
                      <div class="location">
                          <i class="flaticon-suntour-map"></i>{{ $packagesList->location }}</div>
                    </div>
                    <!-- Recomended Content-->
                    <div class="recom-item-body"><a href="packages-details.php?id=34">
                      <h6 class="blog-title">{{ $packagesList->name }}</h6></a>
                      <div class="start-at">STARTING AT</div>
                      <div class="recom-price"><span class="font-4">FIX -{{ $packagesList->price }}/-</span>
                      </div>
                      <a href="/package/{{ Request::segment(2) }}/detail/{{ $packagesList->id }}" class="cws-button small alt">Package Details</a>
                    </div>
                  </div>
                </div>
              @endforeach

      {{-- <div class="col-md-12">
				<ul class="pagination" style="padding: 20px;">
					<li><div class="pag-nation"><span class="current">1</span><a href="?page=2">2</a><a href="?page=2">&gt;</a></div><div class="pag-cnt">Page 1 of 2</div></li>
				</ul>
			</div> --}}
    </div>
  </div>
</div>
    

@endsection