  <h2>Latest Products</h2>
  <div class="owl-carousel owl-carousel3">
    @foreach ($three_products as $key => $NewProduct)
    <div>
      <div class="product-item">
        <div class="pi-img-wrapper">
          <img src="{{Storage::url($NewProduct->foto)}}" class="img-responsive" alt="">
          <div>
            <a href="{{Storage::url($NewProduct->foto)}}" class="btn btn-default fancybox-button">Zoom</a>
            <a href="#product-pop-up{{$NewProduct->kode_produk}}" class="btn btn-default fancybox-fast-view">View</a>
          </div>
        </div>
        <h3><a href="shop-item.html">{{$NewProduct->nama_produk}}</a></h3>
        <div class="pi-price">Rp {{ $NewProduct->harga }}</div>
        <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
        <div class="sticker sticker-new"></div>
      </div>
    </div>
  @endforeach
  </div>
