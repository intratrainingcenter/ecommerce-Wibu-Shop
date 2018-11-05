@foreach ($data as $key => $Delete)
<div id="DeleteUser{{$Delete->kode_user}}" class="modal fade" role="dialog" data-backdrop="false">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('user.destroy',$Delete->kode_user) }}">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus User</h4>
        </div>
          <div class="modal-body col-md-12">
                @csrf
                @method('delete')
                  <center style="font-size:30px"> Apkah Anda Yakin </center>
                  <center style="font-size:30px"> menghapus  </center>
                  <center style="font-size:40px"><b> {{ $Delete->name }} </b>??</center>
                    <input type="hidden" name="kode_user" value="{{ $Delete->kode_user }}" required autofocus>
          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" title="Batal" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success" title="Hapus" >Hapus</button>
      </div>
    </div>
  </Form>
  </div>
</div>
@endforeach
