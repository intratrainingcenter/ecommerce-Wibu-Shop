<div id="TambahKategori" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form class="" action="{{route ('kategori.store')}}" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Produk Kategori</h4>
      </div>
      <div class="modal-body col-md-12">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="name">Nama Kategori</label>
          <input type="text" class="form-control"  name="nama_kategori" placeholder="Nama Kategori" required>
        </div>
        <div class="form-group">
          <label for="description">Keterangan</label>
          <input type="text" class="form-control"  name="keterangan" placeholder="Keterangan" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" title="batal" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success" title="simpan">Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>
