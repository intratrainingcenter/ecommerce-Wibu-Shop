  <h2>Latest Products</h2>
  <div class="owl-carousel owl-carousel3">
    @foreach ($three_products as $key => $NewProduct)
    <div>
      <div class="product-item">
        <form action="{{route('frontend.addtocart')}}" method="post">
          <div class="pi-img-wrapper">
            {{ csrf_field() }}
            <input type="hidden" name="kode_produk" value="{{$NewProduct->kode_produk}}">
            <input type="hidden" name="kode_promo" value="qqq">
            <input type="hidden" name="jumlah" value="1">
            <input type="hidden" name="keterangan" value="Bagus">
            <input type="hidden" name="sub_total" value="{{$NewProduct->harga}}">
            <input type="hidden" name="status" value="Pending">
        <div class="pi-img-wrapper">
          <img src="{{Storage::url($NewProduct->foto)}}" class="img-responsive" alt="">
          <div>
            <a href="{{Storage::url($NewProduct->foto)}}" class="btn btn-default fancybox-button">Zoom</a>
            <a href="#product-pop-up{{$NewProduct->kode_produk}}" class="btn btn-default fancybox-fast-view">View</a>
          </div>
        </div>
        <h3><a href="{{route('frontend.shop_item',$NewProduct->kode_produk)}}">{{$NewProduct->nama_produk}}</a></h3>
        <div class="pi-price">Rp {{ $NewProduct->harga }}</div>
        <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
        <div class="sticker sticker-new"></div>
      </div>
      <h3><a href="shop-item.html">{{$NewProduct->nama_produk}}</a></h3>
      <div class="pi-price">Rp {{ $NewProduct->harga }}</div>
      <button type="submit" class="btn btn-default add2cart">Add to cart</button>
      <div class="sticker sticker-new"></div>
      </form>
    </div>
  </div>
@endforeach
</div>
