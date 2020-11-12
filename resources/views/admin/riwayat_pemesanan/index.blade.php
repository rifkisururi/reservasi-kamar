@extends('template')

@section('judul','Riwayat Pemesanan')

@section('content')

<div class="row">
	<div class="col-md-12">

		@if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
              <strong>{{ $message }}</strong>
          </div>
    	@endif

		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped" id="table-1" style="width: 100%;">
		              <thead>                                 
		                <tr>
		                  <th class="text-center">#</th>
		                  <th>Nama</th>
		                  <th>No Kamar</th>
		                  <th>Check In</th>
		                  <th>Check Out</th>
		                  <th>Status</th>
		                  <th>Aksi</th>
		                </tr>
		              </thead>
		              <tbody> 
		              	@foreach($pemesanan as $r)
		              		<tr>
		              			<td class="text-center">{{$loop->iteration}}</td>
		              			<td>{{$r->nama}}</td>
		              			<td>{{$r->nomor}}</td>
		              			<td>{{$r->check_in}}</td>
		              			<td>{{$r->check_out}}</td>
		              			<td>{{$r->status}}</td>
		              			<td><a href="/admin/riwayat_pemesanan/{{$r->id}}" class="btn btn-icon btn-success"><i class="far fa-edit"></i></a></td>
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