@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.index')
@section('content')
<form action="{{ route('trains.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Data Kereta<b></b> </h4>
                      <form class="forms-sample">
                
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama Kereta</label>
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
                            <label for="eco_seat_qty" class="col-md-4 control-label">Jumlah Kursi Ekonomi</label>
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
                            <label for="bus_seat_qty" class="col-md-4 control-label">Jumlah Kursi Bisnis</label>
                            <div class="col-md-6">
                                <input id="bus_seat_qty" type="number" class="form-control" name="bus_seat_qty" value="{{$data->bus_seat_qty }}" required>
                                @if ($errors->has('bus_seat_qty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bus_seat_qty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('exec_seat_qty') ? ' has-error' : '' }}">
                            <label for="exec_seat_qty" class="col-md-4 control-label">Jumlah Kursi Executive</label>
                            <div class="col-md-6">
                                <input id="exec_seat_qty" type="number" maxlength="4" class="form-control" name="exec_seat_qty" value="{{$data->exec_seat_qty }}" required>
                                @if ($errors->has('exec_seat_qty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first(exec_seat_qty) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('trains.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
  @endsection
