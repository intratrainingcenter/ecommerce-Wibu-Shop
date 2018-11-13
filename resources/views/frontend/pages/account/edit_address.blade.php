
<div id="EditAddressForm" class="col-md-9 col-sm-7" hidden>
    <h1>Edit Address</h1>
    <div class="content-page">
        <form action="{{route('update.address', ['id' => $address->kode_alamat])}}" method="POST">
        @csrf @method('PATCH')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for=""> Province</label>
                    <select id="province" class="form-control" name="id_provinsi" id="province" required>
                        <option value="">--Select Province--</option>
                    </select>
                    <input type="hidden" name="provinsi" id="province_name" value="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for=""> City</label>
                    <select class="form-control" name="id_kota" id="city" required>
                        <option value="">--Select City--</option>
                    </select>
                    <input type="hidden" name="kota" id="city_name" value="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Address</label><textarea name="alamat" class="form-control" cols="30" rows="4" required>{{$address->alamat}}</textarea>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-8" style="margin-top:-15px">
                    <div class="form-group">
                        <label for="">Address Name</label><input type="text" name="nama_alamat" class="form-control" value="{{$address->nama_alamat}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right" style="margin:10px">Save</button>
                        <a href="{{route('edit.address', ['id' => $address->kode_alamat])}}" class="btn btn-danger pull-right" style="color:white; margin:10px">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
