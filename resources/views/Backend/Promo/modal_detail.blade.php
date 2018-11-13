<!-- Modal  Detail -->
<div class="modal fade" id="ModalDetail" data-backdrop="false">
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
                        <input type="text" class="form-control" name="kode_promo" id="kode_promodetail" readonly/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_promo" class="col-md-3">Nama Promo</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_promo" id="nama_promodetail" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_produk" class="col-md-3">Produk</label>
                    <div class="col-md-9">
                        <div class="responsive-table">
                            <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                    </tr>
                                </thead>
                                <tbody class="TableOpsi">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="min" class="col-md-3">Pembelian Barang</label>
                    <div class="col-md-3">
                    <input type="number" name="min" max="99999999" min="1" class="form-control" placeholder="Minimum" id="min_detail" readonly>
                    </div>
                    <div class="col-md-2">
                        <center><h4>s/d</h4></center>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="max" min="1" max="99999999" class="form-control" placeholder="Maximum" id="max_detail" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_awal" class="col-md-3">Masa Berlaku</label>
                    <div class="col-md-3">
                        <input type="date" name="tanggal_awal" class="form-control" id="awal_detail" readonly>
                    </div>
                    <div class="col-md-2">
                        <center><h4>s/d</h4></center>
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="tanggal_akhir" class="form-control" id="akhir_detail" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_promo" class="col-md-3">Jenis Promo</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="jenis_promo" id="jenis_promodetail" readonly>
                    </div>
                </div>
                <div class="form-group row" id="div_diskondetail" hidden>
                    <label for="diskon" class="col-md-3">Diskon</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" min="0" class="form-control" placeholder="1000" id="diskon_detail" name="diskon" aria-describedby="basic-addon1" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group row" id="div_bonusdetail" hidden>
                    <label for="bonus" class="col-md-3">Bonus</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="bonus" id="bonus_detail" readonly>
                    </div>
                </div>
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
