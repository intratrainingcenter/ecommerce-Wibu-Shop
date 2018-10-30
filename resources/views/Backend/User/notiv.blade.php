@if ($message = Session::get('success'))
  <div class="col-md-12 ">
    <div class="alert alert-success alert-dismissible col-md-6 col-md-offset-3 notif" style="position:absolute;z-index:100">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
      <p>{{ $message }}</p>
    </div>
  </div>
@endif
@if ($message = Session::get('fatal'))
  <div class="col-md-12 ">
    <div class="alert alert-danger alert-dismissible col-md-6 col-md-offset-3 notif" style="position:absolute;z-index:100">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Gagal!</h4>
      <strong>{{ $message }}</strong>
    </div>
  </div>
@endif
