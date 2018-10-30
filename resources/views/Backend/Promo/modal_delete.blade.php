@foreach ($data as $item)

<!-- Modal  Delete -->
<div class="modal fade" id="ModalDelete{{$item->kode_promo}}" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus promo</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="{{route('promo.destroy', ['id' => $item->kode_promo])}}" method="POST">
                @csrf @method('DELETE')
                <h4>Anda Yakin Ingin Menghapus Data Promo Dari <strong> {{$item->nama_promo}}</strong> ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endforeach
