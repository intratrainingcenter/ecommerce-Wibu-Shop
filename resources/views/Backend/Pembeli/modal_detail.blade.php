@foreach ($data as $item)
<div class="modal fade" id="ModalDetail{{$item->kode_pembeli}}" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Pembeli</h4>
            </div>
            <div class="modal-body">
                @if($item->foto != NULL)
                  <center><img src="{{Storage::url($item->foto)}}" width="200px" alt=""></center><br>
                @else
                  <center><img src="{{asset('images/avatar.png')}}" width="200px" alt=""></center><br>
                @endif
                <table width="100%">
                    <thead>
                        <th width="40%"></th><th width="10%"></th><th width="40%"></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><label for="">Kode Pembeli</label></td><td>:</td><td>{{$item->kode_pembeli}}</td>
                        </tr>
                        <tr>
                            <td><label for="">Nama Pembeli</label></td><td>:</td><td>{{$item->nama_pembeli}}</td>
                        </tr>
                        <tr>
                            <td><label for="">Jenin Kelamin</label></td><td>:</td><td>{{$item->jenis_kelamin}}</td>
                        </tr>
                        <tr>
                            <td><label for="">Email</label></td><td>:</td><td>{{$item->email}}</td>
                        </tr>
                        <tr>
                            <td><label for="">Telepon</label></td><td>:</td><td>{{$item->telepon}}</td>
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
