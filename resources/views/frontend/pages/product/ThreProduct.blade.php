<h2>Three items</h2>
<div class="owl-carousel owl-carousel3">
  @foreach ($three_products as $key => $NewProduct)
  <div>
    <div class="product-item">
      <form name="AddToCartForm" id="AddToCartForm" action="{{route('frontend.addtocart')}}" method="post" enctype="multipart/form-data">
      <div class="pi-img-wrapper">
        {{ csrf_field() }}
        <input type="text" name="kode_pembeli" value="aaaa">
        <input type="text" name="kode_produk" value="{{$NewProduct->kode_produk}}">
        <input type="text" name="kode_promo" value="qqq">
        <input type="text" name="jumlah" value="1">
        <input type="text" name="keterangan" value="bagus">
        <input type="text" name="sub_total" value="{{$NewProduct->harga}}">
        <input type="text" name="status" value="Pending">
        <img name="foto" src="{{$NewProduct->foto}}" class="img-responsive" alt="Berry Lace Dress">
        <div>
          <a href="{{$NewProduct->foto}}" class="btn btn-default fancybox-button">Zoom</a>
          <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
        </div>
      </div>
      <h3><a href="shop-item.html">{{$NewProduct->nama_produk}}</a></h3>
      <div class="pi-price">Rp {{ $NewProduct->harga }}</div>
      <button type="submit" class="btn btn-default add2cart">Add to cart</a>
      <div class="sticker sticker-new"></div>
      </form>
    </div>
  </div>
@endforeach
</div>
