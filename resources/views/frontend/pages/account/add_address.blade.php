<div id="AddAddressForm" class="col-md-9 col-sm-7" hidden>
    <h1>Add Address</h1>
    <div class="content-page">
        <form action="{{route('add.address')}}" method="POST">
        @csrf
            <div class="col-md-4">
                <div class="form-group">
                    <label for=""> Province</label>
                    <select id="province" class="form-control" name="id_provinsi" id="province">
                        <option value="">--Select Province--</option>
                    </select>
                    <input type="hidden" name="provinsi" id="province_name">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for=""> City</label>
                    <select class="form-control" name="id_kota" id="city">
                        <option value="">--Select City--</option>
                    </select>
                    <input type="hidden" name="kota" id="city_name">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="alamat" class="form-control" cols="30" rows="4" required></textarea>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success pull-right" style="margin:10px">Save</button>
                <button type="button" class="btn btn-danger pull-right CancelAddress" style="margin:10px">Cancel</button>
            </div>
        </form>
    </div>
</div>