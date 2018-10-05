    <ul class="list-group margin-bottom-25 sidebar-menu">
      <li class="list-group-item clearfix dropdown"><a href="#"><i class="fa fa-angle-right"></i> Ladies</a>
        <ul class="dropdown-menu">
          @foreach ($kategori as $data)
            <li><a href="{{route('frontend.product_list')}}"><i class="fa fa-angle-right"></i>{{ $data->nama_kategori }}</a></li>
          @endforeach
        </ul>
      </li>
      <li class="list-group-item clearfix dropdown"><a href="#"><i class="fa fa-angle-right"></i>  Mens  </a>
        <ul class="dropdown-menu">
          <li><a href="{{route('frontend.product_list')}}"><i class="fa fa-angle-right"></i> Shoes </a></li>
          <li><a href="{{route('frontend.product_list')}}"><i class="fa fa-angle-right"></i> Trainers</a></li>
          <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Jeans</a></li>
          <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Chinos</a></li>
          <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> T-Shirts</a></li>
        </ul>
      </li>
      <li class=" list-group-item clearfix"><a href="{{route('frontend.product_list')}}"><i class="fa fa-angle-right"></i> Accessories</a></li>
    </ul>
