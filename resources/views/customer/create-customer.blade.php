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
                          <h4 class="card-title">Tambah Customer</h4>

                            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                                <label for="kode_transaksi" class="col-md-4 control-label">ID Customer</label>
                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control" name="id" value="" required readonly="">
                                    @if ($errors->has('id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                                <label for="tgl_pinjam" class="col-md-4 control-label">NIK</label>
                                <div class="col-md-6">
                                    <input id="nik" type="text" class="form-control" name="nik" value="">
                                    @if ($errors->has('nik'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nik') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="tgl_kembali" class="col-md-4 control-label">Nama Customer</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"  class="form-control" name="name" value="">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tgl_kembali') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                               <label for="code" class="col-md-4 control-label">Address </label>
                               <div class="col-md-6">
                                   <input id="address" type="text"  class="form-control" name="address" value="" required="">
                                   @if ($errors->has('code'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('code') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                               <label for="deskripsi" class="col-md-4 control-label">Phone</label>
                               <div class="col-md-6">
                                   <input id="phone" type="text" class="form-control" name="phone" value="">
                                   @if ($errors->has('ket'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('ket') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('kursi') ? ' has-error' : '' }}">
                               <label for="gender" class="col-md-4 control-label">Gender</label>
                               <div class="col-md-6">
                                   <input id="gender" type="text" class="form-control" name="gender" value="">
                                   @if ($errors->has('gender'))
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
