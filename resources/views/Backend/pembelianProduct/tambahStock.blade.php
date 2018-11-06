@extends('Backend.Layout.master')
@extends('Backend.pembelianProduct.additional')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Pembelian Product </h1> <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">TransaksiPembelian</li></ol>
      <div hidden="" style="position: absolute; z-index: 999; right: -10px; " class="col-md-6 berhasiladd">
          <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              <strong>Berhasil!</strong> Penambahan Stok Berhasil Diajukan.
          </div>
      </div>
    </section>
    <section class="content">
      <div class="">
        <div class="form-element">
          <div class="col-md-12 padding-0">
            <div class="col-md-12" style="padding:20px">
              <div class="col-md-12 padding-0">
                <div class="col-md-8 padding-0">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-12">
                      <div class="panel box-v1">
                        <div class="panel-heading bg-white border-none">
                          <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                            <h4 class="text-left"></h4>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6 text-right"><h4>
                            <span class="fa fa-cart-plus text-right"></span>
                            {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              <span class="label label-warning">10</span> --}}
                            {{-- </a> --}}
                          </h4>
                          </div>
                        </div>
                        <div class="panel-body">
                          <div class="col-md-12">
                            <div class="form-group" style="padding-bottom: 30px">
                              <label for="Pembelian" class="col-md-4">Kode pembelian</label>
                              <div class="col-md-8">
                                <input type="text" id="kodePembelaian" name="kodePembelian" class="form-control" value="{{$code}}" readonly>
                                <input type="hidden" id="kodeUser" name="kodeUser" class="form-control" value="{{auth::user()->kode_user}}"readonly>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="Barang" class="control-label">pilih barang</label>
                              <select class="form-control select2" id="KodeBarang" name="KodeBarang">
                                <optgroup label="Pilih Barang">
                                  <option value="none">none</option>
                                  @foreach ($Product as $key => $data)
                                    <option value="{{$data->kode_produk}}">{{$data->nama_produk}}</option>
                                  @endforeach
                                </optgroup>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label for="harga" class="control-label">Harga</label>
                              <input type="text" name="harga" value="Rp 0,00" class="form-control" id="hargatampil" readonly>
                              <input type="hidden" name="harga" id="harga" value="0">
                            </div>
                            <div class="col-md-2">
                              <label for="jumlah" class="control-label">Jumlah</label>
                              <input type="text" class="form-control" name="stok" disabled="false" id="stock" value="0" onkeypress="return hanyaAngka(event)" >
                              <input type="hidden" name="subtotal" id="subtotal" value="0">
                            </div>
                            <div style="margin-left:200px">
                              <div class="alertjumlah"></div>
                            </div>
                            <div class="col-md-3" style="margin-top:23px">
                              <button type="button" class="btn btn-3d btn-success icon-plus add" name="button" disabled>Tambah</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="panel box-v4">
                        <div class="panel-body">
                          <div class="responsive-table">
                            <table class="" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Harga</th>
                                  <th>Jumlah</th>
                                  <th>Subtotal</th>
                                  <th>opsi</th>
                                </tr>
                              </thead>
                              <tbody id="tempatdata">
                                <tr>

                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="col-md-4">
                    <div class="col-md-12 padding-0">
                      <div class="panel box-v3">
                        <div class="panel body">
                          <p>Grand Total</p>
                          <div class="" align="right"><h1 id="textgrandtot">Rp 0,00</h1></div>
                        </div>
                        <div class="panel-footer bg-white border-none">
                          <center>
                             <button id="showmodaltambah" class="btn ripple btn-success btn-3d" disabled>
                               <div class="">
                                 <span class="fa fa-money"></span><span>Pengajuan</span>
                               </div>
                             </button>
                          </center>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-md-12"  >
                <div class="modal fade" id='simpan' data-backdrop="static">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Stok Barang</h4>
                      </div>
                      <div class="modal-body">
                        <form id="form_masuk">
                        <input type="hidden" id="isigrandtot" name="isigrandtot" type="text" value="">
                        <input type="hidden" id="isikode" name="isikode" type="text" value="">
                        <center>
                        <h3>Konfirmasi</h3>
                        <p style="color:#35bf4d;">Anda Yakin Ingin Mengajukan Pesanan?</p>
                        <p id="infokode"></p>
                        </center>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-3d btn-danger" data-dismiss="modal" style="margin-right:20px">Batal</button>
                        <button type="button" id="Diajukan" class="btn btn-3d btn-success">Ajukan</button>
                        @csrf @method('POST')
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
          </div>
        </div>
      </div>
    </section>
    </div>
@endsection
