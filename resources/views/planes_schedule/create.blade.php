@section('js')
 <script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("planes_name").value = $(this).attr('data-planes_name');
                document.getElementById("planes_id").value = $(this).attr('data-planes_id');
                document.getElementById("code").value = $(this).attr('data-code_view');
                $('#myModal').modal('hide');
            });
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("").value = $(this).attr('');
                document.getElementById("").value = $(this).attr('');
                document.getElementById("").value = $(this).attr('');
                $('#myModal1').modal('hide');
            });
             $(function () {
                $("#lookup","#lookup1").dataTable();
            });
        </script>

@stop
@section('css')

@stop
@extends('layouts.index')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <form method="POST" action="{{ route('planes_detail.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Detail Pesawat</h4>
                        <div class="form-group{{ $errors->has('planes_id') ? ' has-error' : '' }}">
                            <label for="planes_id" class="col-md-4 control-label">Nama Pesawat</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="planes_name" type="text" class="form-control" readonly="" required>
                                <input id="planes_id" type="hidden" name="planes_id" value="{{ old('planes_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal1"><b>Cari Pesawat</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('planes_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planes_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                <label for="tgl_pinjam" class="col-md-4 control-label">Kode Pesawat</label>
                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control" name="code" required readonly="" value="{{ old('code') }}">
                                    @if ($errors->has('code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('from') ? ' has-error' : '' }}">
                            <label for="planes_id" class="col-md-4 control-label">Keberangkatan</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="Keberangkatan" type="text" class="form-control" readonly="" required>
                                <input id="airport_id" type="hidden" name="airport_id" value="{{ old('planes_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Airport</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('airport_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('airport_id') }}</strong>
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
 <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Pesawat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>NAMA AIRPORT</th>
                                    <th>KOTA</th>
                                    <th>KODE AIRPORT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($airport as $data)
                                <tr class="pilih" data-planes_id="<?php echo $data->id; ?>" data-planes_name="<?php echo $data->name; ?>" data-code_view="<?php echo$data->code;?>" >
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->city}}</td>
                                    <td>{{$data->code}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
 <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Pesawat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>NAMA PESAWAT</th>
                                    <th>KODE PESAWAT</th>
                                    <th>ECONOMY SEAT</th>
                                    <th>BUSSINESS SEAT</th>
                                    <th>FIRST CLASS SEAT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($planes_detail as $data)
                                <tr class="pilih" data-planes_id="<?php echo $data->id; ?>" data-planes_name="<?php echo $data->planes->name; ?>" data-code_view="<?php echo$data->code;?>" >
                                    <td>{{$data->planes->name}}</td>
                                    <td>{{$data->code}}</td>
                                    <td>{{$data->planes->eco_seat_qty}}</td>
                                    <td>{{$data->planes->bus_seat_qty}}</td>
                                    <td>{{$data->planes->first_seat_qty}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

@endsection