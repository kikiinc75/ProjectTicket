@section('js')
 <script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("trains_name").value = $(this).attr('data-trains_name');
                document.getElementById("trains_id").value = $(this).attr('data-trains_id');
                $('#myModal').modal('hide');
            });
             $(function () {
                $("#lookup").dataTable();
            });

        </script>

@stop
@section('css')

@stop
@extends('layouts.index')

@section('content')
<form method="POST" action="{{ route('trains_detail.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Detail Kereta</h4>
                        <div class="form-group{{ $errors->has('trains_id') ? ' has-error' : '' }}">
                            <label for="trains_id" class="col-md-4 control-label">Nama Kereta</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="trains_name" type="text" class="form-control" readonly="" required>
                                <input id="trains_id" type="hidden" name="trains_id" value="{{ old('trains_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Kereta</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('trains_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('trains_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                <label for="tgl_pinjam" class="col-md-4 control-label">Kode Kereta</label>
                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control" name="code" value="">
                                    @if ($errors->has('code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('code') }}</strong>
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
                        <a href="{{route('trains_detail.index')}}" class="btn btn-light pull-right">Back</a>
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
                                    <th>
                              Nama Kereta
                            </th>
                            <th>
                              Jumlah Kursi Ekonomi
                            </th>
                            <th>
                              Jumlah Kursi Bisnis
                            </th>
                            <th>
                              Jumlah Kursi Executive
                            </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trains as $data)
                                <tr class="pilih" data-trains_id="<?php echo $data->id; ?>" data-trains_name="<?php echo $data->name; ?>" >
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->eco_seat_qty}}</td>
                                    <td>{{$data->bus_seat_qty}}</td>
                                    <td>{{$data->exec_seat_qty}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
@endsection