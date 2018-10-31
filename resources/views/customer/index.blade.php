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
      <a href="" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Customer</a>
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
                    <h4 class="card-title">Data Customer</h4>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table">
                        <thead>
                          <tr>
                            <th>
                              NIK
                            </th>
                            <th>
                              NAME
                            </th>
                            <th>
                              ADDRESS
                            </th>
                            <th>
                              PHONE
                            </th>
                            <th>
                              GENDER
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
