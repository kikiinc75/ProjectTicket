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
                          <h4 class="card-title">Tambah Rute</h4>

                            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                                <label for="kode_transaksi" class="col-md-4 control-label">ID</label>
                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control" name="id" value="" required readonly="">
                                    @if ($errors->has('id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                                <label for="transportation_id" class="col-md-4 control-label">Transportasi Id</label>
                                <div class="col-md-6">
                                    <input id="transportation_id" type="text" class="form-control" name="transportation_id" value="">
                                    @if ($errors->has('nik'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nik') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="rute_id" class="col-md-4 control-label">Rute </label>
                                <div class="col-md-6">
                                    <input id="rute_id" type="text"  class="form-control" name="rute_id" value="">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tgl_kembali') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                               <label for="depart_at" class="col-md-4 control-label">Depart At </label>
                               <div class="col-md-6">
                                   <input id="depart_at" type="text"  class="form-control" name="depart_at" value="" required="">
                                   @if ($errors->has('code'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('code') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                               <label for="rute_from" class="col-md-4 control-label">Rute From</label>
                               <div class="col-md-6">
                                   <input id="rute_from" type="text" class="form-control" name="rute_from" value="">
                                   @if ($errors->has('ket'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('ket') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('kursi') ? ' has-error' : '' }}">
                               <label for="price" class="col-md-4 control-label">Price</label>
                               <div class="col-md-6">
                                   <input id="price" type="text" class="form-control" name="price" value="">
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
