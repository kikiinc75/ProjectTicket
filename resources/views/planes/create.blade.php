@section('js')
    <script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })


var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('submit').disabled = false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
    </script>
@stop
@extends('layouts.index')
@section('content')
    <form method="POST" action="{{ route('planes.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="row">
                <div class="col-md-12 d-flex align-items-stretch grid-margin">
                  <div class="row flex-grow">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Tambah Data Pesawat</h4>

                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">NAMA PESAWAT</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('eco_seat_qty') ? ' has-error' : '' }}">
                                <label for="eco_seat_qty" class="col-md-4 control-label">ECO SEAT</label>
                                <div class="col-md-6">
                                    <input id="eco_seat_qty" type="number"  class="form-control" name="eco_seat_qty" value="">
                                    @if ($errors->has('eco_seat_qty'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('eco_seat_qty') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bus_seat_qty') ? ' has-error' : '' }}">
                               <label for="bus_seat_qty" class="col-md-4 control-label">BUS SEAT </label>
                               <div class="col-md-6">
                                   <input id="bus_seat_qty" type="number"  class="form-control" name="bus_seat_qty" value="" required="">
                                   @if ($errors->has('bus_seat_qty'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('bus_seat_qty') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('first_seat_qty') ? ' has-error' : '' }}">
                               <label for="first_seat_qty" class="col-md-4 control-label">FIRST SEAT</label>
                               <div class="col-md-6">
                                   <input id="first_seat_qty" type="number" class="form-control" name="first_seat_qty" value="">
                                   @if ($errors->has('first_seat_qty'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('first_seat_qty') }}</strong>
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
                            <a href="{{route('planes.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

    </div>
    </form>
  @endsection
