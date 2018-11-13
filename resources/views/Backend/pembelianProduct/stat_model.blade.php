@foreach ($data as $item)

  @if($item->status == 'Pending')
    @include('Backend.pembelianProduct.modal.modal_st-pending')
  @elseif($item->status == 'Pengajuan')
    @include('Backend.pembelianProduct.modal.modal_st-pengajuan')
  @elseif($item->status == 'Accepted')
    @include('Backend.pembelianProduct.modal.modal_st-Accepted')
  @elseif($item->status == 'On Proccess')
    @include('Backend.pembelianProduct.modal.modal_st-Checking')
  @endif

@endforeach
