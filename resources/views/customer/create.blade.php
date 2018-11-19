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
    <form method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="row">
                <div class="col-md-12 d-flex align-items-stretch grid-margin">
                  <div class="row flex-grow">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Tambah Customer</h4>

                             <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                                <label for="tgl_pinjam" class="col-md-4 control-label">NIK</label>
                                <div class="col-md-6">
                                    <input id="nik" type="text" class="form-control" name="nik" value="">
                                    @if ($errors->has('nik'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nik') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="tgl_kembali" class="col-md-4 control-label">Nama Customer</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"  class="form-control" name="name" value="">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                               <label for="code" class="col-md-4 control-label">Address </label>
                               <div class="col-md-6">
                                   <input id="address" type="text"  class="form-control" name="address" value="" required="">
                                   @if ($errors->has('address'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('address') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                               <label for="deskripsi" class="col-md-4 control-label">Phone</label>
                               <div class="col-md-6">
                                   <input id="phone" type="tel" class="form-control" name="phone" value="">
                                   @if ($errors->has('phone'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('phone') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group{{ $errors->has('kursi') ? ' has-error' : '' }}">
                               <label for="gender" class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                <select id="gender" class="form-control" name="gender" value="{{ old('gender') }}" required>
                                  <option value="laki-laki">LAKI-LAKI</option>
                                  <option value="perempuan">PEREMPUAN</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
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
                            <a href="{{route('customer.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

    </div>
    </form>

  @endsection
