@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("planes_name").value = $(this).attr('data-planes_name');
                document.getElementById("planes_id").value = $(this).attr('data-planes_id');
                document.getElementById("planes_code").value =$(this).attr('data-planes_code');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_airport', function (e) {
                document.getElementById("airport_id").value = $(this).attr('data-airport_id');
                document.getElementById("airport_nama").value = $(this).attr('data-airport_nama');
                $('#myModal2').modal('hide');
            });
            $(document).on('click', '.pilih_destination', function (e) {
                document.getElementById("airport_nama2").value = $(this).attr('data-airport_nama2');
                $('#myModal3').modal('hide');
            });
          
             $(function () {
                $("#lookup, #lookup2").dataTable();
            });
        </script>

@stop
@section('css')

@stop
@extends('layouts.index')

@section('content')

<form method="POST" action="{{ route('planes_schedule.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Jadwal baru</h4>
                        <div class="form-group{{ $errors->has('planes_detail_id') ? ' has-error' : '' }}">
                            <label for="planes_detail_id" class="col-md-4 control-label">Nama Pesawat</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="planes_name" type="text" class="form-control" readonly="" required>
                                <input id="planes_id" type="hidden" name="planes_detail_id" value="{{ old('planes_detail_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Pesawat</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('planes_detail_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planes_detail_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('planes_code') ? ' has-error' : '' }}">
                            <label for="planes_code" class="col-md-4 control-label">Kode Pesawat</label>
                            <div class="col-md-6">
                                <input id="planes_code" type="text" class="form-control" readonly="" value="{{old('planes_code')}}" required>
                              
                                @if ($errors->has('planes_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planes_code') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('airport_id') ? ' has-error' : '' }}">
                            <label for="airport_id" class="col-md-4 control-label">Keberangkatan dari</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="airport_nama" type="text" name="from" class="form-control" readonly="" required>
                                <input id="airport_id" type="hidden" name="airport_id" value="{{ old('airport_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Airport</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('airport_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('airport_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('airport_id') ? ' has-error' : '' }}">
                            <label for="airport_id" class="col-md-4 control-label">Tujuan Ke</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="airport_nama2" type="text" name="destination" class="form-control" readonly="" required>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal3"><b>Cari Airport</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('airport_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('airport_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('eco_seat_pay') ? ' has-error' : '' }}">
                                <label for="eco_seat_pay" class="col-md-4 control-label">Kursi Ekonomi</label>
                                <div class="col-md-6">
                                    <input id="eco_seat_pay" type="number"  class="form-control uang" name="eco_seat_pay" value="" placeholder="IDR">
                                    @if ($errors->has('eco_seat_pay'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('eco_seat_pay') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bus_seat_pay') ? ' has-error' : '' }}">
                               <label for="bus_seat_pay" class="col-md-4 control-label">Kursi Bisnis </label>
                               <div class="col-md-6">
                                   <input id="bus_seat_pay" type="number"  class="form-control" name="bus_seat_pay" value="" placeholder="IDR">
                                   @if ($errors->has('bus_seat_pay'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('bus_seat_pay') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('first_seat_pay') ? ' has-error' : '' }}">
                               <label for="first_seat_pay" class="col-md-4 control-label">Kursi Utama</label>
                               <div class="col-md-6">
                                   <input id="first_seat_pay" type="number" class="form-control" name="first_seat_pay" value="" placeholder="IDR">
                                   @if ($errors->has('first_seat_pay'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('first_seat_pay') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                         <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                            <label for="tgl_pinjam" class="col-md-4 control-label">Waktu Keberangkatan</label>
                            <div class="col-md-3">
                                <input id="tgl_pinjam" type="datetime-local" class="form-control" name="boardingtime" required>
                                @if ($errors->has('tgl_pinjam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pinjam') }}</strong>
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
                        <a href="{{route('planes_schedule.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
</form>


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
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Pesawat</th>
                                    <th>Kode Pesawat</th>
                                    <th>Kelas Ekonomi</th>
                                    <th>Kelas Bisnis</th>
                                    <th>Kelas Utama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($planes_detail as $data)
                                <tr class="pilih" data-planes_id="<?php echo $data->id; ?>" data-planes_name="<?php echo $data->planes->name; ?>" data-planes_code="<?php echo $data->code;?>">
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


  <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Bandara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                          <th>
                            Nama Bandara
                          </th>
                          <th>
                            Kota
                          </th>
                          <th>
                            Kode Bandara
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($airport as $data)
                                <tr class="pilih_airport" data-airport_id="<?php echo $data->id; ?>" data-airport_nama="<?php echo $data->city; ?>" >
                                    <td class="py-1">

                            {{$data->name}}
                          </td>
                          <td>
                            {{$data->city}}
                          </td>

                          <td>
                            {{$data->code}}
                          </td>
                        </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
  <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Bandara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                          <th>
                            Nama Bandara
                          </th>
                          <th>
                            Kota
                          </th>
                          <th>
                            Kode Bandara
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($airport as $data)
                                <tr class="pilih_destination" data-airport_nama2="<?php echo $data->city; ?>" >
                                    <td class="py-1">

                            {{$data->name}}
                          </td>
                          <td>
                            {{$data->city}}
                          </td>

                          <td>
                            {{$data->code}}
                          </td>
                        </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
@endsection