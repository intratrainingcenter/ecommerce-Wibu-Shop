@extends('frontend.index')
@extends('frontend.pages.checkout.additional')
@section('produck')
    <div class="main">
      <div class="container">
        <div class="row margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            <h1>Checkout</h1>
            <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
              <div id="shipping-address" class="panel panel-default">
                <form action="{{route('confirm.order')}}" method="post">
                    @csrf
                    @if (count($UserCart) == 0)
                      <input type="hidden" name="kode_keranjang" value="">
                    @else
                      <input type="hidden" name="kode_keranjang" value="{{$kode_keranjang}}">
                    @endif
                      <input type="hidden" id="sub_total" value="{{$SUM}}">
                      <input type="hidden" name="ongkir" id="ongkir" value="0">
                      <input type="hidden" name="grand_total" id="grand_total">
                      <input type="hidden" name="alamat" id="addressValue">
                      <input type="hidden" name="service" id="service">
                <div class="panel-heading">
                  <h2 class="panel-title"><a>  Confirm Order </a></h2>
                </div>
                  <div class="panel-body row">
                      <div class="col-md-6 col-sm-6">
                        <h3>Shipping Address</h3>
                        <div class="form-group">
                          <div class="col-md-12" id="label">
                            <label>Please select your delivery address</label>
                          </div>
                          <div class="col-md-6">
                            @php
                                $countAddress = count($addresses);
                            @endphp
                            <select name="address" id="address" class="form-control" style="color:black" required>
                                <option value="">--Select Address--</option>
                                @if ($countAddress == null)
                                  <option value="" disabled>You haven't add any address</option>
                                @else
                                  @foreach ($addresses as $address)
                                  <option value="{{$address->kode_alamat}}">{{$address->nama_alamat}}</option>
                                  @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-6">
                              <a href="{{route('account.address')}}" class="btn btn-primary" style="color:white">Add Address</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <h3>Delivery Courier</h3><p>*All items delivered from Jakarta</p>
                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-6">
                              <label>  Please select the preferred courier  </label>
                              <div class="col-md-12">
                                <select name="courier" id="courier" class="form-control" style="color:black" required disabled>
                                    <option value="">--Select Courier--</option>
                                    <option value="jne">Jalur Nugraha Ekakurir (JNE)</option>
                                    <option value="pos">POS Indonesia (POS)</option>
                                    <option value="tiki">Citra Van Titipan Kilat (TIKI)</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="col-md-12" id="jne" hidden>
                                <label>  Please select the preferred service  </label><select id="jneOption" class="form-control" style="color:black" required></select>
                                </div>
                                <div class="col-md-12" id="pos" hidden>
                                  <label>Please select the preferred service</label><select id="posOption" class="form-control" style="color:black" required></select>
                              </div>
                              <div class="col-md-12" id="tiki" hidden>
                                <label>Please select the preferred service</label><select id="tikiOption" class="form-control" style="color:black" required></select>
                                </div>
                              </div>
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
                            <td class="checkout-image"><img src="{{Storage::url($Items->detailProduct->foto)}}"></td>
                            <td class="checkout-description">
                              <h3><a href="{{route('frontend.shop_item', ['kode_produk' => $Items->kode_produk])}}">{{$Items->detailProduct->nama_produk}}</a></h3>
                            </td>
                            <td class="checkout-model">{{$Items->kode_produk}}</td>
                            <td class="checkout-quantity" align="center">{{$Items->jumlah}}</td>
                            <td class="checkout-price" align="right"><strong><span>Rp.</span>{{number_format($Items->detailProduct->harga)}}</strong></td>
                            <td class="checkout-total" align="right"><strong><span>Rp.</span>{{number_format($Items->sub_total)}}</strong></td>
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
                          <li><em>Sub total</em><strong class="price"><span>Rp.</span>{{number_format($SUM)}}</strong></li>
                          <li><em>Shipping cost</em><strong class="price" id="ongkirValue"><span>Rp.</span>0</strong></li>
                          <li class="checkout-total-price"><em>Grand Total</em><strong class="price" id="grandTotalValue"><span>Rp.</span>{{number_format($SUM)}}</strong></li>
                        </ul>
                      </div>
                      <div class="clearfix">
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Note (optional)</label><textarea name="keterangan" id="keterangan"rows="3" class="form-control"></textarea>
                      </div>
                      @php
                          $count = count($UserCart);
                          @endphp
                      @if ($count == null)
                      <button class="btn btn-primary pull-right" type="submit" id="button-confirm" disabled>Confirm Order</button>
                      @else
                      <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm Order</button>
                      @endif
                      <a href="{{route('frontend.cart')}}" class="btn btn-default pull-right margin-right-20">Cancel</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
