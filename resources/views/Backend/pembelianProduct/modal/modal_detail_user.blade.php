@foreach ($data->users as $item)
<div class="modal fade" id="ModalDetailUser{{$item->kode_user}}" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detai Petugas</h4>
            </div>
            <div class="modal-body">
                @if($item->foto != NULL)
                <center><img src="{{Storage::url($item->foto)}}" width="200px" alt=""></center><br>
                @else
                <center><img src="{{asset('/images/foto.png')}}" width="200px" alt=""></center><br>
                @endif
                <table width="100%">
                    <thead>
                        <th width="40%"></th><th width="10%"></th><th width="40%"></th>
                    </thead>
                    <tbody>
                      <tr>
                          <td><label for="">Kode User</label></td><td>:</td><td>{{$item->kode_user}}</td>
                      </tr>
                      <tr>
                          <td><label for="">Nama </label></td><td>:</td><td>{{$item->name}}</td>
                      </tr>
                      <tr>
                        <td><label for="">Email</label></td><td>:</td><td>{{$item->email}}</td>
                      </tr>
                      <tr>
                        <td><label for="">Jabatan</label></td><td>:</td><td>{{$item->jabatan}}</td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
