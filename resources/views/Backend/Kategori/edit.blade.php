@foreach ($data as $item => $Edit)
<div id="EditKategori{{$Edit->kode_kategori}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form class="" action="{{route('kategori.update',$Edit->kode_kategori)}}" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Kategori</h4>
      </div>
      <div class="modal-body col-md-12">
        @csrf
        @method('PUT')
        <div class="form-group">
                  <input type="hidden" name="kode_kategori" value="{{ $Edit->kode_kategori }}">
                  <label for="name">Nama Kategori</label>
	                <input type="text" class="form-control"  name="nama_kategori" placeholder="Nama Kategori" value="{{ $Edit->nama_kategori }}" required>
	              </div>

	              <div class="form-group">
	                <label for="description">Keterangan</label>
	                <input type="text" class="form-control"  name="keterangan" placeholder="Keterangan" value="{{ $Edit->keterangan }}" required>
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
@endforeach
