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
      <div class="row">

  <div class="col-lg-2">
    <a href="{{ route('planes_reservation.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Data</a>
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
                  <h4 class="card-title">Data Jadwal Pesawat</h4>
                  
                  <div class="table-responsive">
                    <table id="table" class="table table-striped">
                      <thead>
                          <tr>
                            <th>
                                Waktu Pemesanan
                            </th>
                            <th>
                                Nama Operator
                            </th>
                            <th>
                                Nama Pemesan
                            </th>
                            <th>
                                Nama Pesawat
                            </th>
                            <th>
                                Berangkat dari
                            </th>
                            <th>
                                Tujuan
                            </th>
                            <th>
                                Waktu Keberangkatan
                            </th>
                            <th>
                                Kursi pilihan
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Action
                            </th>
                          </tr>
                        </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                            {{$data->created_at}}
                          </td>
                          <td>
                          {{$data->user->fullname}}
                          </td>
                          <td>
                            {{$data->customer->name}}
                          </td>
                          <td>
                            {{$data->planes_detail->planes->name}}
                          </td>
                          <td>
                            {{$data->planes_schedule->from}}
                          </td>
                          <td>
                            {{$data->planes_schedule->destination}}
                          </td>
                          <td>
                            {{$data->class_seat}}
                          </td>
                          <td>
                            {{$data->price}}
                          </td>
                          <td>
                            
                          </td>
                          <td>
                           <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('planes_reservation.edit', $data->id)}}"> Edit </a>
                            <form action="{{ route('planes_reservation.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form>
                           
                          </div>
                        </div>
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