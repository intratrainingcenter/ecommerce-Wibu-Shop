<div class="top-cart-block">
  <div class="top-cart-info">
    <a href="javascript:void(0);" class="top-cart-info-count">3 items</a>
    <a href="javascript:void(0);" class="top-cart-info-value">$1260</a>
  </div>
  @forelse ($UserCart as $Items)
  <i class="fa fa-shopping-cart"></i>
  <div class="top-cart-content-wrapper">
    <div class="top-cart-content">
      <ul class="scroller" style="height: 250px;">
        <li>
          <a href="shop-item.html"><img src="{{asset('frontend/theme/assets/pages/img/cart-img.jpg')}}" alt="Rolex Classic Watch" width="37" height="34"></a>
          <span class="cart-content-count">x{{$Items->jumlah}}</span>
          <strong><a href="shop-item.html">{{$Items->detailProduct->nama_produk}}</a></strong>
          <em>{{$Items->sub_total}}</em>
          <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
        </li>
      </ul>
      <div class="text-right">
        <a href="{{route('frontend.cart')}}" class="btn btn-default">View Cart</a>
        <a href="{{route('frontend.Checkout')}}" class="btn btn-primary">Checkout</a>
        @empty
        <i class="fa fa-shopping-cart"></i>
        <div class="top-cart-content-wrapper">
          <div class="top-cart-content">
            <ul class="scroller" style="height: 250px;">
            <center><p>Your shopping cart is empty!</p></center>
        </ul>
        <div class="text-right">
          <a href="{{route('frontend.cart')}}" class="btn btn-default">View Cart</a>
          <a href="{{route('frontend.Checkout')}}" class="btn btn-primary">Checkout</a>
        @endforelse
      </div>
    </div>
  </div>
</div>
