@foreach ($data as $key => $Delete)
<div id="AktifUser{{$Delete->kode_user}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('nonAktif',$Delete->kode_user) }}">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus User</h4>
        </div>
          <div class="modal-body col-md-12">
                @csrf
                @method('put')
                  <center style="font-size:30px"> Apkah Anda Yakin </center>
                  <center style="font-size:30px"> meng Aktifkan  </center>
                  <center style="font-size:40px"><b> {{ $Delete->name }} </b>??</center>
                    <input type="hidden" name="kode_user" value="{{ $Delete->kode_user }}" >
                    <input type="hidden" name="status" value="Aktif" >
          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" title="batal" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success" title="Aktif" >Aktif</button>
      </div>
    </div>
  </Form>
  </div>
</div>
@endforeach
@foreach ($data as $key => $Delete)
<div id="nonAktifUser{{$Delete->kode_user}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('Aktif',$Delete->kode_user) }}">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus User</h4>
        </div>
          <div class="modal-body col-md-12">
                @csrf
                @method('put')
                  <center style="font-size:30px"> Apkah Anda Yakin </center>
                  <center style="font-size:30px"> Menon Aktifkan </center>
                  <center style="font-size:40px"><b> {{ $Delete->name }} </b>??</center>
                    <input type="hidden" name="kode_user" value="{{ $Delete->kode_user }}" >
                    <input type="hidden" name="status" value="nonAktif" >
          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" title="batal" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success" title="Non Aktif" >Non Aktif</button>
      </div>
    </div>
  </Form>
  </div>
</div>
@endforeach
