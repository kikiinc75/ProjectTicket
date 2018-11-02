@section('css')

@stop
@extends('layouts.index')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
    
<form action="{{ route('planes_detail.update', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Detail Kereta</h4>
                        <div class="form-group{{ $errors->has('planes_id') ? ' has-error' : '' }}">
                            <label for="planes_id" class="col-md-4 control-label">Nama Kereta</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="planes_name" type="text" class="form-control" readonly="" value="{{$data->planes->name}}" required>
                                <input id="planes_id" type="hidden" name="planes_id" value="{{$data->planes_id}}" required>
                                </div>
                                @if ($errors->has('planes_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planes_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                <label for="tgl_pinjam" class="col-md-4 control-label">Kode Kereta</label>
                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control" name="code" value="{{$data->code}}">
                                    @if ($errors->has('code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('planes_detail.index')}}" class="btn btn-light pull-right">Back</a>
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