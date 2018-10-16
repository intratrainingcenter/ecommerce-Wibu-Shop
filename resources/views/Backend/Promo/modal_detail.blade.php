@foreach ($data as $item)

<!-- Modal  Detail -->
<div class="modal fade" id="ModalDetail{{$item->kode_promo}}" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Rincian Promo</h4>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="kode_promo" class="col-md-3">Kode Promo</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="kode_promo" value="{{$item->kode_promo}}" readonly/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_promo" class="col-md-3">Nama Promo</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_promo" value="{{$item->nama_promo}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_produk" class="col-md-3">Produk</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="kode_produk"value="{{$item->kode_produk}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="min" class="col-md-3">Pembelian Barang</label>
                    <div class="col-md-3">
                    <input type="number" name="min" max="99999999" min="0" class="form-control" value="{{$item->min}}" placeholder="Minimum" readonly>
                    </div>
                    <div class="col-md-2">
                        <center><h4>s/d</h4></center>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="max" min="0" max="99999999" class="form-control" value="{{$item->max}}" placeholder="Maximum" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_awal" class="col-md-3">Masa Berlaku</label>
                    <div class="col-md-3">
                        <input type="date" name="tanggal_awal" class="form-control" value="{{$item->tanggal_awal}}" readonly>
                    </div>
                    <div class="col-md-2">
                        <center><h4>s/d</h4></center>
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="tanggal_akhir" class="form-control" value="{{$item->tanggal_akhir}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_promo" class="col-md-3">Jenis Promo</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="jenis_promo" value="{{$item->jenis_promo}}" readonly>
                    </div>
                </div>
                @if ($item->jenis_promo == 'Diskon')
                <div class="form-group row" id="diskon">
                    <label for="diskon" class="col-md-3">Diskon</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" min="0" class="form-control" placeholder="1000" id="diskon" name="diskon" aria-describedby="basic-addon1" value="{{$item->diskon}}" readonly="">
                        </div>
                    </div>
                </div>
                @else
                <div class="form-group row" id="bonus">
                    <label for="bonus" class="col-md-3">Bonus</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="bonus" id="bonus" value="{{$item->kode_produk_bonus}}" readonly>
                    </div>
                </div>
                @endif
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