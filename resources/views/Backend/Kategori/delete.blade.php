@foreach ($data as $delete)
<div id="HapusKategori{{$delete->kode_kategori}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form class="" action="{{route('kategori.destroy',$delete->kode_kategori)}}" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Kategori</h4>
      </div>
      <div class="modal-body col-md-12">
        @csrf
        @method('DELETE')
        <center>
          <h3>Anda Yakin Ingin Menghapus Kategori?</h3>
        </center>
        <center>
          <b>
            <h2> {{$delete->nama_kategori}} </h2>
          </b>
        </center>
        <hr>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" title="batal" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" title="hapus">Hapus</button>
        </div>
      </div>
    </form>
    </div>
    </div>
@endforeach
