@extends('Backend.Layout.master')
@extends('Backend.Kategori.additional')

@section('title')
    Product Category
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Product Category
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Product Category</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
          <div class="box-tools">
            <a class="btn btn-success fa fa-plus" title="add" data-toggle="modal" data-target="#AddCategory" style="float:right;" href="#"></a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Code Category</th>
                  <th>Name Category</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $index => $item)
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$item->kode_kategori}}</td>
                  <td>{{$item->nama_kategori}}</td>
                  <td>{{$item->keterangan}}</td>
                  <td>
                    <a type="button" class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#EditCategory{{$item->kode_kategori}}" href="#"></a>
                    <a type="button" class="btn btn-danger fa  fa-trash" data-toggle="modal" data-target="#DeleteCategory{{$item->kode_kategori}}"></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
  {{-- ---------add------------ --}}
  <div id="AddCategory" class="modal fade" role="dialog">
    <div class="modal-dialog">
      {{Form::open(['route' => 'kategori.store'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product Category</h4>
        </div>
        <div class="modal-body col-md-12">
          @csrf
          @method('POST')
          {{
          Form::hidden('kode_kategori', '',['placeholder'=>'kode','class' => 'form-control','required','autofocus'])
          }}{{
          Form::label('nama_kategori', 'Category Name', ['class' => 'awesome'])
          }}{{
          Form::text('nama_kategori', '',['placeholder'=> 'Category Name','class' => 'form-control','required','autofocus'])
          }}{{
          Form::label('keterangan', 'Description', ['class' => 'awesome'])
          }}{{
          Form::text('keterangan', '',['placeholder'=> 'Description', 'class' => 'form-control','required','autofocus'])
          }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" title="submit">Submit</button>
        </div>
      </div>
      {{-- </form> --}}
      {{ Form::close() }}
    </div>
  </div>
</div>
@foreach ($data as $item => $Edit)
<div id="EditCategory{{$Edit->kode_kategori}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    {!! Form::model($data, ['route' => ['kategori.update',$Edit->kode_kategori]]) !!}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Kategori</h4>
      </div>
      <div class="modal-body col-md-12">
        @csrf
        {{ method_field('PUT') }}
        {{
        Form::hidden('kode_kategori', $Edit->kode_kategori,['placeholder'=>'kode','class' => 'form-control','required','autofocus'])
        }}{{
        Form::label('nama_kategori', 'Category Name', ['class' => 'awesome'])
        }}{{
        Form::text('nama_kategori', $Edit->nama_kategori,['placeholder'=> 'Category Name','class' => 'form-control','required'])
        }}{{
        Form::label('keterangan', 'Description', ['class' => 'awesome'])
        }}{{
        Form::text('keterangan', $Edit->keterangan,['placeholder'=> 'Description','class' => 'form-control','required'])
        }}
        </select>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-success" title="update">Edit</button>
    </div>
  </div>
  {{-- </form> --}}
{{ Form::close() }}
</div>
</div>
@endforeach
@foreach ($data as $delete)
<div id="DeleteCategory{{$delete->kode_kategori}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    {!! Form::model($data, ['route' => ['kategori.destroy',$delete->kode_kategori]]) !!}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Category</h4>
      </div>
      <div class="modal-body col-md-12">
        @csrf
        @method('DELETE')
        <center>
          <h3>Are you sure you want to delete a category?</h3>
        </center>
        <center>
          <b>
            <h2> {{$delete->nama_kategori}} </h2>
          </b>
        </center>
        {{-- <hr> --}}
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" title="delete">Delete</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
    </div>
  </div>
</div>
@endforeach
@endsection
