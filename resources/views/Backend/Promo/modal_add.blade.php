<div class="modal fade" id="ModalAdd" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Promo</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="{{route('promo.store')}}" method="POST">
                    @csrf @method('POST')
                        <div class="form-group row">
                            <label for="kode_promo" class="col-md-3">Kode Promo</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="kode_promo" id="kode_promo" value="" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_promo" class="col-md-3">Nama Promo</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_promo" id="nama_promo" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_produk" class="col-md-3">Produk</label>
                            <div class="col-md-9">
                            <select name="kode_produk" id="kode_produk" class="form-control" required>
                                <option value="">--Pilih Produk--</option>
                                @foreach($data_produk as $item)
                                <option value="{{ $item->kode_produk }}">{{ $item->nama_produk }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row" id="barang">
                            <label for="min" class="col-md-3">Pembelian Barang</label>
                            <div class="col-md-4">
                                <input type="number" name="min" min="1" class="form-control min" placeholder="Minimum" required>
                            </div>
                            <div class="tooltipmin" style="margin-right:100px"></div>
                            <div class="col-md-1">
                                <center><h4>s/d</h4></center>
                            </div>
                            <div class="tooltipmax" style="margin-left:350px"></div>
                            <div class="col-md-4">
                                <input type="number" name="max" min="1" class="form-control max" placeholder="Maximum" required>
                            </div>
                        </div>
                        <div class="form-group row" id="tanggal">
                            <label for="tanggal_awal" class="col-md-3">Masa Berlaku</label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_awal" class="form-control awal">
                            </div>
                            <div class="tooltipakhir" style="margin-right:100px"></div>
                            <div class="col-md-1">
                                <center><h4>s/d</h4></center>
                            </div>
                            <div class="tooltipawal" style="margin-left:350px"></div>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_akhir" class="form-control akhir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_promo" class="col-md-3">Jenis Promo</label>
                            <div class="col-md-9">
                                <select name="jenis_promo" id="jenis_promo" class="form-control jenis_promo" required>
                                    <option value="">Pilih Jenis Promo</option>
                                    <option value="Diskon">Diskon</option>
                                    <option value="Bonus">Bonus</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row diskon" hidden>
                            <label for="jenis_promo" class="col-md-3">Diskon</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                    <input  type="text" min="0" class="form-control" placeholder="1000" id="diskon" name="diskon" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row bonus" hidden>
                            <label for="bonus" class="col-md-3">Bonus</label>
                            <div class="col-md-9">
                            <select class="form-control" id="kode_produk_bonus" name="kode_produk_bonus" required="">
                                <optgroup label="Pilihan Barang Bonus">
                                    <option value="">None</option>
                                    @foreach($data_produk as $item)
                                    <option value="{{ $item->kode_produk }}">{{ $item->nama_produk }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>