<!-- BEGIN HEADER -->
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
          <ul class="dropdown-menu"><li>
              <div class="header-navigation-content">
                <div class="row">
                  <div class="col-md-4 header-navigation-col">
                    <h4>Footwear</h4>
                    <ul><li><a href="shop-product-list.html">Astro Trainers</a></li>
                        <li><a href="shop-product-list.html">Basketball Shoes</a></li>
                        <li><a href="shop-product-list.html">Boots</a></li>
                        <li><a href="shop-product-list.html">Canvas Shoes</a></li>
                        <li><a href="shop-product-list.html">Football Boots</a></li>
                        <li><a href="shop-product-list.html">Golf Shoes</a></li>
                        <li><a href="shop-product-list.html">Hi Tops</a></li>
                        <li><a href="shop-product-list.html">Indoor and Court Trainers</a></li>
                    </ul>
                  </div>
                  <div class="col-md-4 header-navigation-col">
                    <h4>Clothing</h4>
                    <ul><li><a href="shop-product-list.html">Base Layer</a></li>
                        <li><a href="shop-product-list.html">Character</a></li>
                        <li><a href="shop-product-list.html">Chinos</a></li>
                        <li><a href="shop-product-list.html">Combats</a></li>
                        <li><a href="shop-product-list.html">Cricket Clothing</a></li>
                        <li><a href="shop-product-list.html">Fleeces</a></li>
                        <li><a href="shop-product-list.html">Gilets</a></li>
                        <li><a href="shop-product-list.html">Golf Tops</a></li>
                    </ul>
                  </div>
                  <div class="col-md-4 header-navigation-col">
                    <h4>Accessories</h4>
                    <ul><li><a href="shop-product-list.html">Belts</a></li>
                        <li><a href="shop-product-list.html">Caps</a></li>
                        <li><a href="shop-product-list.html">Gloves, Hats and Scarves</a></li>
                    </ul>
                    <h4>Clearance</h4>
                    <ul><li><a href="shop-product-list.html">Jackets</a></li>
                        <li><a href="shop-product-list.html">Bottoms</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
        <li><a href="shop-item.html">Kids</a></li>
        <li class="dropdown dropdown100 nav-catalogue">
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
            New
          </a>
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
