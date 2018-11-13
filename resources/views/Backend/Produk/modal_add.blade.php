<div class="modal fade" id="ModalAdd" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Produk</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('POST')
                            <div class="form-group row">
                                <label for="kode_produk" class="col-md-4">Kode Produk</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="kode_produk" id="kode_produk" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_produk" class="col-md-4">Nama Produk</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_ategori" class="col-md-4">Kategori</label>
                                <div class="col-md-8">
                                <select name="kode_kategori" id="kode_kategori" class="form-control" required>
                                    <option value="">--Pilih Kategori--</option>
                                    @foreach ($data_kategori as $item)
                                        <option value="{{$item->kode_kategori}}">{{$item->nama_kategori}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hpp" class="col-md-4">HPP</label>
                                <div class="col-md-8">
                                <input type="number" name="hpp" id="hpp" max="99999999" min="0" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-md-4">Harga Jual</label>
                                <div class="col-md-8">
                                    <input type="number" name="harga" id="harga" min="0" max="99999999" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto" class="col-md-4">Foto</label>
                                <div class="col-md-8">
                                    <input type="file" name="foto" id="foto" class="form-control" onchange="ShowImage(this);" required><br>
                                    <img class="image" id="image" src="" alt="">
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
