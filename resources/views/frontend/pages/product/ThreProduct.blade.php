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
      <h3><a href="{{route('frontend.shop_item',$NewProduct->kode_produk)}}">{{$NewProduct->nama_produk}}</a></h3>
      <div class="pi-price">Rp {{ $NewProduct->harga }}</div>
      <form action="{{route('frontend.addtocart', ['id' => $NewProduct->kode_produk])}}" method="post">
        @csrf
        <input type="hidden" name="jumlah" value="1">
        <button type="submit" class="btn btn-default add2cart add">Add to cart</button>
      </form>
      <div class="sticker sticker-new"></div>
    </div>
  </div>
@endforeach
</div>
