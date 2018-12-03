@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("customer_id").value = $(this).attr('data-customer_id');
                document.getElementById("customer_name").value = $(this).attr('data-customer_name');
                $('#myModal').modal('hide');
            });
            $(document).on('click', '.pilih_airport', function (e) {
                document.getElementById("schedule_id").value = $(this).attr('data-schedule_id');
                document.getElementById("planes_name").value = $(this).attr('data-planes_name');
                document.getElementById("planes_code").value = $(this).attr('data-planes_code');
                document.getElementById("planes_from").value = $(this).attr('data-planes_from');
                document.getElementById("planes_destination").value = $(this).attr('data-planes_destination');
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

<form method="POST" action="{{ route('planes_reservation.store') }}"enctype="multypart/form-data">
       {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stertch grid-margin">
            	<div class="row flex-grow">
            		<div class="col-12">
            		   <div class="card">
            		      <div class="card-body">
            		      	 <h4 class="card-title">Tambah transaksi baru</h4>
            		      	 
            		      	 <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label">Nama User</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="user_name" type="text" class="form-control" readonly="" value="{{Auth::user()->fullname}}" required>
                                <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}" required readonly="">
                                </div>
                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        	</div>
                        	<div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                            <label for="customer_id" class="col-md-4 control-label">Nama Pesawat</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="customer_name" type="text" class="form-control" readonly="" required>
                                <input id="customer_id" type="hidden" name="customer_id" value="{{ old('customer_id') }}" required >
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
                        <div class="form-group{{ $errors->has('planes_schedule_id') ? ' has-error' : '' }}">
                            <label for="planes_schedule_id"class="col-md-4 control-label">Cari Jadwal</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="planes_name" type="text" class="form-control" readonly="" required>
                                <input id="schedule_id" type="hidden" name="planes_schedule_id" value="{{ old('planes_schedule_id') }}" required >
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Jadwal</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('planes_schedule_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planes_schedule_id') }}</strong>
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
                        <div class="form-group{{ $errors->has('planes_code') ? ' has-error' : '' }}">
                            <label for="planes_code" class="col-md-4 control-label">Kode Pesawat</label>
                            <div class="col-md-6">
                                <input id="planes_from" type="text" class="form-control" readonly="" value="{{old('planes_code')}}" required>
                              
                                @if ($errors->has('planes_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planes_code') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('planes_code') ? ' has-error' : '' }}">
                            <label for="planes_code" class="col-md-4 control-label">Kode Pesawat</label>
                            <div class="col-md-6">
                                <input id="planes_destination" type="text" class="form-control" readonly="" value="{{old('planes_code')}}" required>
                              
                                @if ($errors->has('planes_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planes_code') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="col-md-6">
                                <select id="level" class="form-control" name="planes_class_seat" value="{{ old('level') }}" required>
                                  <option value="Ekonomi">Ekonomi</option>
                                  <option value="Bisnis">Bisnis</option>
                                  <option value="Utama">Utama</option>
                                </select>
                                @if ($errors->has('level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
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
                                    <th>NIK</th>
                                    <th>NAME</th>
                                    <th>ADDRESS</th>
                                    <th>PHONE</th>
                                    <th>GENDER</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customer as $data)
                                <tr class="pilih" data-customer_id="<?php echo $data->id; ?>" data-customer_name="<?php echo $data->name; ?>">
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
                                <tr class="pilih_airport" data-schedule_id="<?php echo $data->id; ?>" data-planes_name="<?php echo $data->planes_detail->planes->name; ?>" data-planes_code="<?php echo $data->planes_detail->code;?>" data-planes_from="<?php echo $data->from;?>"data-planes_destination="<?php echo $data->destination;?>">
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
                            {{$data->eco_seat_pay}}
                          </td>
                          <td>
                            {{$data->bus_seat_pay}}
                          </td>
                          <td>
                            {{$data->first_seat_pay}}
                          </td>
                          <td>
                            {{$data->boardingtime}}
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