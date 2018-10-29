@extends('layouts.index')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
    <div class="col-lg-2">
      <a href="" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Rute</a>
    </div>
      <div class="col-lg-12">
                    @if (Session::has('message'))
                    <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                    @endif
                    </div>
  </div>
      <div class="row" style="margin-top: 20px;">
  <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Rute</h4>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table">
                        <thead>
                          <tr>
                            <th>
                              USER ID
                            </th>
                            <th>
                              CUSTOMER  ID
                            </th>
                            <th>
                              RUTE ID
                            </th>
                            <th>
                              RESERVATION CODE
                            </th>
                            <th>
                              RESERVATION AT
                            </th>
                            <th>
                             RESERVATION DATE
                            </th>
                            <th>
                              SEAT CODE
                            </th>
                              <th>
                                PRICE RESERVATION
                              </th>
                          </tr>
                        </thead>
                        <tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

  </div>
  @include('layouts.footer')
<!-- partial -->
</div>
@endsection
