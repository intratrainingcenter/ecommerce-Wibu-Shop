@foreach ($data->transaksi as $group)
  @foreach ($group as $item)

  <!-- Modal  Cancel -->
  <div class="modal fade" id="ModalCancel{{$item->kode_transaksi_pembelian}}" data-backdrop="false">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pembatalan Transaksi</h4>
            </div>
            <form role="form" action="{{route('editStatus')}}" method="POST">
              <div class="modal-body">
                  @csrf @method('POST')
                  <input type="hidden" name="kode" value="{{$item->kode_transaksi_pembelian}}">
                  <input type="hidden" name="status" value="Cancelled">
                  <h4> <strong> Batalkan Transaksi {{$item->kode_transaksi_pembelian}} ? </strong> </h4>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger">Ok</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  @endforeach
@endforeach
