@if (Auth::guard('pembeli')->check())
<div class="top-cart-block">
 <div class="top-cart-info">
   <a href="#chat-pop-up" class="top-cart-info-count fancybox-fast-view" ng-click="openChat()">Chat</a>
 </div>
 <a href="#chat-pop-up" class="top-cart-info-count fancybox-fast-view"> <i class="fa fa-comments-o"></i></a>
 <a href="#chat-pop-up" class="top-cart-info-count fancybox-fast-view"> <i class="fa fa-comments"></i></a>
</div>
@endif
<div class="top-cart-block">
  <div class="top-cart-info">
    <a href="javascript:void(0);" class="top-cart-info-count">{{count($UserCart)}} items</a>
  </div>
  <i class="fa fa-shopping-cart"></i>
  <div class="top-cart-content-wrapper">
    <div class="top-cart-content">
      <ul class="scroller" style="height: 250px;">
        @forelse ($UserCart as $Items)
        <li>
          <a href="{{route('frontend.shop_item',$Items->kode_produk)}}"><img src="{{Storage::url($Items->detailProduct->foto)}}" width="37" height="34"></a>
          <span class="cart-content-count">{{$Items->jumlah}}</span>
          <strong><a href="{{route('frontend.shop_item',$Items->kode_produk)}}">{{$Items->detailProduct->nama_produk}}</a></strong>
          <em></em>
          <a class="del-goods" href="{{route('frontend.deletecart',$Items->id)}}">&nbsp;</a>
        </li>
        @empty
        <li>
          <p>Your shopping cart is empty!</p>
        </li>
        @endforelse
      </ul>
      <div class="text-right">
        <a href="{{route('frontend.cart')}}" class="btn btn-default">View Cart</a>
        <a href="{{route('frontend.Checkout')}}" class="btn btn-primary">Checkout</a>
      </div>
    </div>
  </div>
</div>
