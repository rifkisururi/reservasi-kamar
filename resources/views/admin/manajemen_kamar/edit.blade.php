@extends('template')

@section('judul','Manajemen Kamar')

@section('content')

<form action="/admin/manajemen_kamar/{{ Request::segment(3) }}" method="post" enctype="multipart/form-data"> 
<input type="hidden" name="_method" value="put">
{{csrf_field()}}
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<div class="row">

					<div class="col-md-6">
						<div class="form-group">
	                      <label>No Kamar</label>
	                      <input type="text" class="form-control" value="{{$kamar->nomor}}" name="nomor" required="">
	                    </div>
                    </div>

                    <div class="col-md-6">
						<div class="form-group">
	                      <label>Harga per Malam ( dalam rupiah )</label>
	                      <input type="number" class="form-control"  value="{{$kamar->harga}}" name="harga" required="">
	                    </div>
                    </div>

                    <div class="col-md-4">
						<div class="form-group">
	                      <label>Fasilitas</label>
	                      <input type="text" class="form-control"  value="{{$kamar->fasilitas}}" name="fasilitas" required="">
	                    </div>
                    </div>

                    <div class="col-md-4">
						<div class="form-group">
	                      <label>Gambar</label>
	                      <input type="file" class="form-control" name="gambar">
	                    </div>
                    </div>

                     <div class="col-md-4">
						<div class="form-group">
							<label>Gambar Kamar Sebelumnya</label>								
								<div>
								<img src="{{asset('gambar_kamar/'.$kamar->gambar)}}"  width="100" />
								</div>
						</div>
					</div>

                    <div class="col-md-12">
	                    <div class="form-group">
	                      <label>Deskripsi</label>
	                      <textarea class="form-control" name="deskripsi" required="">{{$kamar->deskripsi}}</textarea>
	                    </div>
                	</div>              	

				</div>

				<button type="submit" class="btn btn-primary">Submit</button>

			</div>
		</div>
	</div>
</div>
</form>

@endsection

@section('js')

<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace( 'deskripsi' );
</script>

@endsection

