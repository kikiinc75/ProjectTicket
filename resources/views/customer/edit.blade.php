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

<form action="{{ route('customer.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">EDIT CUSTOMER <b></b> </h4>
                      <form class="forms-sample">
                
                        <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                            <label for="nik" class="col-md-4 control-label">NIK</label>
                            <div class="col-md-6">
                                <input id="nik" type="text" class="form-control" name="nik" value="{{$data->nik }}" required>
                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">NAME</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$data->name }}" required>
                                @if ($errors->has('pengarang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">ADDRESS</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{$data->address }}" required>
                                @if ($errors->has('penerbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penerbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">PHONE</label>
                            <div class="col-md-6">
                                <input id="phone" type="number" maxlength="4" class="form-control" name="phone" value="{{$data->phone }}" required>
                                @if ($errors->has('tahun_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">GENDER</label>
                            <div class="col-md-6">
                            <select class="form-control" name="gender" required="">
                                <option value="laki-laki" @if($data->gender == 'laki-laki') selected @endif>LAKI-LAKI</option>
                                <option value="perempuan" @if($data->level == 'perempuan') selected @endif>PEREMPUAN</option>
                            </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('customer.index')}}" class="btn btn-light pull-right">Back</a>
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
