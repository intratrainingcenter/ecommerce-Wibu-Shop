@extends('Backend.Layout.master')
@extends('Backend.Kategori.additional')

@section('title')
    Kategori Produk
@endsection

@section('content')


<div class="content-wrapper">


  <section class="content-header">
    <h1>
      Kategori Produk
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Kategori Produk</li>
    </ol>
  </section>

  <section class="content">

    <div class="row">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>
          <div class="box-tools">
            <a class="btn btn-success fa fa-plus" title="simpan" data-toggle="modal" data-target="#TambahKategori" style="float:right;" href="#"></a>
          </div>
        </div>

        <div class="box-body">
          <table id="TableKategoriProduk"  class="table table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
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
                  <a type="button" class="btn btn-warning fa fa-pencil" data-toggle="modal" title="edit" data-target="#EditKategori{{$item->kode_kategori}}" href="#"></a>
                  <a type="button" class="btn btn-danger fa  fa-trash" data-toggle="modal" title="hapus" data-target="#HapusKategori{{$item->kode_kategori}}"></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>


      </div>
    </div>
  </section>
  <div id="TambahKategori" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <form class="" action="{{route ('kategori.store')}}" method="post">


      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Produk Kategori</h4>
        </div>
        <div class="modal-body col-md-12">
          @csrf
          @method('POST')
          <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" class="form-control"  name="nama_kategori" placeholder="Nama Kategori" required>
          </div>

          <div class="form-group">
            <label for="description">Keterangan</label>
            <input type="text" class="form-control"  name="keterangan" placeholder="Keterangan" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" title="batal" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" title="simpan">Simpan</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
@foreach ($data as $item => $Edit)
<div id="EditKategori{{$Edit->kode_kategori}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form class="" action="{{route('kategori.update',$Edit->kode_kategori)}}" method="post">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Kategori</h4>
      </div>
      <div class="modal-body col-md-12">
        @csrf
        @method('PUT')
        <div class="form-group">
                  <input type="hidden" name="kode_kategori" value="{{ $Edit->kode_kategori }}">
                  <label for="name">Nama Kategori</label>
	                <input type="text" class="form-control"  name="nama_kategori" placeholder="Nama Kategori" value="{{ $Edit->nama_kategori }}" required>
	              </div>

	              <div class="form-group">
	                <label for="description">Keterangan</label>
	                <input type="text" class="form-control"  name="keterangan" placeholder="Keterangan" value="{{ $Edit->keterangan }}" required>
	              </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" title="batal" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-success" title="simpan">Simpan</button>
    </div>
  </div>
</form>
</div>
</div>
@endforeach
@foreach ($data as $delete)
<div id="HapusKategori{{$delete->kode_kategori}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form class="" action="{{route('kategori.destroy',$delete->kode_kategori)}}" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Kategori</h4>
      </div>
      <div class="modal-body col-md-12">
        @csrf
        @method('DELETE')
        <center>
          <h3>Anda Yakin Ingin Menghapus Kategori?</h3>
        </center>
        <center>
          <b>
            <h2> {{$delete->nama_kategori}} </h2>
          </b>
        </center>
        <hr>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" title="batal" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" title="hapus">Hapus</button>
        </div>
      </div>
    </form>
    </div>
    </div>
@endforeach
@endsection
