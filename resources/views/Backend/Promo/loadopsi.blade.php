@php
$no = 1;
$jumlah_opsi = count($data);
@endphp
@foreach($data as $opsi)
<tr>
	<td>{{ $no++ }}</td>
	<td>{{ $opsi->kode_produk }}</td>
	<td>{{ $opsi->GetProduk->nama_produk }}</td>
	@if ($jenis_promo != "Detail")
	<td>
		<button type="button" class="btn btn-sm btn-danger DeleteOpsi" onclick="DeleteOpsi('{{$opsi->id}}' , '{{$opsi->kode_promo}}');">
			<span class="fa fa-trash"></span>
		</button>
	</td>
	@endif
</tr>
@endforeach
<input type="hidden" name="jumlah_opsi" id="jumlah_opsi" value="{{$jumlah_opsi}}">
