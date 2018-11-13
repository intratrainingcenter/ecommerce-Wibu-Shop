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
              <div class="row">
                <div class="col-md-6">
                  <p>Order at  :  {{date('d F Y', strtotime($orders->tanggal))}}</p>
                  <p>Address  : {{$orders->getAddress->alamat}}, {{$orders->getAddress->kota}}, {{$orders->getAddress->provinsi}}</p>
                  <p>Courier  : {{$orders->service}}</p>
                  <p>Note : {{$orders->keterangan}}</p>
                  @if ($orders->status == 'Order')
                  <p>Status : Waiting for payment</p>
                  @elseif ($orders->status == 'Paid')
                  <p>Status  :  On Proccess</p>
                  @else
                  <p>Status  :  {{$orders->status}}</p>
                  @endif
                </div>
                <div class="col-md-6">
                  @if ($orders->status == 'Order')
                  <div class="col-md-6">
                    <p>Transfer the payment here:</p>
                    <p>BCA 3850594014 Abdul Mujib Ghufron</p>
                  </div>
                  <div class="col-md-6">
                    <center>
                    <p>or Pay with Paypal</p>
                    @include('frontend.pages.checkout.pay')
                    </center>
                  </div>
                  <center>
                    <form action="{{route('paid.order', ['code' => $orders->kode_keranjang])}}" method="POST">
                      @csrf @method('PATCH')
                      <p>Please confirm after you have done the payment!</p>
                      <button type="submit" class="btn btn-info">I have done the payment</button>
                    </form>
                </center>
                  @endif
                </div>
              </div>
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
                        {{$item->jumlah}}
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
            <div class="checkout-total-block">
              <ul>
                <li><em>Sub total</em><strong class="price"><span>Rp.</span>{{number_format($SUM)}}</strong></li>
                <li><em>Shipping cost</em><strong class="price"><span>Rp.</span>{{number_format($orders->ongkir)}}</strong></li>
                <li class="checkout-total-price"><em>Grand Total</em><strong class="price"><span>Rp.</span>{{number_format($orders->grand_total)}}</strong></li>
              </ul>
            </div>
          </div>
          <a href="{{url()->previous()}}" class="btn btn-info">Back <i class="fa fa-arrow-left"></i></a>
        </div>
      </div>
    </div>
@endsection
