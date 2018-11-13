@foreach ($data->transaksi as $group)
  @foreach ($group as $item)
  @if($loop->first)
    <tr>
      <td>{{$no++}}</td>
      <td>{{$item->kode_transaksi_pembelian}}</td>
      {{--
        --}}
      @foreach($data->users as $user)
        @if($item->kode_user == $user->kode_user)
        <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ModalDetailUser{{$user->kode_user}}"> <i class="fa fa-user"></i> {{$user->name}}</button></td>
        @endif
      @endforeach
      <td align="right">Rp. {{number_format($item->sub_total,0, ',' , '.')}}</td>
      <td>{{date('d, F Y', strtotime($item->created_at))}}</td>
      <td align="right">
        @if($item->status == 'Pending')
        <span class="label label-success">Pending</span>
        @elseif($item->status == 'Pengajuan')
        <span class="label label-primary">Pengajuan</span>
        @elseif($item->status == 'Accepted')
        <span class="label label-warning">Accepted</span>
        @elseif($item->status == 'On Proccess')
        <span class="label bg-purple">On Proccess</span>
        @elseif($item->status == 'Checking')
        <span class="label label-default">Checking</span>
        @elseif($item->status == 'Done')
        <span class="label label-info">Done</span>
        @elseif($item->status == 'Cancelled')
        <span class="label label-danger">Cancelled</span>
        @endif|
        @if($item->status == 'Pengajuan')
        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalAcc{{$item->kode_transaksi_pembelian}}"><i class="fa fa-gear"></i></button>
        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ModalCancel{{$item->kode_transaksi_pembelian}}"><i class="fa fa-times" style="width: 10px;"></i></button>
        @else
        <button type="button" class="btn btn-primary btn-xs" disabled><i class="fa fa-gear"></i></button>
        <button type="button" class="btn btn-danger btn-xs" disabled><i class="fa fa-times" style="width: 10px;"></i></button>
        @endif
        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ModalDetail{{$item->kode_transaksi_pembelian}}"><i class="fa fa-info" style="width: 10px;"></i></button>
      </td>
    </tr>
    @endif
  @endforeach
@endforeach
