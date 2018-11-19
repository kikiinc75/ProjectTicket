@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("planes_name").value = $(this).attr('data-planes_name');
                document.getElementById("planes_id").value = $(this).attr('data-planes_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_airport', function (e) {
                document.getElementById("airport_id").value = $(this).attr('data-airport_id');
                document.getElementById("airport_nama").value = $(this).attr('data-airport_nama');
                document.getElementById("from").value = $(this).attr('data-from');
                document.getElementById("destination").value = $(this).attr('data-destination');
                document.getElementById("boardingtime").value = $(this).attr('data-boardingtime');
                $('#myModal2').modal('hide');
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

<form method="POST" action="{{ route('planes_reservation.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Jadwal baru</h4>
                      <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-4 control-label">Nama Operator</label>
                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control" readonly="" value="{{ Auth::user()->fullname }}" required>
                                <input type="hidden" name="user_id" readonly="" value="{{Auth::user()->id}}" required="">
                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                            <label for="planes_detail_id" class="col-md-4 control-label">Nama Customer</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="planes_name" type="text" class="form-control" readonly="" required>
                                <input id="planes_id" type="hidden" name="customer_id" value="{{ old('customer_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Customer</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('customer_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('airport_id') ? ' has-error' : '' }}">
                            <label for="airport_id" class="col-md-4 control-label">Nama Pesawat</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="airport_nama" type="text" class="form-control" readonly="" required>
                                <input id="airport_id" type="hidden" name="schedule_id" value="{{ old('schedule_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Jadwal</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('schedule_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('schedule_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="planes_code" class="col-md-4 control-label">Berangkat Dari</label>
                            <div class="col-md-6">
                                <input id="from" type="text" class="form-control" readonly="" value="" required>
                              
                                @if ($errors->has('planes_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planes_code') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('planes_code') ? ' has-error' : '' }}">
                            <label for="planes_code" class="col-md-4 control-label">Tujuan Ke</label>
                            <div class="col-md-6">
                                <input id="destination" type="text" class="form-control" readonly="" value="" required>
                              
                                @if ($errors->has('planes_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planes_code') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('planes_code') ? ' has-error' : '' }}">
                            <label for="boardingtime" class="col-md-4 control-label">Waktu Keberangkatan</label>
                            <div class="col-md-6">
                                <input id="boardingtime" type="text" class="form-control" readonly="" value="" required>
                              
                                @if ($errors->has('planes_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planes_code') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('class_seat') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Pilihan Kursi
                            </label>

                            <div class="col-md-6">
                                <select id="level" class="form-control" name="class_seat" value="{{ old('class_seat') }}" required>
                                  <option value="eco">Kursi Ekonomi</option>
                                  <option value="bus">Kursi Bisnis</option>
                                  <option value="first">Kursi Utama</option>
                                </select>
                                @if ($errors->has('class_seat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_seat') }}</strong>
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
                        <a href="{{route('planes_reservation.index')}}" class="btn btn-light pull-right">Back</a>
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
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telephone</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customer as $data)
                                <tr class="pilih" data-planes_id="<?php echo $data->id; ?>" data-planes_name="<?php echo $data->name; ?>">
                                    <td>{{$data->nik}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->address}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->gender}}</td>
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
                            Nama Pesawat
                          </th>
                          <th>
                            Kode Pesawat
                          </th>
                          <th>
                            Keberangkatan
                          </th>
                          <th>
                                Tujuan
                            </th>
                            <th>
                              Kelas Ekonomi
                            </th>
                            <th>
                              Kelas Bisnis
                            </th>
                            <th>
                              Kelas Utama
                            </th>
                            <th>
                              Waktu Keberangkatan
                            </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($planes_schedule as $data)
                                <tr class="pilih_airport" data-airport_id="<?php echo $data->id; ?>" data-airport_nama="<?php echo $data->planes_detail->planes->name; ?>" data-from="<?php echo $data->from;?>" data-destination="<?php echo $data->destination;?>" data-boardingtime="<?php echo $data->boardingtime?>" >
                                    <td class="py-1">
                            {{$data->planes_detail->planes->name}}
                          </td>
                          <td>
                          {{$data->planes_detail->code}}
                          </td>
                          <td>
                            {{$data->from}}
                          </td>
                          <td>
                            {{$data->destination}}
                          </td>
                          <td>
                            @if($data->eco_seat_pay>0)
                            IDR {{$data->eco_seat_pay}}
                            @else
                            {{$data->eco_seat_pay}}
                            @endif
                          </td>
                          <td>
                            @if($data->bus_seat_pay>0)
                            IDR {{$data->bus_seat_pay}}
                            @else
                            {{$data->bus_seat_pay}}
                            @endif
                          </td>
                          <td>
                            @if($data->first_seat_pay>0)
                            IDR {{$data->first_seat_pay}}
                            @else
                            {{$data->first_seat_pay}}
                            @endif
                          </td>
                          <td>
                            {{$data->boardingtime}}
                        </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
@endsection