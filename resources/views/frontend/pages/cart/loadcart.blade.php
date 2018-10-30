
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
        <th></th>
        </tr>
        @forelse ($UserCart as $Items)
        <tr>
        <td class="goods-page-image">
            <img src="{{Storage::url($Items->detailProduct->foto)}}">
        </td>
        <td class="goods-page-description">
            <h3><a href="{{route('frontend.shop_item', ['kode_produk' => $Items->kode_produk])}}">{{$Items->detailProduct->nama_produk}}</a></h3>
        </td>
        <td class="goods-page-ref-no">
            {{$Items->kode_produk}}
        </td>
        <td>
            @if ($Items->kode_promo != NULL)
                <a href="">{{$Items->kode_promo}}</a>
            @else
                <span>No Promo</span>
            @endif
        </td>
        <td class="goods-page-quantity">
            @csrf
                <input type="number" id="{{$Items->id}}" value="{{$Items->jumlah}}" min="1" class="form-control input-sm quantity">
        </td>
        <td class="goods-page-price" align="right">
            <strong><span>Rp.</span>{{number_format($Items->detailProduct->harga)}}</strong>
        </td>
        <td class="goods-page-total" align="right">
            <strong><span>Rp.</span>{{number_format($Items->sub_total)}}</strong>
        </td>
        <td class="del-goods-col">
            <a class="del-goods" href="{{route('frontend.deletecart',$Items->id)}}">&nbsp;</a>
        </td>
        </tr>
        @empty
        <tr>
            <td colspan="6"><center><p>Your shopping cart is empty!</p></center></td>
        </tr>
        @endforelse
    </table>
    </div>

    <div class="shopping-total">
        <ul>
        <li class="shopping-total-price">
            <em>Grand Total</em>
            <strong class="price"><span>Rp.{{number_format($SUM)}}</span></strong>
        </li>
        </ul>
    </div>