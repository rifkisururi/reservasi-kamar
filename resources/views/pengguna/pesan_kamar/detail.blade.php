@extends('template')

@section('judul','Pesan Kamar')

@section('content')

<div class="row">
  <div class="col-md-12">

    @if($message = Session::get('success'))
          <div class="alert alert-danger alert-block">
              <strong>{{ $message }}</strong>
          </div>
      @endif


    <div class="card">
      <div class="card-body">

        <h6 style="color: black;">{{$kamar->nomor}} | {{number_format($kamar->harga,2,',','.')}}  (malam)</h6>

        <p></p>

        <div class="row">

          <div class="col-md-6">
            <img src="{{asset('gambar_kamar/'.$kamar->gambar)}}" style="width: 100%;height: 100%;">
          </div>

          <div class="col-md-6">
            <h6 style="color: black;">Deskripsi</h6>
              {!! $kamar->deskripsi !!}

            <hr>

            <h6 style="color: black;">Fasilitas</h6>
              {!! $kamar->fasilitas !!}
          </div>

        </div>

      </div>
    </div>

    <button class="btn btn-primary" onclick="pesan({{$kamar->id}})">Pesan Sekarang</button>
    <p></p>

  </div>
</div>

@endsection

<!-- Modal Pemesanan -->
<form action="/pesan_kamar" method="post">
{{csrf_field()}}
<div class="modal fade" tabindex="-1" role="dialog" id="modal_pemesanan">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Form Pemesanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="id_kamar" id="id_kamar">
          
          <div class="row">
            
            <div class="col-md-6">
               <div class="form-group">
                  <label>Check In</label>
                  <input type="date" class="form-control" name="check_in">
                </div>
            </div>

            <div class="col-md-6">
               <div class="form-group">
                  <label>Check Out</label>
                  <input type="date" class="form-control" name="check_out">
                </div>
            </div>

          </div>

        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- Modal Pemesanan -->

@section('js')

  <script type="text/javascript">
    
    function pesan(id){
        $('#id_kamar').val(id);
        $('#modal_pemesanan').modal('show');
    }

  </script>

@endsection