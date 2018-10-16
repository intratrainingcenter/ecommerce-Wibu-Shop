@foreach ($data as $item)

<!-- Modal  Edit -->
<div class="modal fade" id="ModalEdit{{$item->kode_produk}}" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Produk</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="{{route('produk.update', ['id' => $item->kode_produk])}}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                        <div class="form-group row">
                            <label for="kode_produk" class="col-md-4">Kode Produk</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="kode_produk" id="kode_produkedit" value="{{$item->kode_produk}}" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_produk" class="col-md-4">Nama Produk</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="nama_produk" id="nama_produkedit" value="{{$item->nama_produk}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_ategori" class="col-md-4">Kategori</label>
                            <div class="col-md-8">
                            <select name="kode_kategori" id="kode_kategoriedit" class="form-control" required>
                                <option value="{{$item->kode_kategori}}">{{$item->GetKategori->nama_kategori}}</option>
                                @foreach ($data_kategori as $item)
                                    <option value="">--Pilih Kategori--</option>
                                    <option value="{{$item->kode_kategori}}">{{$item->nama_kategori}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hpp" class="col-md-4">HPP</label>
                            <div class="col-md-8">
                            <input type="number" name="hpp" id="hppedit" max="99999999" min="1" class="form-control" value="{{$item->hpp}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-md-4">Harga Jual</label>
                            <div class="col-md-8">
                                <input type="number" name="harga" id="hargaedit" min="1" max="99999999" class="form-control" value="{{$item->harga}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-md-4">Foto</label>
                            <div class="col-md-8">
                                <input type="file" name="foto" id="foto" class="form-control" onchange="ShowImage(this);"><br>
                                <img class="image" id="imageedit" src="{{Storage::url($item->foto)}}" height="150px" alt="">
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endforeach