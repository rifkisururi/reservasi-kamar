@extends('template')

@section('judul','Riwayat Pemesanan')

@section('content')

<form action="/admin/riwayat_pemesanan/{{ Request::segment(3) }}" method="post" enctype="multipart/form-data"> 
<input type="hidden" name="_method" value="put">
{{csrf_field()}}
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<div class="row">

					<div class="col-md-4">
						<div class="form-group">
	                      <label>Nama Pemesan</label>
	                      <input type="text" class="form-control" disabled value="{{$pemesanan->nama}}">
	                    </div>
                    </div>

                    <div class="col-md-4">
						<div class="form-group">
	                      <label>Nomor Kamar</label>
	                      <input type="number" class="form-control" disabled value="{{$pemesanan->nomor}}">
	                    </div>
                    </div>

                    <div class="col-md-4">
						<div class="form-group">
	                      <label>Total Harga</label>
	                      <input type="text" class="form-control" disabled value="{{$pemesanan->harga}}">
	                    </div>
                    </div>

                    <div class="col-md-4">
						<div class="form-group">
	                      <label>Check In</label>
	                      <input type="text" class="form-control" disabled value="{{$pemesanan->check_in}}">
	                    </div>
                    </div>

                    <div class="col-md-4">
						<div class="form-group">
	                      <label>Check Out</label>
	                      <input type="text" class="form-control" disabled value="{{$pemesanan->check_out}}">
	                    </div>
                    </div>

                    <div class="col-md-4">
                    	<div class="form-group">
	                      <label>Status</label>
	                      <select class="form-control" name="status">
	                        <option @if($pemesanan->status == 'menunggu pembayaran') selected @endif>menunggu pembayaran</option>
	                        <option @if($pemesanan->status == 'sudah dibayar') selected @endif>sudah dibayar</option>
	                      </select>
                    	</div>
                    </div>     	     	

				</div>

				<button type="submit" class="btn btn-primary">Update</button>

			</div>
		</div>
	</div>
</div>
</form>

@endsection