@extends('template')

@section('judul','Manajemen Kamar')

@section('content')

<div class="row">
	<div class="col-12">

		@if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
              <strong>{{ $message }}</strong>
          </div>
    @endif

		<a href="/admin/manajemen_kamar/create"><button class="btn btn-primary">Tambah Kamar</button></a>
		<p></p>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					 <table class="table table-striped" id="table-1">
              <thead>                                 
                <tr>
                  <th class="text-center">#</th>
                  <th>No Kamar</th>
                  <th>Gambar</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody> 
              	@foreach($kamar as $r)
              		<tr>
              			<td class="text-center">{{$loop->iteration}}</td>
              			<td>{{$r->nomor}}</td>
              			<td><img src="{{asset('gambar_kamar/'.$r->gambar)}}" height="80"></td>
              			<td>{{$r->harga}}</td>
              			<td>
              			<form action="/admin/manajemen_kamar/{{$r->id}}" method="post">
  									<input type="hidden" name="_method" value="delete">
  									{{csrf_field()}}
  									<a href="/admin/manajemen_kamar/{{$r->id}}" class="btn btn-icon btn-success"><i class="far fa-edit"></i></a>
  									<button type="submit" class="btn btn-icon btn-danger">
  									<i class="fas fa-trash"></i>
  									</button>
  									</form>
              			</td>
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
