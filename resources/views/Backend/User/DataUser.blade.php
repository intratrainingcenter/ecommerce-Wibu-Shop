@extends('Backend.Layout.master')
@section('title') User @endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>User<small>Data user</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">User</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
            <a style="float:right"  title="add" data-toggle="modal" data-target="#AddUser" class="btn btn-success fa fa-plus"  href="#"></a>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
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
                  <td><a href="#">{{$key->status}}</a></td>
                  <td>{{$key->jabatan}}</td>
                  <td>
                    <a href="#" class="btn btn-info " data-toggle="modal" data-target="#DetailUser{{$key->kode_user}}" title="Detail">Detail</a>
                    <a href="#" class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#EditUser{{$key->kode_user}}" title="Edit"></a>
                    <a href="#" class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#DeleteUser{{$key->kode_user}}" title="Hapus"></a>
                  </td>
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
@include('Backend.User.Pop_Up_add_User')
@endsection
