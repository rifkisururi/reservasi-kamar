@extends('template')

@section('judul','Dashboard')

@section('content')

<div class="row">

<div class="col-md-2">
<div class="form-group">
<select class="form-control" id="tahun">
<option value="2020">2020</option>
</select>
</div>
</div>


<div class="col-md-2">
<div class="form-group">
<select class="form-control" id="bulan">
<option value="1">Januari</option>
<option value="2">Febuari</option>
<option value="3">Maret</option>
<option value="4">April</option>
<option value="5">Mei</option>
<option value="6">Juni</option>
<option value="7">Juli</option>
<option value="8">Agustus</option>
<option value="9">September</option>
<option value="10">Oktober</option>
<option value="11">November</option>
<option value="12">Desember</option>
</select>
</div>
</div>
  

<div class="col-md-2">
  
  <button class="btn btn-success" id="submit" style="height: 40px;">Submit</button>

</div>

</div>

<div class="row">


	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<h4>Laporan Pemasukan</h4>
			</div>
			<div class="card-body">

				<div class="row">
				<div class="col-md-6">
					<div class="form-group">
			          <label>Jumlah Pemasukan</label>
			          <input type="text" class="form-control" disabled="" id="jumlah_pemasukan">
			        </div>
			    </div>

			    <div class="col-md-6">
					<div class="form-group">
			          <label>Jumlah Pemesanan</label>
			          <input type="text" class="form-control"  disabled="" id="jumlah_pemesanan">
			        </div>
			    </div>

			    </div>

				<table class="table table-striped" id="table-1">
	              <thead>                                 
	                <tr>
	                  <th class="text-center">#</th>
	                  <th>Nama</th>
	                  <th>No Kamar</th>
	                  <th>Check In</th>
	                  <th>Check Out</th>
	                  <th>Total Harga</th>
	                </tr>
	              </thead>
	              <tbody id="isi_tabel"> 
	              	
	              </tbody>
	            </table>           
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')

<script type="text/javascript">

$('#submit').click(function(){

  $(this).html('<i class="fa fa-spinner fa-spin"></i> Processing...');

  var bulan = $('#bulan').val();
  var tahun = $('#tahun').val();

  $.ajax({
  	  url:'/admin/dashboard/laporan',
	  type:'GET',
	  data:{bulan:bulan,tahun:tahun},
	  dataType:'json',
	  success:function(response){

	  	$('#submit').html('Submit');
	  	$('#isi_tabel').empty();

	  	$('#jumlah_pemasukan').val(response.jumlah_pemasukan);
	  	$('#jumlah_pemesanan').val(response.jumlah_pemesanan);

	  	$.each(response.data,function(i,value){
	  		$('#isi_tabel').append(`
	  			<tr>
	  			<td>`+(i+1)+`</td>
	  			<td>`+value.nama+`</td>
	  			<td>`+value.nomor+`</td>
	  			<td>`+value.check_in+`</td>
	  			<td>`+value.check_out+`</td>
	  			<td>`+value.harga+`</td>
	  			</tr>
	  		`)
	  	});

	  },
	  error:function(){
	  	$('#submit').html('Submit');
	  	alert('terjadi error');
	  }
  });


});

</script>

@endsection