@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <form action="" method="post">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="business" value="mujibghufron.a7x@gmail.com">
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
        </div>
    </div>
</div>
@endsection