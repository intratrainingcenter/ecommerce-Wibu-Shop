@foreach ($all_products as $key => $pop_up)
<div id="product-pop-up{{$pop_up->kode_produk}}" style="display: none; width: 700px;">
  <div class="product-page product-pop-up">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-3">
        <div class="product-main-image">
          <img src="{{Storage::url($pop_up->foto)}}" alt="" class="img-responsive">
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-9">
        <h2>{{$pop_up->nama_produk}}</h2>
        <div class="price-availability-block clearfix">
          <div class="price">
            <strong>{{'Rp. '.number_format($pop_up->harga)}}</em>
          </div>
          <div class="availability">
              Stock: <strong>{{$pop_up->stok}} pcs</strong>
          </div>
        </div>
        <div class="description">
          <p>{{$pop_up->keterangan}}</p>
        </div>
        <div class="product-page-cart">
          <form action="{{route('frontend.addtocart', ['id' => $pop_up->kode_produk])}}" method="POST">
          @csrf
            <div class="product-quantity">
              <input type="text" value="1" readonly name="jumlah" class="form-control input-sm">
            </div>
              <button class="btn btn-primary" type="submit">Add to cart</button>
              <a href="{{route('frontend.shop_item',$pop_up->kode_produk)}}" class="btn btn-default">More details</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@foreach ($showPromo as $element)
<div id="product-pop-up1{{ $element->kode_promo }}" style="display: none; width: 700px;">
  <div class="product-page product-pop-up">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-9">
        <h2>{{ $element->kode_promo }}</h2><hr>
        <div class="price-availability-block clearfix">
          <div class="price">
            <H3>Promo ini bisa di dapatkan jika pemesanan min <strong>{{$element->min}}</strong> dan max
            <strong>{{$element->max}}</strong> tidak berlaku kelipatan</H3>
          </div>
        </div>
        <div class="description">
          <p>{{$element->jenis_promo}}</p>
          @if ($element->jenis_promo == "Bonus")
            <strong>Promo : {{ $element->kode_produk_bonus }}</strong>
          @else
            <strong>Promo : {{"Rp ".number_format($element->diskon).".00" }}</strong>
          @endif
        </div>
        <div class="product-page-cart">
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
