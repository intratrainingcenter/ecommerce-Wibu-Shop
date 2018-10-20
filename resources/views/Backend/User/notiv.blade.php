@if ($message = Session::get('success'))
  <div style="width:300px;float:right" class="alert alert-success alert-block notif">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif
