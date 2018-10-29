@extends('layouts.index')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">

<form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">EDIT RESERVATION <b></b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label for="users_id" class="col-md-4 control-label">USERS ID</label>
                            <div class="col-md-6">
                                <input id="users_id" type="text" class="form-control" name="users_id" value="" required>
                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                            <label for="customer_id" class="col-md-4 control-label">CUSTOMER ID</label>
                            <div class="col-md-6">
                                <input id="customer_id" type="text" class="form-control" name="customer_id" value="" required>
                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="rute_id" class="col-md-4 control-label">RUTE ID</label>
                            <div class="col-md-6">
                                <input id="rute_id" type="text" class="form-control" name="rute_id" value="" required>
                                @if ($errors->has('pengarang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="reservation_code" class="col-md-4 control-label">RESERVATION CODE</label>
                            <div class="col-md-6">
                                <input id="reservation_code" type="text" class="form-control" name="reservation_code" value="" required>
                                @if ($errors->has('penerbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penerbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="reservation_at" class="col-md-4 control-label">RESERVATION AT</label>
                            <div class="col-md-6">
                                <input id="reservation_at" type="text" maxlength="4" class="form-control" name="reservation_at" value="" required>
                                @if ($errors->has('tahun_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="reservation_date" class="col-md-4 control-label">RESERVATION DATE</label>
                            <div class="col-md-6">
                                <input id="reservation_at" type="text" maxlength="4" class="form-control" name="reservation_date" value="" required>
                                @if ($errors->has('tahun_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="seat_code" class="col-md-4 control-label">SEAT CODE</label>
                            <div class="col-md-6">
                                <input id="seat_code" type="number" maxlength="4" class="form-control" name="seat_code" value="" required>
                                @if ($errors->has('tahun_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="price_reservation" class="col-md-4 control-label">PRICE RESERVATION</label>
                            <div class="col-md-6">
                                <input id="price_reservation" type="number" maxlength="4" class="form-control" name="price_reservation" value="" required>
                                @if ($errors->has('tahun_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
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
