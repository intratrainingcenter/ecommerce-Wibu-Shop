<div id="AddAddressForm" class="col-md-9 col-sm-7" hidden>
    <h1>Add Address</h1>
    <div class="content-page">
        <form action="{{route('update.profile', ['id' => $user->id])}}" method="POST">
        @csrf @method('PATCH')
            <div class="col-md-4">
                <div class="form-group">
                    <label for=""> Province</label>
                    <select class="form-control" name="provinsi" id="province">
                        <option value="">--Select Province--</option>
                        @foreach ($province as $item)
                        <option value="{{$item['province_id']}}">{{$item['province']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for=""> City</label>
                    <select class="form-control" name="kota" id="city">
                        <option value="">--Select City--</option>
                    </select>
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