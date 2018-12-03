@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("trains_name").value = $(this).attr('data-trains_name');
                document.getElementById("trains_id").value = $(this).attr('data-trains_id');
                document.getElementById("trains_code").value =$(this).attr('data-trains_code');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_station', function (e) {
                document.getElementById("station_id").value = $(this).attr('data-station_id');
                document.getElementById("station_nama").value = $(this).attr('data-station_nama');
                $('#myModal2').modal('hide');
            });
            $(document).on('click', '.pilih_destination', function (e) {
                document.getElementById("station_nama2").value = $(this).attr('data-station_nama2');
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

<form method="POST" action="{{ route('trains_schedule.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Jadwal baru</h4>
                        <div class="form-group{{ $errors->has('trains_detail_id') ? ' has-error' : '' }}">
                            <label for="trains_detail_id" class="col-md-4 control-label">Nama Kereta</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="trains_name" type="text" class="form-control" readonly="" required>
                                <input id="trains_id" type="hidden" name="trains_detail_id" value="{{ old('trains_detail_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Kereta</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('trains_detail_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('trains_detail_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('trains_code') ? ' has-error' : '' }}">
                            <label for="trains_code" class="col-md-4 control-label">Kode Kereta</label>
                            <div class="col-md-6">
                                <input id="trains_code" type="text" class="form-control" readonly="" value="{{old('trains_code')}}" required>
                              
                                @if ($errors->has('trains_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('trains_code') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('station_id') ? ' has-error' : '' }}">
                            <label for="station_id" class="col-md-4 control-label">Keberangkatan dari</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="station_nama" type="text" name="from" class="form-control" readonly="" required>
                                <input id="station_id" type="hidden" name="station_id" value="{{ old('station_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Station</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('station_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('station_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('station_id') ? ' has-error' : '' }}">
                            <label for="station_id" class="col-md-4 control-label">Tujuan Ke</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="station_nama2" type="text" name="destination" class="form-control" readonly="" required>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal3"><b>Cari Station</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('station_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('station_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('eco_seat_pay') ? ' has-error' : '' }}">
                                <label for="eco_seat_pay" class="col-md-4 control-label">Kursi Ekonomi</label>
                                <div class="col-md-6">
                                    <input id="eco_seat_pay" type="number"  class="form-control uang" name="eco_seat_pay" value="">
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
                                   <input id="bus_seat_pay" type="number"  class="form-control" name="bus_seat_pay" value="">
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
                        <a href="{{route('trains_schedule.index')}}" class="btn btn-light pull-right">Back</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Cari Kereta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Kereta</th>
                                    <th>Kode Kereta</th>
                                    <th>Kelas Ekonomi</th>
                                    <th>Kelas Bisnis</th>
                                    <th>Kelas Utama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trains_detail as $data)
                                <tr class="pilih" data-trains_id="<?php echo $data->id; ?>" data-trains_name="<?php echo $data->trains->name; ?>" data-trains_code="<?php echo $data->code;?>">
                                    <td>{{$data->trains->name}}</td>
                                    <td>{{$data->code}}</td>
                                    <td>{{$data->trains->eco_seat_qty}}</td>
                                    <td>{{$data->trains->bus_seat_qty}}</td>
                                    <td>{{$data->trains->first_seat_qty}}</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Cari Stasiun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                          <th>
                            Nama Stasiun
                          </th>
                          <th>
                            Kota
                          </th>
                          <th>
                            Kode Stasiun
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($station as $data)
                                <tr class="pilih_station" data-station_id="<?php echo $data->id; ?>" data-station_nama="<?php echo $data->city; ?>" >
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
        <h5 class="modal-title" id="exampleModalLabel">Cari Stasiun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                          <th>
                            Nama Stasiun
                          </th>
                          <th>
                            Kota
                          </th>
                          <th>
                            Kode Stasiun
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($station as $data)
                                <tr class="pilih_destination" data-station_nama2="<?php echo $data->city; ?>" >
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