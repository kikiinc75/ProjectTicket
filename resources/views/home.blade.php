@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.index')
@section('content')
<!-- partial -->
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Orders</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$trains_reservation->count()+$planes_reservation->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Total Reservasi
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Jadwal</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$trains_schedule->count()+$planes_schedule->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Total Jadwal Kereta & Pesawat
                  </p>
                </div>
              </div>
            </div>
            @if(Auth::user()->level=='ADMIN')
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">User</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{Auth::user()->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh User
                  </p>
                </div>
              </div>
            </div>
            @else
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Customer</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$customer->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh Customer
                  </p>
                </div>
              </div>
            </div>
            @endif
          </div>
            <div class="row" style="margin-top: 20px;">
              <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data Jadwal Kereta</h4>
                  
                  <div class="table-responsive">
                    <table id="table" class="table table-striped">
                      <thead>
                          <tr>
                            <th>
                                Nama Kereta
                            </th>
                            <th>
                                Kode Kereta
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
                              Kelas Executive
                            </th>
                            <th>
                              Waktu Keberangkatan
                            </th>
                          </tr>
                        </thead>
                      <tbody>
                      @foreach($trains_schedule as $data)
                        <tr>
                          <td class="py-1">
                            {{$data->trains_detail->trains->name}}
                          </td>
                          <td>
                          {{$data->trains_detail->code}}
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
                            {{$data->exec_seat_pay}}
                          </td>
                          <td>
                            {{$data->boardingtime}}
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  {{-- {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data Jadwal Pesawat</h4>
                  
                  <div class="table-responsive">
                    <table id="table" class="table table-striped">
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
                        <tr>
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
                  {{-- {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>

          </div>  
@endsection
