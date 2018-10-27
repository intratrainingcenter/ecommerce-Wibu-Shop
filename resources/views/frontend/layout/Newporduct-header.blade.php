<ul class="dropdown-menu">
  <li>
    <div class="header-navigation-content">
      <div class="row">
        @foreach ($new_products as $key => $porduct)
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="product-item">
            <div class="pi-img-wrapper">
              <a href="{{route('frontend.shop_item',$porduct->kode_produk)}}"><img src="{{asset($porduct->foto)}}" class="img-responsive" alt="Berry Lace Dress"></a>
            </div>
            <h3><a href="{{route('frontend.shop_item',$porduct->kode_produk)}}">{{$porduct->nama_produk}}</a></h3>
            <div class="pi-price">{{"Rp. ".number_format($porduct->harga)}}</div>
            <a href="{{route('frontend.shop_item',$porduct->kode_produk)}}" class="btn btn-default add2cart">More details</a>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </li>
</ul>
