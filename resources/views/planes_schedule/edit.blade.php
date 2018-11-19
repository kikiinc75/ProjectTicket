@extends('layouts.index')

@section('content')

<form method="POST" action="{{ route('planes_schedule.update', $data->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Jadwal Pesawat</h4>
                        <div class="form-group{{ $errors->has('planes_detail_id') ? ' has-error' : '' }}">
                            <label for="planes_detail_id" class="col-md-4 control-label">Nama Pesawat</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="planes_name" type="text" class="form-control" readonly="" value="{{$data->planes_detail->planes->name}}" required>
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
                                <input id="planes_code" type="text" class="form-control" readonly="" value="{{$data->planes_detail->code}}" required>
                              
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
                                <input id="airport_nama" type="text" class="form-control" readonly="" value="{{$data->from}}" required>
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
                                <input id="airport_nama2" type="text" class="form-control" value="{{$data->destination}}" readonly="" required>
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
                                    <input id="eco_seat_pay" type="number"  class="form-control uang" name="eco_seat_pay" value="{{$data->eco_seat_pay}}">
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
                                   <input id="bus_seat_pay" type="number"  class="form-control" name="bus_seat_pay" value="{{$data->bus_seat_pay}}">
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
                                   <input id="first_seat_pay" type="number" class="form-control" name="first_seat_pay" value="{{$data->eco_seat_pay}}">
                                   @if ($errors->has('first_seat_pay'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('first_seat_pay') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('planes_schedule.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
</form>
@endsection