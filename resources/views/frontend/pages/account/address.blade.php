@extends('frontend.index')
@extends('frontend.pages.account.additional')
@section('produck')
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li><li><a href="{{route('pembeli.account')}}">My Account</a></li><li class="active">Address</li>
        </ul>
        @include('frontend.pages.account.alert')
        <div class="row margin-bottom-40">
            @include('frontend.pages.account.sidebar')
            @include('frontend.pages.account.add_address')
            <div id="Address" class="col-md-9 col-sm-7">
                <h1>My Address</h1>
                <div class="content-page">
                    <table class="table cell-bordered table-hover" width="100%">
                        <thead>
                            <th>#</th>
                            <th>Address Name</th>
                            <th width="300px">Address</th>
                            <th>Province</th>
                            <th>City</th>
                            <th width="200px">Option</th>
                        </thead>
                        <tbody>
                            @forelse ($address as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_alamat}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->provinsi}}</td>
                                <td>{{$item->kota}}</td>
                                <td align="center">
                                    <a href="{{route('edit.address', ['id' => $item->kode_alamat])}}" class="btn btn-info" style="color:white">Detail</a>
                                    <a href="#delete{{$item->kode_alamat}}" id="DeleteAddress" class="btn btn-danger fancybox-fast-view" style="color:white">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" align="center">You haven't add any address yet! Please, add your address!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <button id="AddAddress" class="btn btn-primary pull-right">Add Address</button><br><br>
                </div>
            </div>
        </div>
    </div>
    @foreach ($address as $alamat)
    <div id="delete{{$alamat->kode_alamat}}" style="display: none;">
        <div class="product-page product-pop-up">
            <form id="FormDelete" action="{{route('delete.address', ['id' => $alamat->kode_alamat])}}" method="POST">
                @csrf @method('DELETE')
            <div class="row"><div class="col-md-12"><h2>Confirmation!</h2></div></div>
            <div class="row"><div class="col-md-12"><h4>Are you sure want to delete this address?</h4></div></div>
            <div class="row"><div class="col-md-12"><button type="submit" class="btn btn-danger pull-right">Delete</button></div></div>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
