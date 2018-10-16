@extends('frontend.index')
@section('produck')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="">Product</a></li>
            <li class="active">{{$nama_kategori->nama_kategori}}</li>
        </ul>
        <div class="row margin-bottom-40">
          <div class="sidebar col-md-3 col-sm-5">
            @include('frontend.layout.ButonProduct')
            <div class="sidebar-filter margin-bottom-25">
              <h2>Filter</h2>
              <h3>Availability</h3>
              <div class="checkbox-list">
                  <label><input type="checkbox" style="float:left"> Sold Out (0)</label>
                  <label><input type="checkbox" style="float:left"> Ready Stock (0)</label>
                </div>
                <h3>Price</h3>
                <div class="checkbox-list">
                  <input placeholder="1,000" type="number" name="dari" min="1" style="width:40%">-
                  <input placeholder="100,000" type="number" name="sampai" min="1" style="width:40%;display:inline-block">
                </div>
                <button type="submit" class="btn btn-primary" name="button">Filter</button>
            </div>

          </div>
          <div class="col-md-9 col-sm-7">
            <div class="row list-view-sorting clearfix">
              <div class="col-md-2 col-sm-2 list-view">
                <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                <a href="javascript:;"><i class="fa fa-th-list"></i></a>
              </div>
              <div class="col-md-10 col-sm-10">
                <div class="pull-right">
                    {{$all_products->links()}}
                </div>
              </div>
            </div>
            <div class="row product-list">
              @forelse ($all_products as $Produck)
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="{{Storage::url($Produck->foto)}}" class="img-responsive" alt="">
                    <div>
                      <a href="{{Storage::url($Produck->foto)}}" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up{{$Produck->kode_produk}}" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">{{$Produck->nama_produk}}</a></h3>
                  <div class="pi-price">Rp {{$Produck->harga}}</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              @empty
              <div class="col-md-12">
                <div class="product-item">
                  <center><h3>Sorry, Product With Category {{$nama_kategori->nama_kategori}} Is Currently Empty!</h3></center>
                </div>
              </div>

            @endforelse
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-4 items-info"></div>
              <div class="col-md-8 col-sm-8">
                <ul class="pagination pull-right">
                  {{$all_products->links()}}
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
