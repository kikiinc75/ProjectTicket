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

<form action="{{ route('station.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">EDIT DATA STATION <b></b> </h4>
                      <form class="forms-sample">
                
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">CODE</label>
                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{$data->code }}" required>
                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">CITY</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{$data->city }}" required>
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">NAMA STATION</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$data->name }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
