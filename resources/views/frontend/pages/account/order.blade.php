@extends('frontend.index')
@extends('frontend.pages.cart.additional')
@section('produck')
<div class="main">
  <div class="container">

    <div class="row margin-bottom-40">

      <div class="col-md-12 col-sm-12">
        <h1>{{$orders->kode_transaksi_penjualan}}</h1>
        <div class="goods-page">
            <div class="goods-data clearfix">
                <p>Order at  :  {{date('d F Y', strtotime($orders->tanggal))}}</p>
                <p>Status  :  {{$orders->status}}</p>
                <hr>
            <div class="table-wrapper-responsive">
            <table summary="Shopping cart">
              <tr>
                <th class="goods-page-image">Image</th>
                <th class="goods-page-description">Product</th>
                <th class="goods-page-ref-no">Product Code</th>
                <th>Promo</th>
                <th class="goods-page-quantity" width="100px">Quantity</th>
                <th class="goods-page-price" style="text-align:center">Unit price</th>
                <th class="goods-page-total" style="text-align:center">Total</th>
              </tr>
              @foreach ($Items as $item)
              <tr>
                <td class="goods-page-image">
                  <img src="{{Storage::url($item->detailProduct->foto)}}">
                </td>
                <td class="goods-page-description">
                  <h3><a href="{{route('frontend.shop_item', ['kode_produk' => $item->kode_produk])}}">{{$item->detailProduct->nama_produk}}</a></h3>
                </td>
                <td class="goods-page-ref-no">
                  {{$item->kode_produk}}
                </td>
                <td>
                    @if ($item->kode_promo != NULL)
                        <a href="">{{$item->kode_promo}}</a>
                    @else
                        <span>No Promo</span>
                    @endif
                </td>
                <td class="goods-page-quantity">
                  @csrf
                      <input type="text" value="{{$item->jumlah}}" readonly class="form-control input-sm quantity">
                </td>
                <td class="goods-page-price" align="right">
                  <strong><span>Rp.</span>{{number_format($item->detailProduct->harga)}}</strong>
                </td>
                <td class="goods-page-total" align="right">
                  <strong><span>Rp.</span>{{number_format($item->sub_total)}}</strong>
                </td>
              </tr>
              @endforeach
            </table>
            </div>

            <div class="shopping-total">
              <ul>
                <li class="shopping-total-price">
                  <em>Grand Total</em>
                  <strong class="price"><span>Rp.{{number_format($orders->grand_total)}}</span></strong>
                </li>
              </ul>
            </div>
          </div>
          <a href="{{url()->previous()}}" class="btn btn-info">Back <i class="fa fa-arrow-left"></i></a>
        </div>
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
@endsection
