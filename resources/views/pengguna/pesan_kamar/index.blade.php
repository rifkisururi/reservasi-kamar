@extends('template')

@section('judul','Pesan Kamar')

@section('content')

<div class="row">
    <div class="col-12 col-md-4 col-lg-4">

    	@foreach($kamar as $r)
	    	<article class="article article-style-c">
	          <div class="article-header">
	            <div class="article-image" data-background="{{asset('gambar_kamar/'.$r->gambar)}}">
	            </div>
	          </div>
	          <div class="article-details">
	            <div class="article-category"><a href="/pesan_kamar/{{$r->id}}">{{$r->nomor}}</a> <div class="bullet"></div> <a href="#">{{number_format($r->harga,2,',','.')}} / malam</a></div>
	            <div class="article-title">
	            </div>
	            <p>Fasilitas : {{$r->fasilitas}}</p>
	          </div>
	        </article>
        @endforeach

    </div>
</div>
@endsection