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
                      <h4 class="card-title">EDIT TRANSPORTATION <b></b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label for="transportation_class_id" class="col-md-4 control-label">TRANSPORTATION CLASS ID</label>
                            <div class="col-md-6">
                                <input id="transportation_class_id" type="text" class="form-control" name="transportation_class_id" value="" required>
                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                            <label for="transportation_type_id" class="col-md-4 control-label">TRANSPORTATION TYPE ID</label>
                            <div class="col-md-6">
                                <input id="transportation_type_id" type="text" class="form-control" name="transportation_type_id" value="" required>
                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">CODE</label>
                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="" required>
                                @if ($errors->has('pengarang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">DESCRIPTION</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="" required>
                                @if ($errors->has('penerbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penerbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="seat_qty" class="col-md-4 control-label">SEAT QTY</label>
                            <div class="col-md-6">
                                <input id="seat_qty" type="number" maxlength="4" class="form-control" name="seat_qty" value="" required>
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
