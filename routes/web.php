<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@login_action');
Route::get('/logout', 'AuthController@logout');
Route::get('/register', 'AuthController@register');
Route::post('/register', 'AuthController@register_action');

// Admin

Route::get('admin/dashboard', 'Admin\DashboardController@index');
Route::get('admin/dashboard/laporan', 'Admin\DashboardController@laporan');

Route::get('admin/manajemen_kamar', 'Admin\ManajemenKamarController@index');
Route::get('admin/manajemen_kamar/create', 'Admin\ManajemenKamarController@create');
Route::post('admin/manajemen_kamar', 'Admin\ManajemenKamarController@store');
Route::get('admin/manajemen_kamar/{id}', 'Admin\ManajemenKamarController@show');
Route::put('admin/manajemen_kamar/{id}', 'Admin\ManajemenKamarController@update');
Route::delete('admin/manajemen_kamar/{id}', 'Admin\ManajemenKamarController@destroy');

Route::get('admin/riwayat_pemesanan', 'Admin\RiwayatPemesananController@index');
Route::get('admin/riwayat_pemesanan/{id}', 'Admin\RiwayatPemesananController@show');
Route::put('admin/riwayat_pemesanan/{id}', 'Admin\RiwayatPemesananController@update');

// pengguna

Route::get('pesan_kamar', 'Pengguna\PesanKamarController@index');
Route::get('pesan_kamar/{id}', 'Pengguna\PesanKamarController@show');
Route::post('pesan_kamar', 'Pengguna\PesanKamarController@store');

Route::get('riwayat_pemesanan', 'Pengguna\RiwayatPemesananController@index');


