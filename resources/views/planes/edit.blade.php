@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.index')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">

<form action="{{ route('planes.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">EDIT DATA PESAWAT <b></b> </h4>
                      <form class="forms-sample">
                
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">NAMA PESAWAT</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$data->name }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('eco_seat_qty') ? ' has-error' : '' }}">
                            <label for="eco_seat_qty" class="col-md-4 control-label">ECO SEAT</label>
                            <div class="col-md-6">
                                <input id="eco_seat_qty" type="number" class="form-control" name="eco_seat_qty" value="{{$data->eco_seat_qty }}" required>
                                @if ($errors->has('eco_seat_qty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('eco_seat_qty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bus_seat_qty') ? ' has-error' : '' }}">
                            <label for="bus_seat_qty" class="col-md-4 control-label">BUS SEAT</label>
                            <div class="col-md-6">
                                <input id="bus_seat_qty" type="number" class="form-control" name="bus_seat_qty" value="{{$data->bus_seat_qty }}" required>
                                @if ($errors->has('bus_seat_qty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bus_seat_qty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('first_seat_qty') ? ' has-error' : '' }}">
                            <label for="first_seat_qty" class="col-md-4 control-label">FISRT SEAT</label>
                            <div class="col-md-6">
                                <input id="first_seat_qty" type="number" maxlength="4" class="form-control" name="first_seat_qty" value="{{$data->first_seat_qty }}" required>
                                @if ($errors->has('first_seat_qty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_seat_qty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('planes.index')}}" class="btn btn-light pull-right">Back</a>
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
