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

// Register
Route::get('registrasi', function () {
	return view('login.registrasi');
});

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

	// Kategori Modul
	Route::get('admin/kategori', [
		'uses' => 'KategoriController@index',
		'as' => 'kategori.index'
	]);

	Route::post('admin/kategori/store', [
		'uses' => 'KategoriController@store',
		'as' => 'kategori.store'
	]);

	Route::post('admin/kategori/{id}/update', [
		'uses' => 'KategoriController@update',
		'as' => 'kategori.update'
	]);

	Route::get('admin/kategori/{id}/destroy', [
		'uses' => 'KategoriController@destroy',
		'as' => 'kategori.destroy'
	]);

	// Quis 


	// Program 
	Route::get('admin/program', [
		'uses' => 'ProgramController@index',
		'as' => 'program.index'
	]);

	Route::post('admin/program/store', [
		'uses' => 'ProgramController@store',
		'as' => 'program.store'
	]);

	Route::post('admin/program/{id}/update', [
		'uses' => 'ProgramController@update',
		'as' => 'program.update'
	]);

	Route::get('admin/program/{id}/destroy', [
		'uses' => 'ProgramController@destroy',
		'as' => 'program.destroy'
	]);


		// Module 
	Route::get('admin/module/{id}', [
		'uses' => 'ModuleController@index',
		'as' => 'module.index'
	]);

	Route::get('admin/module/create/{id}', [
		'uses' => 'ModuleController@create',
		'as' => 'module.create'
	]);


	Route::post('admin/module/store', [
		'uses' => 'ModuleController@store',
		'as' => 'module.store'
	]);

	Route::get('admin/module/edit/{id}', [
		'uses' => 'ModuleController@edit',
		'as' => 'module.edit'
	]);

	Route::post('admin/module/{id}/update', [
		'uses' => 'ModuleController@update',
		'as' => 'module.update'
	]);

	Route::get('admin/module/{id}/destroy', [
		'uses' => 'ModuleController@destroy',
		'as' => 'module.destroy'
	]);

	//materi

	Route::get('admin/materi/{id}', [
		'uses' => 'MateriController@index',
		'as' => 'materi.index'
	]);

	Route::get('admin/materi/create/{id}', [
		'uses' => 'MateriController@create',
		'as' => 'materi.create'
	]);


	Route::post('admin/materi/store', [
		'uses' => 'MateriController@store',
		'as' => 'materi.store'
	]);


	Route::get('admin/materi/edit/{id}', [
		'uses' => 'MateriController@edit',
		'as' => 'materi.edit'
	]);

	Route::post('admin/materi/{id}/update', [
		'uses' => 'MateriController@update',
		'as' => 'materi.update'
	]);

	Route::get('admin/materi/{id}/destroy', [
		'uses' => 'MateriController@destroy',
		'as' => 'materi.destroy'
	]);


	// Umum


	// Prakerja 


	// Data Transaksi 
	Route::get('admin/transaksi', [
		'uses' => 'TransaksiController@index',
		'as' => 'transaksi.index'
	]);


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


	// Ganti Kata Sandi
	Route::get('pengguna/ganti/kata-sandi', [
		'uses' => 'PenggunaController@gantiPw',
		'as' => 'ganti.pw'
	]);

	Route::post('pengguna/ganti/kata-sandi', [
		'uses' => 'PenggunaController@updatePw',
		'as' => 'update.pw'
	]);
});


// Download File (Belum Selesai)
Route::get('download/{filename}/file', [
	'uses' => 'KontenController@download',
	'as' => 'konten.download'
]);

// Slug Read Artikel
Route::get('/{slug}/artikel', [
	'uses' => 'InformasiController@slug',
	'as' => 'informasi.slug'
]);