    <ul class="list-group margin-bottom-25 sidebar-menu">
      <li class="list-group-item clearfix dropdown"><a href="#"><i class="fa fa-angle-right"></i> Ladies</a>
        <ul class="dropdown-menu">
          @foreach ($kategori as $data)
            <li><a href="{{route('frontend.product_list',$data->kode_kategori)}}"><i class="fa fa-angle-right"></i>{{ $data->nama_kategori }}</a></li>
          @endforeach
        </ul>
      </li>
      <li class="list-group-item clearfix dropdown"><a href="#"><i class="fa fa-angle-right"></i>  Mens  </a>
        <ul class="dropdown-menu">
          @foreach ($kategori as $button_mens)
            <li><a href="{{route('frontend.product_list',$button_mens->kode_kategori)}}"><i class="fa fa-angle-right"></i>{{ $button_mens->nama_kategori }}</a></li>
          @endforeach
        </ul>
      </li>
      <li class="list-group-item clearfix dropdown"><a href="#"><i class="fa fa-angle-right"></i>Accessories </a>
        <ul class="dropdown-menu">
          @foreach ($kategori as $data)
            <li><a href="{{route('frontend.product_list',$data->kode_kategori)}}"><i class="fa fa-angle-right"></i>{{ $data->nama_kategori }}</a></li>
          @endforeach
        </ul>
      </li>
      {{-- <li class="list-group-item clearfix"><a href="{{route('frontend.product_list')}}"><i class="fa fa-angle-right"></i> All</a></li> --}}
    </ul>
