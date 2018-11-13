@foreach ($data->transaksi as $group)
  @foreach ($group as $item)

  <!-- Modal  Detail Transaksi -->
  <div class="modal fade" id="ModalDetail{{$item->kode_transaksi_pembelian}}" data-backdrop="false">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Data</h4>
            </div>
            <div class="modal-body">
              <h4> <strong> Detail Transaksi Pembelian {{$item->kode_transaksi_pembelian}}</strong> </h4>
              <table id="TableTransBeli" class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data->produks as $produk)
                  @if($item->kode_transaksi_pembelian == $produk->kode_trans)
                  <tr>
                    <td>{{ $produk->kode_produk }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->harga }}</td>
                    <td>{{ $produk->jummlah }}</td>
                    <td>{{ $produk->sub_total }}</td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
              </table>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  @endforeach
@endforeach
