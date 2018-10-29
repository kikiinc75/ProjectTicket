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
                      <h4 class="card-title">EDIT RUTE <b></b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('transportation_id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">TRANSPORTATION ID</label>
                            <div class="col-md-6">
                                <input id="transportation_id" type="text" class="form-control" name="transportation_id" value="" required readonly="">
                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                            <label for="rute_id" class="col-md-4 control-label">RUTE ID</label>
                            <div class="col-md-6">
                                <input id="rute_id" type="text" class="form-control" name="rute_id" value="" required>
                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="depart_at" class="col-md-4 control-label">DEPART AT</label>
                            <div class="col-md-6">
                                <input id="depart_at" type="date" class="form-control" name="depart_at" value="" required>
                                @if ($errors->has('pengarang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="rute_from" class="col-md-4 control-label">RUTE FROM</label>
                            <div class="col-md-6">
                                <input id="rute_from" type="text" class="form-control" name="rute_from" value="" required>
                                @if ($errors->has('penerbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penerbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="rute_to" class="col-md-4 control-label">RUTE TO</label>
                            <div class="col-md-6">
                                <input id="rute_to" type="number" maxlength="4" class="form-control" name="rute_to" value="" required>
                                @if ($errors->has('tahun_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jumlah_buku') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">PRICE</label>
                            <div class="col-md-6">
                                <input id="price" type="number" maxlength="4" class="form-control" name="price" value="" required>
                                @if ($errors->has('jumlah_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_buku') }}</strong>
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
