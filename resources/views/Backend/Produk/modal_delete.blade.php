@foreach ($data as $item)
<div class="modal fade" id="ModalDelete{{$item->kode_produk}}" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Produk</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="{{route('produk.destroy', ['id' => $item->kode_produk])}}" method="POST">
                @csrf @method('DELETE')
                <h4>Anda Yakin Ingin Menghapus Data Produk Dari <strong> {{$item->nama_produk}}</strong> ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
