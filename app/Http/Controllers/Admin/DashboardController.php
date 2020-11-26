<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

	public function index()
	{

		return view('admin.dashboard.index');
	}

	public function laporan(Request $request)
	{

		$bulan = $request->get('bulan');
		$tahun = $request->get('tahun');

		$data = DB::table('pemesanan')
			->join('kamar', 'pemesanan.kamar_id', 'kamar.id')
			->join('user', 'pemesanan.user_id', 'user.id')
			->whereMonth('check_in', $bulan)
			->whereYear('check_in', $tahun)
			->where('status', 'sudah dibayar')
			->select('pemesanan.*', 'kamar.nomor', 'user.nama')
			->get();

		$jumlah_pemasukan = DB::table('pemesanan')
			->whereMonth('check_in', $bulan)
			->whereYear('check_in', $tahun)
			->where('status', 'sudah dibayar')
			->sum('harga');

		$jumlah_pemesanan = DB::table('pemesanan')
			->whereMonth('check_in', $bulan)
			->whereYear('check_in', $tahun)
			->where('status', 'sudah dibayar')
			->count();

		$callback['data'] = $data;
		$callback['jumlah_pemasukan'] = $jumlah_pemasukan;
		$callback['jumlah_pemesanan'] = $jumlah_pemesanan;

		return response()->json($callback);
	}
}
