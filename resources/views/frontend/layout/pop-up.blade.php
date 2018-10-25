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
              @if ($pop_up->status == 'Siap')
              Status: <strong>Ready Stock</strong>
              @else
              Status: <strong>Sold Out</strong>
              @endif
          </div>
        </div>
        <div class="description">
          <p>{{$pop_up->keterangan}}</p>
        </div>
        <div class="product-page-cart">
          <div class="product-quantity">
              <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
          </div>
          <button class="btn btn-primary" type="submit">Add to cart</button>
          <a href="{{route('frontend.shop_item',$pop_up->kode_produk)}}" class="btn btn-default">More details</a>
        </div>
      </div><div class="sticker sticker-sale"></div>
    </div>
  </div>
</div>
@endforeach
