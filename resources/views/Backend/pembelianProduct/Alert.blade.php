{{--
  @if (session('alertfail'))
  <div class="col-md-12 MyAlert">
      <div class="alert alert-danger alert-dismissible col-md-6 col-md-offset-3" style="position:absolute">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
          <p>{{session('alertfail')}}</p>
      </div>
  </div>
  @elseif(session('alertsuccess'))
  <div class="col-md-12 MyAlert">
      <div class="alert alert-danger alert-dismissible col-md-6 col-md-offset-3" style="position:absolute">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
          <p>{{session('alertsuccess')}}</p>
      </div>
  </div>
  @endif
  --}}
