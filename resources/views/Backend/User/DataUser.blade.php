@extends('Backend.Layout.master')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>User<small>Data user</small> </h1> <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">User</li></ol>
    @include('Backend.User.notiv')
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
            <div class="box-header"><a style="float:right"  title="add" data-toggle="modal" data-target="#AddUser" class="box-title btn btn-success fa fa-plus"  href="#"></a></div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead><tr>
                        <th>#</th>
                        <th>name</th>
                        <th>Email</th>
                        <th>alamat</th>
                        <th>foto</th>
                        <th>status</th>
                        <th>jabatan</th>
                        <th>opsi</th>
                </tr></thead>
                  <tbody>
                  @foreach ($data as $index => $key)
                  <tr>
                    <td>{{ $index +1}}</td>
                    <td>{{$key->name}}</td>
                    <td>{{$key->email}}</td>
                    <td>{{$key->alamat}}</td>
                      @if ($key->foto != '')
                    <td><img src="{{Storage::url($key->foto)}}" width="200px" height="100px" alt=""></td>
                      @else
                    <td><img src="{{Storage::url('images/foto.png')}}" class="user-image" alt="User Image"></td>  
                      @endif
                    @if ($key->kode_user == auth::user()->kode_user)
                      <td></td>
                    @else
                    <td>@if ($key->status == 'Aktif' )
                          <a href="#" class="btn btn-success fa fa-eye" title="Aktif" data-toggle="modal" data-target="#nonAktifUser{{$key->kode_user}}"></a>
                        @else
                          <a href="#" class="btn btn-danger fa fa-eye-slash" title="nonAktif" data-toggle="modal" data-target="#AktifUser{{$key->kode_user}}"></a>
                        @endif</td>
                    @endif
                    <td>{{$key->jabatan}}</td>
                    @if ($key->kode_user == auth::user()->kode_user)
                          <td><a href="#" class="btn btn-info fa fa-info-circle" data-toggle="modal" data-target="#DetailUser{{$key->kode_user}}" title="Detail"></a></td>
                    @else <td> <a href="#" class="btn btn-info fa fa-info-circle" data-toggle="modal" data-target="#DetailUser{{$key->kode_user}}" title="Detail"></a>
                               <a href="#" class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#EditUser{{$key->kode_user}}" title="Edit"></a>
                               <a href="#" class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#DeleteUser{{$key->kode_user}}" title="Hapus"></a>
                    </td>@endif
                  </tr>
                 @endforeach
               </tbody>
             </table>
           </div>
        </div>
      </div>
    </div>
  </section>
</div>
@include('Backend.User.Pop_Up_Detail_User')@include('Backend.User.Pop_Up_add_User')@include('Backend.User.Pop_Up_Edit_User')@include('Backend.User.Pop_Up_Delete_User')@include('Backend.User.Pop_Up_Status')@include('Backend.User.UserJs')
@endsection
