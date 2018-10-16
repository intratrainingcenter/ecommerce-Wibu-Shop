@extends('frontend.index')
@section('produck')
  @include('frontend.layout.slider')
  <div class="main">
    <div class="container">
      <div class="row margin-bottom-40 ">
        <div class="sidebar col-md-3 col-sm-4">
      @include('frontend.layout.ButonProduct')
    </div>
    <div class="col-md-9 col-sm-8">
    @include( 'frontend.pages.product.ThreProduct')
    </div>
    </div>
      <div class="row margin-bottom-35 ">
        <div class="col-md-6 two-items-bottom-items">
          <h2>Hot Products</h2>
          <div class="owl-carousel owl-carousel2">
            @foreach ($two_products as $key => $Product)
            <div>
              <div class="product-item">
                <div class="pi-img-wrapper">
                  <img src="{{Storage::url($Product->foto)}}" class="img-responsive" alt="Berry Lace Dress">
                  <div>
                    <a href="{{Storage::url($Product->foto)}}" class="btn btn-default fancybox-button">Zoom</a>
                    <a href="#product-pop-up{{$Product->kode_produk}}" class="btn btn-default fancybox-fast-view">View</a>
                  </div>
                </div>
                <h3><a href="{{route('frontend.shop_item',$Product->kode_produk)}}">{{$Product->nama_produk}}</a></h3>
                <div class="pi-price">{{'Rp. '.number_format($Product->harga)}}</div>
                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
              </div>
            </div>
          @endforeach
        </div>
        </div>
        <div class="col-md-6 shop-index-carousel">
          <div class="content-slider">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="item active">
                  <img src="{{asset('frontend/theme/assets/pages/img/index-sliders/slide1.jpg')}}" class="img-responsive" alt="Berry Lace Dress">
                </div>
                <div class="item">
                  <img src="{{asset('frontend/theme/assets/pages/img/index-sliders/slide2.jpg')}}" class="img-responsive" alt="Berry Lace Dress">
                </div>
                <div class="item">
                  <img src="{{asset('frontend/theme/assets/pages/img/index-sliders/slide3.jpg')}}" class="img-responsive" alt="Berry Lace Dress">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
