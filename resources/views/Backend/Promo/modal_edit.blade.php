<!-- Modal  Edit -->
<div class="modal fade" id="ModalEdit" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Promo</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="FormEdit" method="POST">
                    @csrf @method('PATCH')
                        <div class="form-group row">
                            <label for="kode_promo" class="col-md-3">Kode Promo</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="kode_promo" id="kode_promoedit" placeholder="PRM-01" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_promo" class="col-md-3">Nama Promo</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_promo" id="nama_promoedit" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_produk" class="col-md-3">Produk</label>
                            <div class="col-md-7">
                            <select name="kode_produk" id="kode_produkedit" class="form-control"  style="width: 325px;">
                                <option value="">--Pilih Produk--</option>
                                @foreach($data_produk as $item)
                                <option value="{{ $item->kode_produk }}">{{ $item->nama_produk }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success AddOpsi" key="edit">Tambah</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 col-md-offset-3">
                                <div class="responsive-table">
                                    <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="TableOpsi">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="barang_edit">
                            <label for="min" class="col-md-3">Pembelian Barang</label>
                            <div class="col-md-3">
                            <input type="number" name="min" id="min_edit" max="99999999" min="1" class="form-control" placeholder="Minimum" required>
                            </div>
                            <div class="tooltipmin" style="margin-right:100px"></div>
                            <div class="col-md-2">
                                <center><h4>s/d</h4></center>
                            </div>
                            <div class="tooltipmax" style="margin-left:350px"></div>
                            <div class="col-md-3">
                                <input type="number" name="max" id="max_edit" min="1" max="99999999" class="form-control" placeholder="Maximum" required>
                            </div>
                        </div>
                        <div class="form-group row" id="tanggal_edit">
                            <label for="tanggal_awal" class="col-md-3">Masa Berlaku</label>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_awal" id="awal_edit" class="form-control" required>
                            </div>
                            <div class="tooltipakhir" style="margin-right:100px"></div>
                            <div class="col-md-2">
                                <center><h4>s/d</h4></center>
                            </div>
                            <div class="tooltipawal" style="margin-left:350px"></div>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_akhir" id="akhir_edit" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_promo" class="col-md-3">Jenis Promo</label>
                            <div class="col-md-9">
                                <select name="jenis_promo" id="jenis_promoedit" class="form-control jenis_promo" required>
                                    <option value="">Pilih Jenis Promo</option>
                                    <option value="Diskon">Diskon</option>
                                    <option value="Bonus">Bonus</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row diskon" id="div_diskonedit" hidden>
                            <label for="jdiskon" class="col-md-3">Diskon</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                        <input  type="text" min="0" class="form-control input-diskon" placeholder="1000" name="diskon" id="diskon_edit" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row bonus" id="div_bonusedit" hidden>
                            <label for="bonus" class="col-md-3">Bonus</label>
                            <div class="col-md-9">
                            <select class="form-control input-bonus" name="kode_produk_bonus" id="produk_bonusedit" style="width: 400px;">
                                <option value="">none</option>
                                @foreach($data_produk as $item)
                                <option value="{{ $item->kode_produk }}">{{ $item->nama_produk }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default batalsimpan" key="edit" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="simpan_edit">Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
