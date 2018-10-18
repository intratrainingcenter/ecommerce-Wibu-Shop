@foreach ($data as $item)

<!-- Modal  Edit -->
<div class="modal fade" id="ModalEdit{{$item->kode_promo}}" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Promo</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="{{route('promo.update', ['id' => $item->kode_promo])}}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                        <div class="form-group row">
                            <label for="kode_promo" class="col-md-3">Kode Promo</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="kode_promo" id="kode_promoedit" value="{{$item->kode_promo}}" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_promo" class="col-md-3">Nama Promo</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="nama_promo" id="nama_promoedit" value="{{$item->nama_promo}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_produk" class="col-md-3">Produk</label>
                            <div class="col-md-8">
                            <select name="kode_produk" id="kode_produkedit" class="form-control" required>
                                <option value="{{$item->kode_produk}}">{{$item->GetProduk->nama_produk}}</option>
                                <optgroup label="Pilih Produk">
                                @foreach($data_produk as $produk)
                                <option value="{{ $produk->kode_produk }}">{{ $produk->nama_produk }}</option>
                                @endforeach
                                </optgroup>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="min" class="col-md-3">Pembelian Barang</label>
                            <div class="col-md-3">
                            <input type="number" name="min" id="minedit" max="99999999" min="0" class="form-control" value="{{$item->min}}" placeholder="Minimum" required>
                            </div>
                            <div class="col-md-2">
                                <center><h4>s/d</h4></center>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="max" id="maxedit" min="0" max="99999999" class="form-control" value="{{$item->max}}" placeholder="Maximum" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_awal" class="col-md-3">Masa Berlaku</label>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_awal" id="tanggal_awaledit" class="form-control" value="{{$item->tanggal_awal}}" required>
                            </div>
                            <div class="col-md-2">
                                <center><h4>s/d</h4></center>
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_akhir" id="tanggal_akhiredit" class="form-control" value="{{$item->tanggal_akhir}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_promo" class="col-md-3">Jenis Promo</label>
                            <div class="col-md-8">
                                <select name="jenis_promo" id="jenis_promoedit" class="form-control jenis_promo" required>
                                    <option value="">Pilih Jenis Promo</option>
                                    <option value="Diskon">Diskon</option>
                                    <option value="Bonus">Bonus</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row diskon" hidden>
                            <label for="jdiskon" class="col-md-3">Diskon</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                        <input  type="text" min="0" class="form-control input-diskon" placeholder="1000" name="diskon" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row bonus" hidden>
                            <label for="bonus" class="col-md-3">Bonus</label>
                            <div class="col-md-8">
                            <select class="form-control input-bonus" name="kode_produk_bonus">
                                <option value="">none</option>
                                @foreach($data_produk as $item)
                                <option value="{{ $item->kode_produk }}">{{ $item->nama_produk }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="simpanedit">Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endforeach