@extends('frontend.index')
@section('produck')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Checkout</li>
        </ul>
        <div class="row margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            <h1>Checkout</h1>
            <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
              <div id="shipping-address" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a>
                      Confirm Order
                    </a>
                  </h2>
                </div>
                  <div class="panel-body row">
                      <div class="col-md-6 col-sm-6">
                        <h3>Shipping Address</h3>
                        @forelse ($addresses as $address)
                        <label>
                        Please select your delivery address
                        </label>
                        <select name="alamat" id="">
                          <option value="{{$address->kode_alamat}}">{{$address->nama_alamat}}</option>
                        </select>
                            
                        @empty
                        <label class="col-md-8">
                          You haven't add any address yet!
                        </label>
                        <div class="col-md-4">
                          <a href="{{route('account.address')}}" class="btn btn-primary" style="color:white">Add Address</a>
                        </div>
                        @endforelse
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <h3>Delivery Courier</h3>
                        <div class="form-group">
                          <label>
                          Please select the preferred courier
                        </label>
                        <select name="" id="" class="form-control">
                          <option value="">JNE</option>
                          <option value="">TIKI</option>
                          <option value="">POS</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body row">
                    <div class="col-md-12 clearfix">
                      <div class="table-wrapper-responsive">
                        <table>
                          <tr>
                            <th class="checkout-image">Image</th>
                            <th class="checkout-description">Product</th>
                            <th class="checkout-model">Product Code</th>
                            <th class="checkout-quantity">Quantity</th>
                            <th class="checkout-price">Price</th>
                            <th class="checkout-total">Total</th>
                          </tr>
                          @forelse ($UserCart as $Items)
                          <tr>
                            <td class="checkout-image">
                              <img src="{{Storage::url($Items->detailProduct->foto)}}">
                            </td>
                            <td class="checkout-description">
                              <h3><a href="{{route('frontend.shop_item', ['kode_produk' => $Items->kode_produk])}}">{{$Items->detailProduct->nama_produk}}</a></h3>
                            </td>
                            <td class="checkout-model">
                              {{$Items->kode_produk}}
                            </td>
                            <td class="checkout-quantity" align="center">
                                {{$Items->jumlah}}
                            </td>
                            <td class="checkout-price" align="right">
                              <strong><span>Rp.</span>{{number_format($Items->detailProduct->harga)}}</strong>
                            </td>
                            <td class="checkout-total" align="right">
                              <strong><span>Rp.</span>{{number_format($Items->sub_total)}}</strong>
                            </td>
                          </tr>
                          @empty
                            <tr>
                              <td colspan="6"><center><p>Your shopping cart is empty!</p></center></td>
                            </tr>
                          @endforelse
                        </table>
                      </div>
                      <div class="checkout-total-block">
                        <ul>
                          <li>
                            <em>Sub total</em>
                            <strong class="price"><span>Rp.</span>{{number_format($SUM)}}</strong>
                          </li>
                          <li>
                            <em>Shipping cost</em>
                            <strong class="price"><span>Rp.</span>3.00</strong>
                          </li>
                          <li class="checkout-total-price">
                            <em>Grand Total</em>
                            <strong class="price"><span>Rp.</span>56.00</strong>
                          </li>
                        </ul>
                      </div>
                      <div class="clearfix"></div>
                      <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm Order</button>
                      <button type="button" class="btn btn-default pull-right margin-right-20">Cancel</button>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
