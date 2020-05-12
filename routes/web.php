<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Ganti Auth
|--------------------------------------------------------------------------
| Percobaan menggunakan auth seperti ini, jika tidak cocok nanti kembalikan
| lagi ke auth bawaan laravel.
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth admin
// Auth::routes();

// Auth Peserta
// Route::get('peserta/login', function () {
//     return view('auth.peserta');
// });

// Route::get('/home', 'HomeController@index')->name('home');

// Login
Route::get('/', function () {
    return redirect('login');
});

Route::get('login', [
	'uses' => 'AuthController@login',
	'as' => 'login'
]);

Route::post('login', [
	'uses' => 'AuthController@postLogin',
	'as' => 'post.login'
]);

Route::get('logout', [
	'uses' => 'AuthController@logout',
	'as' => 'logout'
]);

// Admin
Route::group(['middleware' => ['auth','checkRole:Admin']], function ()
{
	// Dashboard
	Route::get('admin/dashboard', [
		'uses' => 'DashboardController@admin',
		'as' => 'admin.dashboard'
	]);

	// Konten
	Route::get('admin/konten', [
		'uses' => 'KontenController@index',
		'as' => 'konten.index'
	]);

	Route::get('admin/konten/create', [
		'uses' => 'KontenController@create',
		'as' => 'konten.create'
	]);

	Route::post('admin/konten/store', [
		'uses' => 'KontenController@store',
		'as' => 'konten.store'
	]);

	Route::get('admin/konten/{konten}/edit', [
		'uses' => 'KontenController@edit',
		'as' => 'konten.edit'
	]);

	Route::post('admin/konten/{konten}/update', [
		'uses' => 'KontenController@update',
		'as' => 'konten.update'
	]);

	Route::get('admin/konten/{konten}/destroy', [
		'uses' => 'KontenController@destroy',
		'as' => 'konten.destroy'
	]);

	// Kategori Materi


	// Materi 


	// Quis 


	// Program 


	// Umum

	   
	// Prakerja 


	// Data Transaksi 


	// Pengguna
	Route::get('admin/pengguna', [
		'uses' => 'PenggunaController@index',
		'as' => 'pengguna.index'
	]);

	Route::post('admin/pengguna/store', [
		'uses' => 'PenggunaController@store',
		'as' => 'pengguna.store'
	]);

	Route::get('admin/pengguna/{user}/update', [
		'uses' => 'PenggunaController@update',
		'as' => 'pengguna.update'
	]);

	Route::get('admin/pengguna/{user}/destroy', [
		'uses' => 'PenggunaController@destroy',
		'as' => 'pengguna.destroy'
	]);	

});

// Peserta
Route::group(['middleware' => ['auth','checkRole:Admin,Peserta']], function ()
{
	Route::get('peserta/dashboard', [
		'uses' => 'DashboardController@peserta',
		'as' => 'peserta.dashboard'
	]);

	// Informasi
	Route::get('peserta/Informasi', [
		'uses' => 'InformasiController@index',
		'as' => 'informasi.index'
	]);

	// Materi
	
	
	// Quis
	
	// Sertifikat
	
	
	// Riwayat Transaksi


});


// Download File (Belum Selesai)
Route::get('download/{filename}/file', [
	'uses' => 'KontenController@download',
	'as' => 'konten.download'
]);