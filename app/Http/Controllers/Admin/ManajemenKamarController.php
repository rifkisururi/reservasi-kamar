<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ManajemenKamarController extends Controller
{

	public function index(){
		
		$data['kamar'] = DB::table('kamar')->get();
		return view('admin.manajemen_kamar.index',$data);

	}

	public function create(){

		return view('admin.manajemen_kamar.create');

	}

	public function store(Request $request){

		$gambar = $request->file('gambar');
		$nama_gambar=time().$gambar->getClientOriginalName();
        $gambar->move('gambar_kamar', $nama_gambar);

        DB::table('kamar')->insert([
        	'nomor'=>$request->nomor,
        	'deskripsi'=>$request->deskripsi,
        	'gambar'=>$nama_gambar,
        	'fasilitas'=>$request->fasilitas,
        	'harga'=>$request->harga
        ]);

        return redirect('/admin/manajemen_kamar')->with('success','data berhasil ditambahkan');

	}

	public function show($id){

		$data['kamar'] = DB::table('kamar')->where('id',$id)->first();
		return view('admin.manajemen_kamar.edit',$data);

	}

	public function update($id,Request $request){

		$update = array();
		$update['nomor'] = $request->nomor;
		$update['deskripsi'] = $request->deskripsi;
		$update['fasilitas'] = $request->fasilitas;
		$update['harga'] = $request->harga;

		// Jika dia upload gambar baru
		if($request->gambar != ''){

			// hapus gambar yang lama
			$path = public_path().'/gambar_kamar/';
			$data = DB::table('kamar')->where('id',$id)->first();
			unlink($path.$data->gambar);  

			// upload gambar yang baru
			$gambar = $request->file('gambar');
			$nama_gambar=time().$gambar->getClientOriginalName();
			$gambar->move('gambar_kamar', $nama_gambar);

			$update['gambar'] = $nama_gambar;
		}

		DB::table('kamar')
              ->where('id', $id)
              ->update($update);

         return redirect('/admin/manajemen_kamar')->with('success','data berhasil diedit');

	}

	public function destroy($id){

		// hapus gambar yang lama
		$path = public_path().'/gambar_kamar/';
		$data = DB::table('kamar')->where('id',$id)->first();
		unlink($path.$data->gambar);

		DB::table('kamar')->where('id', $id)->delete();  
		return redirect('/admin/manajemen_kamar')->with('success','data berhasil dihapus');

	}

}