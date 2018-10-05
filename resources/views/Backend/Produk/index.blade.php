@extends('Backend.Layout.master')
@extends('Backend.Produk.additional')

@section('title')
    Produk
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Produk
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Produk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
          <div class="col-xs-12">
            <div class="box">
                @if (session('alertfail'))
                <div class="col-md-12 MyAlert">
                    <div class="alert alert-danger alert-dismissible col-md-6 col-md-offset-3" style="position:absolute">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                        <p>{{session('alertfail')}}</p> 
                    </div>
                </div>
                @elseif(session('alertsuccess'))
                <div class="col-md-12 MyAlert">
                    <div class="alert alert-danger alert-dismissible col-md-6 col-md-offset-3" style="position:absolute">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                        <p>{{session('alertsuccess')}}</p> 
                    </div>
                </div>
                @endif
                <div class="box-header">
                    <h3 class="box-title">Data Produk</h3>
                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#ModalAdd">Tambah</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="TableProduk" class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th width="100px">Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th width="50px">Stok</th>
                        <th>Harga Jual</th>
                        <th>Status</th>
                        <th width="120px">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->kode_produk}}</td>
                                <td>{{$item->nama_produk}}</td>
                                <td>{{$item->kode_kategori}}</td>
                                <td align="right">{{$item->stok}}</td>
                                <td align="right">{{number_format($item->harga,0,"",".")}}</td>
                                <td>{{$item->status}}</td>
                                <td>
                                    <button class="btn btn-info fa fa-info-circle" data-toggle="modal" data-target="#ModalDetail{{$item->kode_produk}}" title="Rincian"></button>
                                    <button class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#ModalEdit{{$item->kode_produk}}"></button>
                                    <button class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#ModalDelete{{$item->kode_produk}}"></button>
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
      <!-- /.row (main row) -->

      <!-- Modal  Add -->
      <div class="modal fade" id="ModalAdd" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Produk</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf @method('POST')
                                <div class="form-group row">
                                    <label for="kode_produk" class="col-md-4">Kode Produk</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="kode_produk" id="kode_produk" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_produk" class="col-md-4">Nama Produk</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_ategori" class="col-md-4">Kategori</label>
                                    <div class="col-md-8">
                                    <select name="kode_kategori" id="kode_kategori" class="form-control" required>
                                        <option value="">--Pilih Kategori--</option>
                                        <option value="0">0</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hpp" class="col-md-4">HPP</label>
                                    <div class="col-md-8">
                                    <input type="number" name="hpp" id="hpp" max="99999999" min="0" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-md-4">Harga Jual</label>
                                    <div class="col-md-8">
                                        <input type="number" name="harga" id="harga" min="0" max="99999999" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto" class="col-md-4">Foto</label>
                                    <div class="col-md-8">
                                        <input type="file" name="foto" id="foto" class="form-control" onchange="ShowImage(this);" required><br>
                                        <img id="image" src="" alt="">
                                    </div>
                                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
      @foreach ($data as $item)
          
      <!-- Modal  Detail -->
      <div class="modal fade" id="ModalDetail{{$item->kode_produk}}" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Rincian Produk</h4>
                    </div>
                    <div class="modal-body">
                        <center><img src="{{Storage::url($item->foto)}}" width="200px" alt=""></center><br>
                        <table width="100%">
                            <thead>
                                <th width="40%"></th><th width="10%"></th><th width="40%"></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label for="">Kode Produk</label></td><td>:</td><td>{{$item->kode_produk}}</td>
                                </tr>
                                <tr>
                                    <td><label for="">Nama Produk</label></td><td>:</td><td>{{$item->nama_produk}}</td>
                                </tr>
                                <tr>
                                    <td><label for="">Kategori</label></td><td>:</td><td>{{$item->kode_kategori}}</td>
                                </tr>
                                <tr>
                                    <td><label for="">HPP</label></td><td>:</td><td>{{$item->hpp}}</td>
                                </tr>
                                <tr>
                                    <td><label for="">Harga Jual</label></td><td>:</td><td>{{$item->harga}}</td>
                                </tr>
                                <tr>
                                    <td><label for="">Stok</label></td><td>:</td><td>{{$item->stok}}</td>
                                </tr>
                                <tr>
                                    <td><label for="">Status</label></td><td>:</td><td>{{$item->status}}</td>
                                </tr>
                                @if ($item->keterangan !='')
                                    <tr>
                                        <td><label for="">Nama Produk</label></td><td>:</td><td>{{$item->keterangan}}</td>
                                    </tr>
                                @else
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    <!-- Modal  Edit -->
    <div class="modal fade" id="ModalEdit{{$item->kode_produk}}" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Produk</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{route('produk.update', ['id' => $item->kode_produk])}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                            <div class="form-group row">
                                <label for="kode_produk" class="col-md-4">Kode Produk</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="kode_produk" id="kode_produkedit" value="{{$item->kode_produk}}" readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_produk" class="col-md-4">Nama Produk</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nama_produk" id="nama_produkedit" value="{{$item->nama_produk}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_ategori" class="col-md-4">Kategori</label>
                                <div class="col-md-8">
                                <select name="kode_kategori" id="kode_kategoriedit" class="form-control" required>
                                    <option value="">--Pilih Kategori--</option>
                                    <option value="0">0</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hpp" class="col-md-4">HPP</label>
                                <div class="col-md-8">
                                <input type="number" name="hpp" id="hppedit" max="99999999" min="0" class="form-control" value="{{$item->hpp}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-md-4">Harga Jual</label>
                                <div class="col-md-8">
                                    <input type="number" name="harga" id="hargaedit" min="0" max="99999999" class="form-control" value="{{$item->harga}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto" class="col-md-4">Foto</label>
                                <div class="col-md-8">
                                    <input type="file" name="foto" id="foto" class="form-control" onchange="EditImage(this);"><br>
                                    <img id="imageedit" src="{{Storage::url($item->foto)}}" height="150px" alt="">
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal  Delete -->
    <div class="modal fade" id="ModalDelete{{$item->kode_produk}}" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Produk</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{route('produk.destroy', ['id' => $item->kode_produk])}}" method="POST">
                    @csrf @method('DELETE')
                    <h4>Anda Yakin Ingin Menghapus Data Produk Dari <strong> {{$item->nama_produk}}</strong> ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
      @endforeach

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
