<div class="pre-header">
  <div class="container">
      <div class="row">
          <div class="col-md-6 col-sm-6 additional-shop-info">
              <ul class="list-unstyled list-inline">
                  <li><i class="fa fa-phone"></i><span>+62 838 4581 1999</span></li>
              </ul>
          </div>
          <div class="col-md-6 col-sm-6 additional-nav">
              <ul class="list-unstyled list-inline pull-right">
                  @if (Auth::guard('pembeli')->check())
                  <li><a href="{{route('pembeli.account')}}">My Account</a></li>
                  <li><a href="shop-wishlist.html">About Us</a></li>
                  <li><a href="{{route('frontend.Checkout')}}">Checkout</a></li>
                  <li><a href="{{route('pembeli.logout')}}">Log Out</a></li>
                  @else
                  <li><a href="{{route('pembeli.login')}}">Log In</a></li>
                  <li><a href="{{route('pembeli.register')}}">Register</a></li>
                  @endif
              </ul>
          </div>
      </div>
  </div>
</div>
