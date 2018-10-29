@extends('layouts.index')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <form method="POST" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="row">
                <div class="col-md-12 d-flex align-items-stretch grid-margin">
                  <div class="row flex-grow">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Tambah Transaksi Tiket</h4>

                            <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                                <label for="kode_transaksi" class="col-md-4 control-label">ID</label>
                                <div class="col-md-6">
                                    <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="" required readonly="">
                                    @if ($errors->has('kode_transaksi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                                <label for="tgl_pinjam" class="col-md-4 control-label">Transportasi Id Class</label>
                                <div class="col-md-6">
                                    <input id="transportation_class_id" type="text" class="form-control" name="Transaksi id Class" value="" readonly="">
                                    @if ($errors->has('tgl_pinjam'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('transportation id class') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                                <label for="tgl_kembali" class="col-md-4 control-label">Transportasi Id Type</label>
                                <div class="col-md-6">
                                    <input id="transportation_type_id" type="text"  class="form-control" name="Transaksi id type" value="" required readonly="">
                                    @if ($errors->has('tgl_kembali'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tgl_kembali') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                               <label for="code" class="col-md-4 control-label">Code </label>
                               <div class="col-md-6">
                                   <input id="code" type="text"  class="form-control" name="Code" value="" required="">
                                   @if ($errors->has('code'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('code') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                               <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>
                               <div class="col-md-6">
                                   <input id="des" type="text" class="form-control" name="des" value="">
                                   @if ($errors->has('ket'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('ket') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('kursi') ? ' has-error' : '' }}">
                               <label for="kursi" class="col-md-4 control-label">Tempat Duduk</label>
                               <div class="col-md-6">
                                   <input id="seat-qty" type="text" class="form-control" name="kursi" value="">
                                   @if ($errors->has('ket'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('ket') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                            <button type="submit" class="btn btn-primary" id="submit">
                                        Submit
                            </button>
                            <button type="reset" class="btn btn-danger">
                                        Reset
                            </button>
                            <a href="" class="btn btn-light pull-right">Back</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

    </div>
    </form>

  </div>
  @include('layouts.footer')
  <!-- partial -->
  </div>
  @endsection
