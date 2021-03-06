<div class="header">
  <div class="container">
    <a class="site-logo" href="/"><img src="{{asset('frontend/theme/assets/corporate/img/logos/logo-shop-red.png')}}" alt="Metronic Shop UI"></a>
    <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
@include('frontend.layout.cart')
    <div class="header-navigation">
      <ul><li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">  Categories  </a>
          <ul class="dropdown-menu">
            @foreach ($kategori as $button_womens)
              <li><a href="{{route('frontend.product_list',$button_womens->kode_kategori)}}">{{$button_womens->nama_kategori}}</a></li>
            @endforeach
          </ul></li>
        <li class="dropdown dropdown100 nav-catalogue">
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;"> New  </a>
@include('frontend.layout.Newporduct-header')
        </li>
        <li class="">
          <a href="{{route('all_products')}}"> All Products </a>
        </li>
        <li class="menu-search">
          <span class="sep"></span>
          <i class="fa fa-search search-btn"></i>
          <div class="search-box">
            <form action="{{route('search.product')}}" method="GET">
                <div class="input-group">
                  <input type="text" placeholder="Search" class="form-control" name="search">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </span>
                </div>
                @csrf
            </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
