<div id="ProfilUser{{auth::user()->kode_user}}" class="modal fade" role="dialog" data-backdrop="false">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('user.update',auth::user()->kode_user) }}" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit User</h4>
        </div><div class="modal-body col-md-12">
                @csrf @method('put')
                @if (auth::user()->foto != '')
                  <center><img src="{{Storage::url(auth::user()->foto)}}" style="margin-bottom: 10px; border-radius: 100%; width: 200px; height:150px" alt=""></center>
                  @else
                  <center><img src="{{Storage::url('images/foto.png')}}" style="margin-bottom: 10px; border-radius: 100%; width: 200px; height:150px" alt=""></center>
                @endif
                <input type="hidden" name="id" value="{{ auth::user()->id }}" >
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="ahmad" class="form-control " name="name" value="{{ auth::user()->name }}" required >
                    </div>
                </div> <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                    <div class="col-md-6">
                        <input  type="email" placeholder="ada@gmail.com" class="form-control " name="email" value="{{ auth::user()->email }}" required>
                    </div>
                </div><div class="form-group row">
                  <label  class="col-md-4 col-form-label text-md-right">jabatan</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" value="{{auth::user()->jabatan}}" disabled required>
                    <input type="hidden" class="form-control" value="{{auth::user()->jabatan}}" name="jabatan"  required>
                  </div>
                </div> <div class=" form-group row">
                    <label class="edit_password col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                        <input  type="password"  class=" edit_password form-control edit" name="password" >
                    </div>
                </div> <div class=" form-group row">
                    <label  class=" edit_password-confirm col-md-4 col-form-label text-md-right">Confirm Password</label>
                    <div class="col-md-6">
                        <input  type="password" class="edit_password-confirm form-control edit" name="password_confirmation" >
                    </div>
                </div> <div class="form-group row">
                      <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('foto') }}</label>
                      <div class="col-md-6">
                          <input type="file" name="foto" class="form-control" onchange="ShowImage(this);" ><br>
                          <img class="image" src=""width="150px" height="100px" alt="">
                      </div>
                </div> <div class="form-group row">
                  <label  class="col-md-4 col-form-label text-md-right">alamat</label>
                  <div class="col-md-6">
                    <textarea name="alamat" rows="8" placeholder="dk.Klompok RT/Rw = 001/005 ds.Tanjung kec.Kedungtuban Kab.Blora" class="form-control" cols="80">{{auth::user()->alamat}}</textarea>
                    <input type="hidden" class="form-control" value="{{auth::user()->status}}" name="status" required>
                  </div>
                </div>
              </div>
        <div class="modal-footer">
          @if (auth::user()->jabatan == 'Admin')
            <button type="button" class="Close btn btn-danger" title="Tutup" data-dismiss="modal">Tutup</button>
          @else
        <button type="button" class="Close btn btn-danger" title="Batal" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-info Reset_password" title="Reset password" >Reset password</button>
        <button type="button" class="btn btn-warning Batal_Reset_password" title="Batal Reset password" >Batal Reset password</button>
        <button type="submit" class="btn btn-success save" title="simpan" >Simpan</button>
      @endif
      </div>
    </div>
  </Form>
  </div>
</div>
