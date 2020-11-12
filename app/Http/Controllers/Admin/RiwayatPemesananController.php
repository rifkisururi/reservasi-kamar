<?php

namespace App\Http\Controllers\Admin;

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
							->join('user','pemesanan.user_id','user.id')
							->select('pemesanan.*','kamar.nomor','user.nama')
							->get();
		return view('admin.riwayat_pemesanan.index',$data);

	}

	public function show($id){

		$data['pemesanan'] = DB::table('pemesanan')
							->join('kamar','pemesanan.kamar_id','kamar.id')
							->join('user','pemesanan.user_id','user.id')
							->where('pemesanan.id',$id)
							->select('pemesanan.*','kamar.nomor','user.nama')
							->first();
		return view('admin.riwayat_pemesanan.detail',$data);

	}

	public function update($id,Request $request){

		DB::table('pemesanan')
              ->where('id', $id)
              ->update(['status'=>$request->status]);

        return redirect('/admin/riwayat_pemesanan')->with('success','data berhasil diedit');

	}

}