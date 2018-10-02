@foreach ($data as $key => $Edit)
<div id="EditUser{{$Edit->kode_user}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('user.update',$Edit->kode_user) }}">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit User</h4>
        </div><div class="modal-body col-md-12">
                @csrf @method('put')
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="ahmad" class="form-control " name="name" value="{{ $Edit->name }}" required autofocus>
                    </div>
                </div> <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                    <div class="col-md-6">
                        <input  type="email" placeholder="ada@gmail.com" class="form-control " name="email" value="{{ $Edit->email }}" required>
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
                  <label  class="col-md-4 col-form-label text-md-right">alamat</label>
                  <div class="col-md-6">
                    <textarea name="alamat" rows="8" placeholder="dk.Klompok RT/Rw = 001/005 ds.Tanjung kec.Kedungtuban Kab.Blora" class="form-control" cols="80">{{$Edit->alamat}}</textarea>
                    <input type="hidden" class="form-control" value="{{$Edit->status}}" name="status" required>
                    <input type="hidden" class="form-control" value="{{$Edit->jabatan}}" name="jabatan" required>
                  </div>
                </div><div class="form-group row">
                  <label  class="col-md-4 col-form-label text-md-right">Jabatan</label>
                  <div class="col-md-6">
                    <select class="form-control" name="jabatan">
                      <option value="{{$Edit->jabatan}}">{{$Edit->jabatan}}</option>
                      <option value="Admin">Admin</option>
                      <option value="Spv">Spv</option>
                      <option value="Owner">Owner</option>
                    </select>
                  </div>
                </div>
              </div>
        <div class="modal-footer">
        <button type="button" class="Close btn btn-danger" title="Batal" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-info Reset_password" title="Reset password" >Reset password</button>
        <button type="button" class="btn btn-warning Batal_Reset_password" title="Batal Reset password" >Batal Reset password</button>
        <button type="submit" class="btn btn-success save" title="simpan" >Simpan</button>
      </div>
    </div>
  </Form>
  </div>
</div>
@endforeach
