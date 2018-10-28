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
<div class="main-panel">
  <div class="content-wrapper">
<div class="row">

  <div class="col-lg-2">
    <a href="{{ url('transaksi.create-transaksi') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Transaksi</a>
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
                  <h4 class="card-title">Data Transaksi</h4>
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            TRANSAKSI ID CLASS
                          </th>
                          <th>
                            TRANSAKSI ID TYPE
                          </th>
                          <th>
                            KODE
                          </th>
                          <th>
                            DESKRIPSI
                          </th>
                          <th>
                            KURSI
                          </th>
                          <th>
                            CREATE AT
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