@extends('Backend.Layout.master')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>User<small>Data user</small> </h1>
    <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">User</li></ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
            <a style="float:right"  title="add" data-toggle="modal" data-target="#AddUser" class="btn btn-success"  href="#">Tambah</a>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped" width="100%" cellspacing="0">
              <thead><tr>
                        <th>#</th>
                        <th>name</th>
                        <th>Email</th>
                        <th>alamat</th>
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
                  @if ($key->kode_user == auth::user()->kode_user)
                    <td></td>
                    @else
                  <td> @if ($key->status == 'Aktif' )
                      <a href="#" class="btn btn-success" data-toggle="modal" data-target="#nonAktifUser{{$key->kode_user}}">Aktif</a>
                    @else
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#AktifUser{{$key->kode_user}}">Non Aktif</a>
                    @endif
                  </td>
                @endif
                  <td>{{$key->jabatan}}</td>
                  @if ($key->kode_user == auth::user()->kode_user)
                    <td>
                      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#DetailUser{{$key->kode_user}}" title="Edit">Detail</a>
                    </td>
                  @else
                  <td>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#DetailUser{{$key->kode_user}}" title="Edit">Detail</a>
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#EditUser{{$key->kode_user}}" title="Edit">Edit</a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#DeleteUser{{$key->kode_user}}" title="Hapus">Hapus</a>
                  </td>
                @endif
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
@include('Backend.User.Pop_Up_Detail_User')
@include('Backend.User.Pop_Up_add_User')
@include('Backend.User.Pop_Up_Edit_User')
@include('Backend.User.Pop_Up_Delete_User')
@include('Backend.User.Pop_Up_Status')
@include('Backend.User.UserJs')
@endsection
