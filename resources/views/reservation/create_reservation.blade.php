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
                          <h4 class="card-title">Tambah Reservation</h4>

                            <div class="form-group{{ $errors->has('users_id') ? ' has-error' : '' }}">
                                <label for="users_id" class="col-md-4 control-label">USERS ID</label>
                                <div class="col-md-6">
                                    <input id="users_id" type="text" class="form-control" name="users_id" value="" required readonly="">
                                    @if ($errors->has('kode_transaksi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                                <label for="customer_id" class="col-md-4 control-label">Customer Id</label>
                                <div class="col-md-6">
                                    <input id="customer_id" type="text" class="form-control" name="customer_id" value="" readonly="">
                                    @if ($errors->has('tgl_pinjam'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('transportation id class') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                                <label for="rute_id" class="col-md-4 control-label">Rute Id Type</label>
                                <div class="col-md-6">
                                    <input id="rute_id" type="text"  class="form-control" name="rute_id" value="" required readonly="">
                                    @if ($errors->has('tgl_kembali'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tgl_kembali') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                               <label for="reservation_code" class="col-md-4 control-label"> Reservation Code </label>
                               <div class="col-md-6">
                                   <input id="reservation_code" type="text"  class="form-control" name="reservation_code" value="" required="">
                                   @if ($errors->has('code'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('code') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                               <label for="reservation_at" class="col-md-4 control-label">Reservation Ayt</label>
                               <div class="col-md-6">
                                   <input id="reservation_at" type="text" class="form-control" name="reservation_at" value="">
                                   @if ($errors->has('ket'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('ket') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('kursi') ? ' has-error' : '' }}">
                               <label for="reservation_date" class="col-md-4 control-label">Reservation Date</label>
                               <div class="col-md-6">
                                   <input id="reservation_date" type="text" class="form-control" name="reservation_date" value="">
                                   @if ($errors->has('ket'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('ket') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('kursi') ? ' has-error' : '' }}">
                               <label for="seat_code" class="col-md-4 control-label">Seat Code</label>
                               <div class="col-md-6">
                                   <input id="seat_code" type="text" class="form-control" name="seat_code" value="">
                                   @if ($errors->has('ket'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('ket') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                            <div class="form-group{{ $errors->has('kursi') ? ' has-error' : '' }}">
                               <label for="price_reservation" class="col-md-4 control-label">Price Reservation</label>
                               <div class="col-md-6">
                                   <input id="price_reservation" type="text" class="form-control" name="price_reservation" value="">
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
