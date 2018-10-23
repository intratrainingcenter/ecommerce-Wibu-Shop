<div id="FormEdit" class="col-md-9 col-sm-7" hidden>
    <h1>Edit Profile</h1>
    <div class="content-page">
        <form action="{{route('update.profile', ['id' => $user->id])}}" enctype="multipart/form-data" method="POST" id="EditForm">
            @csrf @method('PATCH')
            <div class="col-md-4">
                @if ($user->foto == '')
                <img src="{{asset('images/foto.png')}}" alt="">
                @else
                <img src="{{Storage::url($user->foto)}}" class="img-responsive image" alt="">
                @endif
                <label for="">Upload image</label>
                <input class="form-control" type="file" name="foto" id="foto">
            </div>
            <div class="col-md-4">
                <label for=""> Name</label>
                <input type="text" class="form-control" name="nama_pembeli" value="{{$user->nama_pembeli}}" required>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for=""> Gender</label>
                <select class="form-control" name="jenis_kelamin" required>
                    @if ($user->jenis_kelamin == 'Laki-laki')
                    <option value="{{$user->jenis_kelamin}}" selected>Male</option>
                    <option value="Perempuan">Female</option>
                    @else
                    <option value="Laki-laki">Male</option>
                    <option value="{{$user->jenis_kelamin}}" selected>Female</option>
                    @endif
                </select>
                </div>
            </div>
            <div class="col-md-4">
                <label for=""> Email</label>
                <input class="form-control" type="text" name="email" value="{{$user->email}}" required>
            </div>
            <div class="col-md-4">
                <label for=""> Phone Number </label>
                <input id="Phone" class="form-control" type="number" name="telepon" value="{{$user->telepon}}" required>
            </div>
        <div class="row">
            <button type="submit" class="btn btn-success pull-right" style="margin:10px">Save</button>
            <button id="CancelEditProfile" type="button" class="btn btn-danger pull-right" style="margin:10px">Cancel</button>
        </div>
    </form>
    </div>
</div>