@foreach ($data as $key => $Detail)
<div id="DetailUser{{$Detail->kode_user}}" class="modal fade" role="dialog" data-backdrop="false">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail User</h4>
        </div>
          <div class="modal-body col-md-12">
            @csrf
            <center><img src="{{Storage::url($Detail->foto)}}" style="margin-bottom: 10px; border-radius: 100%; width: 200px; height:150px" alt=""></center>
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-8">
                        <input type="text" value="{{$Detail->name}}" class="form-control" name="name" value="{{ old('name') }}" disabled autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div class="col-md-8">
                        <input type="email" value="{{$Detail->email}}" class="form-control" name="email" value="{{ old('email') }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Status') }}</label>
                    <div class="col-md-8">
                      <input  type="text" class="form-control" value="{{ $Detail->status }}" name="status" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Jabatan') }}</label>
                    <div class="col-md-8">
                        <input  type="text" class="form-control" value="{{ $Detail->jabatan }}" name="jabatan" disabled>
                    </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('alamat') }}</label>
                  <div class="col-md-6">
                    <textarea name="alamat" rows="4" class="form-control" cols="100" disabled>{{ $Detail->alamat }}</textarea>
                  </div>
                </div>
          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" title="Tutup" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endforeach
