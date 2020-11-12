@extends('template')

@section('judul','Riwayat Pemesanan')

@section('content')

<div class="row">
	<div class="col-12">

		@if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
              <strong>{{ $message }}</strong>
          </div>
    	@endif

		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped" id="table-1">
		              <thead>                                 
		                <tr>
		                  <th class="text-center">#</th>
		                  <th>No Kamar</th>
		                  <th>Check In</th>
		                  <th>Check Out</th>
		                  <th>Total Harga</th>
		                  <th>Status</th>
		                </tr>
		              </thead>
		              <tbody> 
		              	@foreach($pemesanan as $r)
		              		<tr>
		              			<td class="text-center">{{$loop->iteration}}</td>
		              			<td>{{$r->nomor}}</td>
		              			<td>{{$r->check_in}}</td>
		              			<td>{{$r->check_out}}</td>
		              			<td>{{number_format($r->harga,2,',','.')}}</td>
		              			<td>{{$r->status}}</td>
		              			<td></td>
		              		</tr>
		              	@endforeach
		              </tbody>
            		</table>           
				</div>
			</div>
		</div>

	</div>
</div>

@endsection