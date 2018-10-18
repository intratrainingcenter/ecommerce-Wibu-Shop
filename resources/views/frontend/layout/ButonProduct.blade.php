    <ul class="list-group margin-bottom-25 sidebar-menu">
        @foreach ($kategori as $data)
        <li class="list-group-item clearfix"><a href="{{route('frontend.product_list',$data->kode_kategori)}}"><i class="fa fa-angle-right"></i>{{$data->nama_kategori}}</a>
        @endforeach
      </li>
    </ul>
