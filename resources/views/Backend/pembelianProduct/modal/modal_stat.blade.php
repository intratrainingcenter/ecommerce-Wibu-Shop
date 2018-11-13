@foreach ($data->transaksi as $group)
  @foreach ($group as $item)

  <!-- Modal  Status -->
  <div class="modal fade" id="ModalStat{{$item->kode_transaksi_pembelian}}" data-backdrop="false">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Option</h4>
            </div>
            @if($item->status == 'Pending')
              <form role="form" action="{{route('editStatus')}}" method="POST">
                <div class="modal-body">
                    @csrf @method('POST')
                    <input type="hidden" name="kode" value="{{$item->kode_transaksi_pembelian}}">
                    <input type="hidden" name="status" value="{{$item->status}}">
                    <h4> <strong> Lakukan Pengajuan </strong> </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ok</button>
                </div>
              </form>
            @elseif($item->status == 'Pengajuan')
              <div class="modal-body">
                  <h4> <strong> Menunggu Persetujuan Owner </strong> </h4>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
            @elseif($item->status == 'Accepted')
              <form role="form" action="{{route('editStatus')}}" method="POST">
                <div class="modal-body">
                    @csrf @method('POST')
                    <input type="hidden" name="kode" value="{{$item->kode_transaksi_pembelian}}">
                    <input type="hidden" name="status" value="{{$item->status}}">
                    <h4> <strong> Mulai Proses Transaksi {{$item->kode_transaksi_pembelian}}</strong> </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ok</button>
                </div>
              </form>
            @elseif($item->status == 'On Proccess')
              <form role="form" action="{{route('editStatus')}}" method="POST">
                <div class="modal-body">
                    @csrf @method('POST')
                    <input type="hidden" name="kode" value="{{$item->kode_transaksi_pembelian}}">
                    <input type="hidden" name="status" value="{{$item->status}}">
                    <h4> <strong> Melakukan Pengecekan </strong> </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ok</button>
                </div>
              </form>
            @elseif($item->status == 'Checking')
              <form role="form" action="{{route('editStatus')}}" method="POST">
                <div class="modal-body">
                    @csrf @method('POST')
                    <input type="hidden" name="kode" value="{{$item->kode_transaksi_pembelian}}">
                    <input type="hidden" name="status" value="{{$item->status}}">
                    <h4> <strong> Selesai Pengecekan </strong> </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ok</button>
                </div>
              </form>
            @elseif($item->status == 'Done')
              <div class="modal-body">
                  <h4> <strong>Transaksi {{$item->kode_transaksi_pembelian}} Selesai Pada {{date('d, F Y', strtotime($item->updated_at))}}</strong> </h4>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
            @elseif($item->status == 'Cancelled')
              <div class="modal-body">
                  <h4> <strong> Pengajuan Tidak Disetujui </strong> </h4>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
            @endif
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  @endforeach
@endforeach
