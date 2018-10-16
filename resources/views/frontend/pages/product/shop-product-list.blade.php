@extends('frontend.index')
@section('produck')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="">Product</a></li>
            <li class="active">{{$kode_kategori}}</li>
        </ul>
        <div class="row margin-bottom-40">
          <div class="sidebar col-md-3 col-sm-5">
            @include('frontend.layout.ButonProduct')
            <div class="sidebar-filter margin-bottom-25">
              <h2>Filter</h2>
              <h3>Availability</h3>
              <div class="checkbox-list">
                <label><input type="checkbox" style="float:left"> Not Available (3)</label>
                <label><input type="checkbox" style="float:left"> In Stock (26)</label>
              </div>
              <h3>Price</h3>
              <div class="row">
                <div class="col-md-4">
                    <input placeholder="1,000" type="number" name="dari" min="1">
                </div>
                <div class="col-md1">
                  s/d
                </div>
                <div class="col-md-4">
                    <input placeholder="100,000" type="number" name="sampai" min="1">
                </div>
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
                  <label class="control-label">Show:</label>
                  <select class="form-control input-sm">
                    <option value="#?limit=24" selected="selected">24</option>
                    <option value="#?limit=25">25</option>
                    <option value="#?limit=50">50</option>
                    <option value="#?limit=75">75</option>
                    <option value="#?limit=100">100</option>
                  </select>
                </div>
                <div class="pull-right">
                  <label class="control-label">Sort&nbsp;By:</label>
                  <select class="form-control input-sm">
                    <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                    <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                    <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                    <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                    <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                    <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
                    <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
                    <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
                    <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row product-list">
              @foreach ($three_products as $Produck)
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="{{asset($Produck->foto)}}" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="{{asset($Produck->foto)}}" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up{{$Produck->kode_produk}}" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">{{$Produck->nama_produk}}</a></h3>
                  <div class="pi-price">Rp {{$Produck->harga}}</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
            @endforeach
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-4 items-info"></div>
              <div class="col-md-8 col-sm-8">
                <ul class="pagination pull-right">
                  {{$three_products->links()}}
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
