<div id="AddUser" class="modal fade" role="dialog" data-backdrop="false">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah User</h4>
        </div>
          <div class="modal-body col-md-12">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="ahmad" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                </div> <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div class="col-md-6">
                        <input  type="email" placeholder="ada@gmail.com" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>
                </div> <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-6">
                        <input  type="password"  class="form-control" name="password" required>
                    </div>
                </div> <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <div class="col-md-6">
                        <input  type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div> <div class="form-group row">
                      <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('foto') }}</label>
                      <div class="col-md-6">
                          <input type="file" name="foto" class="form-control" onchange="ShowImage(this);" required><br>
                          <img class="image" src="" alt="">
                      </div>
                </div> <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('alamat') }}</label>
                  <div class="col-md-6">
                    <textarea name="alamat" rows="8" placeholder="dk.Klompok RT/Rw = 001/005 ds.Tanjung kec.Kedungtuban Kab.Blora" class="form-control" cols="80"></textarea>
                    <input  type="hidden" class="form-control" value="nonAktif" name="status" required>
                    <input i type="hidden" class="form-control" value="Admin" name="jabatan" required>
                  </div>
                </div>
          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" title="Batal" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success" title="Simpan" >Simpan</button>
      </div>
    </div>
  </Form>
  </div>
</div>
