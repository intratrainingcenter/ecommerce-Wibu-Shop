@extends('frontend.index')
@section('css')
  <link href="{{asset('frontend/theme/assets/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css">
  <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
@endsection
@section('produck')
<body class="ecommerce">
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('all_products')}}">Product</a></li>
            <li class="active">{{$view_products->nama_produk}}</li>
        </ul>
        <div class="row margin-bottom-40">
          <div class="sidebar col-md-3 col-sm-5">
          @include('frontend.layout.ButonProduct')
          </div>
          <div class="col-md-9 col-sm-7">
            <div class="product-page">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="product-main-image">
                    <img src="{{Storage::url($view_products->foto)}}" alt="" class="img-responsive" data-BigImgsrc="{{Storage::url($view_products->foto)}}">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <h1>{{$view_products->nama_produk}}</h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong>{{'Rp. '.number_format($view_products->harga)}}</strong>
                    </div>
                    <div class="availability">
                      @if ($view_products->status == 'Siap')
                      Status: <strong>Ready Stock</strong>
                      @else
                      Status: <strong>Sold Out</strong>
                      @endif
                    </div>
                  </div>
                  <div class="description">
                    <p>{{$view_products->keterangan}}</p>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                  </div>
                </div>
                <div class="product-page-content">
                  <ul id="myTab" class="nav nav-tabs">
                    <li><a href="#Information" data-toggle="tab">Information</a></li>
                    <li class="active"><a href="#Reviews" data-toggle="tab">Reviews ({{count($review)}})</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade" id="Information">
                      <p>{{$view_products->keterangan}} </p>
                    </div>
                    <div class="tab-pane fade in active" id="Reviews">
                      @foreach ($review as $key => $value )
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>{{$value->nama_pembeli}}</strong>
                          <em>{{$value->created_at}}</em>
                          <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                        </div>
                        <div class="review-item-content">
                            <p>{{$value->review_product}}</p>
                        </div>
                      </div>
                    @endforeach
                    <a  id="red_more_review" class="btn btn-info">red more</a>
                      <form action="{{route('frontend.reviewProduct')}}" method="post" class="reviews-form" role="form">
                        <h2>Write a review</h2>
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="hidden" name="kode_produk" value="{{$view_products->kode_produk}}">
                          <label for="name">Name <span class="require">*</span></label>
                          <input type="text" class="form-control" name="nama_pembeli" id="name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" name="email_pembeli" id="email">
                        </div>
                        <div class="form-group">
                          <label for="review">Review <span class="require">*</span></label>
                          <textarea class="form-control" rows="8" name="review_product" id="review"></textarea>
                        </div>
                        <div class="padding-top-20">
                          <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('js.new')
<script type="text/javascript">
  $(document).ready(function() {
    $('#red_more_review').click(function() {
      alert('bisa');
    })
  });
</script>
@endsection
