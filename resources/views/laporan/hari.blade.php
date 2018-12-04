@extends('layouts.index')

@section('content')
<div class="row" style="margin-top: 20px;">
	<div class="col-lg-12 grid-margin stretch-card">
    	<div class="card">
			<div class="card-body">
            	<h4 class="card-title">Data Grafik Transaksi</h4>
            	<div>
            		{!! $chart->container() !!}
            	</div>
            </div>
        </div>
    </div>
</div>
  {!! $chart->script() !!}
@endsection