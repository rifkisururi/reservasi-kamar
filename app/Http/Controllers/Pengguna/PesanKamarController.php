<?php

namespace App\Http\Controllers\Pengguna;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PesanKamarController extends Controller
{

	public function index(){
		
		$data['kamar'] = DB::table('kamar')->get();
		return view('pengguna.pesan_kamar.index',$data);

	}

	public function show($id){

		$data['kamar'] = DB::table('kamar')->where('id',$id)->first();
		return view('pengguna.pesan_kamar.detail',$data);


	}

	public function store(Request $request){

		$id_kamar = $request->id_kamar;
		$check_in = $request->check_in;
		$check_out = $request->check_out;
		$different_day = ((strtotime($check_out) - strtotime($check_in)) / (60 * 60 * 24) );

		// cek validasi

		$pemesanan = DB::table('pemesanan')->where('kamar_id',$id_kamar)->get();

		foreach ($pemesanan as $key => $value) {
			if($check_in >= $value->check_in && $check_in<=$value->check_out){
				return redirect()->back()->with('success','untuk tanggal '.$value->check_in. ' - '.$value->check_out.' sudah di pesan');
			}
		}

		$data = DB::table('kamar')->where('id',$id_kamar)->first();
		$harga = $data->harga;

		DB::table('pemesanan')->insert([
			'user_id' => session('id'),
			'kamar_id' => $id_kamar,
			'check_in' => $check_in,
			'check_out' => $check_out,
			'harga' => ($different_day * $harga),
			'status' => 'menunggu pembayaran'
		]);

		return redirect('/riwayat_pemesanan')->with('success','selamat kamar berhasil dipesan');

	}

}