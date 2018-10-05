<div class="header">
  <div class="container">
    <a class="site-logo" href="/"><img src="{{asset('frontend/theme/assets/corporate/img/logos/logo-shop-red.png')}}" alt="Metronic Shop UI"></a>
    <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
@include('frontend.layout.cart')
    <div class="header-navigation">
      <ul><li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">  Woman  </a>
          <ul class="dropdown-menu">
            <li><a href="shop-product-list.html">Running Shoes</a></li>
            <li><a href="shop-product-list.html">Jackets and Coats</a></li>
          </ul></li>
        <li class="dropdown dropdown-megamenu">
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;"> Man </a>
@include('frontend.layout.butonMan')
        </li>
        <li><a href="shop-item.html">Kids</a></li>
        <li class="dropdown dropdown100 nav-catalogue">
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;"> New  </a>
@include('frontend.layout.Newporduct-header')
        </li>
        <li class="menu-search">
          <span class="sep"></span>
          <i class="fa fa-search search-btn"></i>
          <div class="search-box">
            <form action="#">
              <div class="input-group">
                <input type="text" placeholder="Search" class="form-control">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit">Search</button>
                </span>
              </div>
            </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
