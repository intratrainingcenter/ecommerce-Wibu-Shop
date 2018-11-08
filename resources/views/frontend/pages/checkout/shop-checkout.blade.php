@extends('frontend.index')
@extends('frontend.pages.checkout.additional')
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
                        <div class="form-group">
                          <div class="col-md-12" id="label">
                            <label>Please select your delivery address</label>
                          </div>
                          <div class="col-md-6">
                            <select name="address" id="address" class="form-control" style="color:black" required>
                                <option value="">--Select Address--</option>
                                @foreach ($addresses as $address)
                                <option value="{{$address->kode_alamat}}">{{$address->nama_alamat}}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="col-md-6">
                            <a href="{{route('account.address')}}" class="btn btn-primary" style="color:white">Add Another Address</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <h3>Delivery Courier</h3>
                        <p>*All items delivered from Jakarta</p>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label>
                              Please select the preferred courier
                            </label>
                          </div>
                          <div class="col-md-6">
                            <select name="courier" id="courier" class="form-control" style="color:black" required>
                                <option value="">--Select Courier--</option>
                                <option value="jne">Jalur Nugraha Ekakurir (JNE)</option>
                                <option value="pos">POS Indonesia (POS)</option>
                                <option value="tiki">Citra Van Titipan Kilat (TIKI)</option>
                            </select>
                          </div>
                          <div class="col-md-6" id="jne" hidden>
                              <select name="jneOption" id="jneOption" class="form-control" style="color:black" required>

                              </select>
                          </div>
                          <div class="col-md-6" id="pos" hidden>
                              <select name="posOption" id="posOption" class="form-control" style="color:black" required>

                              </select>
                          </div>
                          <div class="col-md-6" id="tiki" hidden>
                              <select name="tikiOption" id="tikiOption" class="form-control" style="color:black" required>

                              </select>
                          </div>
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
                            <strong class="price"><span>Rp.</span>0.00</strong>
                          </li>
                          <li class="checkout-total-price">
                            <em>Grand Total</em>
                            <strong class="price"><span>Rp.</span>{{number_format($SUM)}}</strong>
                          </li>
                        </ul>
                      </div>
                      <div class="clearfix">
                        <form action="" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="upload" value="1">
                            <input type="hidden" name="business" value="edgyweeb48@gmail.com">
                            @foreach($UserCart as $cartItem)
                            <input type="hidden" name="item_name_{{$loop->iteration}}" value="{{$cartItem->detailProduct->nama_produk}}">
                            <input type="hidden" name="item_number_{{$loop->iteration}}" value="{{$cartItem->kode_produk}}">
                            <input type="hidden" name="quantity_{{$loop->iteration}}" value="{{$cartItem->jumlah}}">
                            <input type="hidden" name="amount_{{$loop->iteration}}" value="{{$hargaUSD[$cartItem->kode_produk]}}">
                            <input type="hidden" name="shipping_{{$loop->iteration}}" value="0.30">
                            @endforeach
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input name="submit" id="paypalbtn" type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-34px.png" value="PayPal" formaction="https://www.paypal.com/cgi-bin/webscr">
                        </form>
                      </div>
                      @php
                          $count = count($UserCart);
                      @endphp
                      @if ($count == null)
                        <button class="btn btn-primary pull-right" type="submit" id="button-confirm" disabled>Confirm Order</button>
                      @else
                      <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm Order</button>
                      @endif
                      <button type="button" class="btn btn-default pull-right margin-right-20" id="tes">Cancel</button>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection


