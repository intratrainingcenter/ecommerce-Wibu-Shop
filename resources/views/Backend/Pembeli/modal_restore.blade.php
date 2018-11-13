@foreach ($data as $item)
<div class="modal fade" id="ModalRestore{{$item->kode_pembeli}}" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Restore Pembeli</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="{{route('restore.pembeli', ['id' => $item->kode_pembeli])}}" method="POST">
                @csrf @method('POST')
                <h4>Anda Yakin Ingin restore Pembeli <strong> {{$item->nama_pembeli}}</strong> ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Restore</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
