<div id="FormEdit" class="content-page" hidden>
        <div class="col-md-4">
            @if ($user->foto == '')
            <img src="{{asset('images/foto.png')}}" alt="">
            @else
            <img src="{{Storage::url($user->foto)}}" class="img-responsive image" alt="">
            @endif
            <label for="">Upload image</label>
            <input type="file" name="" id="foto">
        </div>
        <div class="col-md-4">
            Name
            <h3>{{$user->nama_pembeli}}</h3>
        </div>
        <div class="col-md-4">
            Gender
            @if ($user->jenis_kelamin == 'Laki-laki')
                <h3>Male</h3>
            @else
                <h3>Female</h3>
            @endif
        </div>
        <div class="col-md-4">
            Email
            <h3>{{$user->email}}</h3>
        </div>
        <div class="col-md-4">
            Phone Number
            <h3>0987654321</h3>
        </div>
    <div class="row">
        <button id="Save" class="btn btn-success pull-right" style="margin:10px">Save</button>
        <button id="Cancel" class="btn btn-danger pull-right" style="margin:10px">Cancel</button>
    </div>
</div>