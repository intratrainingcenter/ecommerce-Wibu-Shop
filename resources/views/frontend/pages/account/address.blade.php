@extends('frontend.index')
@extends('frontend.pages.account.additional')
@section('produck')
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('pembeli.account')}}">My Account</a></li>
            <li class="active">Address</li>
        </ul>

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            @include('frontend.pages.account.sidebar')
            @include('frontend.pages.account.add_address')
            <!-- BEGIN CONTENT -->
            <div id="Address" class="col-md-9 col-sm-7">
                <h1>My Address</h1>
                <div class="content-page">
                    <table class="table cell-bordered table-hover" width="100%">
                        <thead>
                            <th>#</th>
                            <th width="300px">Address</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Option</th>
                        </thead>
                        <tbody>
                            @forelse ($address as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->provinsi}}</td>
                                <td>{{$item->kota}}</td>
                                <td align="center">
                                    <a href="{{route('edit.address', ['id' => $item->kode_alamat])}}" class="btn btn-info" style="color:white">Deetail</a>
                                    <button class="btn btn-danger">Delete</button>
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
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>
@endsection