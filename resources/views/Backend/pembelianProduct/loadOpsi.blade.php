@php
  $no = 1;
  $hitung_opsi = count($loadopsi);
@endphp
@foreach($loadopsi as $opsi)
<tr class="item{{ $opsi->id }}">
	<td>{{ $no++ }}</td>
	<td>{{$opsi->kode_produk}}</td>
	<td>{{$opsi->nama_produk}}</td>
	<td>{{'Rp '.number_format($opsi->hpp,0,'','.').',00'}}</td>
	<td>{{$opsi->jummlah}}</td>
  <td>{{'Rp '.number_format($opsi->sub_total,0,'','.').',00'}}</td>
    <td>
        <button type='button' onclick="delopsi('{{$opsi->idtransaksi}}','{{$opsi->kode_transaksi_pembelian}}')" class=' btn btn-circle btn-mn btn-3d btn-danger hapus' data-id='{{ $opsi->id }}'>
            <span class='fa fa-trash'></span>
        </button>
    </td>
    <input id='sub{{ $opsi->id }}' class='sub' type='hidden' value='{{$opsi->sub_total}}'>
    @csrf


</tr>
@endforeach
<input type="hidden" name="opsi" id="opsi" jumlah="{{$hitung_opsi}}" value="{{$hitung_opsi}}">
