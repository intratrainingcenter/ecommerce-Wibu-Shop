@foreach ($data as $item)

<!-- Modal  Detail -->
<div class="modal fade" id="ModalDetail{{$item->kode_produk}}" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Rincian Produk</h4>
            </div>
            <div class="modal-body">
                <center><img src="{{Storage::url($item->foto)}}" width="200px" alt=""></center><br>
                <table width="100%">
                    <thead>
                        <th width="40%"></th><th width="10%"></th><th width="40%"></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><label for="">Kode Produk</label></td><td>:</td><td>{{$item->kode_produk}}</td>
                        </tr>
                        <tr>
                            <td><label for="">Nama Produk</label></td><td>:</td><td>{{$item->nama_produk}}</td>
                        </tr>
                        <tr>
                            <td><label for="">Kategori</label></td><td>:</td><td>{{$item->GetKategori->nama_kategori}}</td>
                        </tr>
                        <tr>
                            <td><label for="">HPP</label></td><td>:</td><td>{{$item->hpp}}</td>
                        </tr>
                        <tr>
                            <td><label for="">Harga Jual</label></td><td>:</td><td>{{$item->harga}}</td>
                        </tr>
                        <tr>
                            <td><label for="">Stok</label></td><td>:</td><td>{{$item->stok}}</td>
                        </tr>
                        <tr>
                            <td><label for="">Status</label></td><td>:</td><td>{{$item->status}}</td>
                        </tr>
                        @if ($item->keterangan !='')
                            <tr>
                                <td><label for="">Nama Produk</label></td><td>:</td><td>{{$item->keterangan}}</td>
                            </tr>
                        @else
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endforeach