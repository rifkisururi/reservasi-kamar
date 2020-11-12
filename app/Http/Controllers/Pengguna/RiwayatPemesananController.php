<?php

namespace App\Http\Controllers\Pengguna;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RiwayatPemesananController extends Controller
{

	public function index(){
			
		$data['pemesanan'] = DB::table('pemesanan')
							->join('kamar','pemesanan.kamar_id','kamar.id')
							->where('pemesanan.user_id',session('id'))
							->select('pemesanan.*','kamar.nomor')
							->get();
		return view('pengguna.riwayat_pemesanan.index',$data);

	}

}