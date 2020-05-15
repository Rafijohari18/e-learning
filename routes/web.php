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


// Landing Page
Route::get('/', function () {
	return view('layouts.landingpage');
});

// Login
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
})->name('registrasi');

// Admin
Route::group(['middleware' => ['auth','checkRole:Admin']], function ()
{
	Route::prefix('admin')->group(function () {
		// Dashboard
		Route::get('dashboard', [
			'uses' => 'DashboardController@admin',
			'as' => 'admin.dashboard'
		]);

		// Konten
		Route::get('konten', [
			'uses' => 'KontenController@index',
			'as' => 'konten.index'
		]);

		Route::get('konten/create', [
			'uses' => 'KontenController@create',
			'as' => 'konten.create'
		]);

		Route::post('konten/store', [
			'uses' => 'KontenController@store',
			'as' => 'konten.store'
		]);

		Route::get('konten/{konten}/edit', [
			'uses' => 'KontenController@edit',
			'as' => 'konten.edit'
		]);

		Route::post('konten/{konten}/update', [
			'uses' => 'KontenController@update',
			'as' => 'konten.update'
		]);

		Route::get('konten/{konten}/destroy', [
			'uses' => 'KontenController@destroy',
			'as' => 'konten.destroy'
		]);

		// Kategori Modul
		Route::get('kategori', [
			'uses' => 'KategoriController@index',
			'as' => 'kategori.index'
		]);

		Route::post('kategori/store', [
			'uses' => 'KategoriController@store',
			'as' => 'kategori.store'
		]);

		Route::post('kategori/{id}/update', [
			'uses' => 'KategoriController@update',
			'as' => 'kategori.update'
		]);

		Route::get('kategori/{id}/destroy', [
			'uses' => 'KategoriController@destroy',
			'as' => 'kategori.destroy'
		]);

		// Quis 
		Route::get('quiz/{id}', [
			'uses' => 'QuizController@index',
			'as' => 'quiz.index'
		]);

		Route::get('quiz/soal/{id}', [
			'uses' => 'QuizController@soal',
			'as' => 'quiz.soal'
		]);
		Route::get('quiz/create/{id}', [
			'uses' => 'QuizController@create',
			'as' => 'quiz.create'
		]);

		Route::post('quiz/store', [
			'uses' => 'QuizController@store',
			'as' => 'quiz.store'
		]);


		Route::get('quiz/edit/{id}/{modul}', [
			'uses' => 'QuizController@edit',
			'as' => 'quiz.edit'
		]);

		Route::post('quiz/{id}/update', [
			'uses' => 'QuizController@update',
			'as' => 'quiz.update'
		]);

		Route::get('quiz/{id}/destroy', [
			'uses' => 'QuizController@destroy',
			'as' => 'quiz.destroy'
		]);


		// Program 
		Route::get('program', [
			'uses' => 'ProgramController@index',
			'as' => 'program.index'
		]);

		Route::post('program/store', [
			'uses' => 'ProgramController@store',
			'as' => 'program.store'
		]);

		Route::post('program/{id}/update', [
			'uses' => 'ProgramController@update',
			'as' => 'program.update'
		]);

		Route::get('program/{id}/destroy', [
			'uses' => 'ProgramController@destroy',
			'as' => 'program.destroy'
		]);


		// Module 
		Route::get('module', [
			'uses' => 'ModuleController@index',
			'as' => 'module.index'
		]);

		Route::get('module/create', [
			'uses' => 'ModuleController@create',
			'as' => 'module.create'
		]);

		Route::post('module/store', [
			'uses' => 'ModuleController@store',
			'as' => 'module.store'
		]);

		Route::get('module/{id}/edit', [
			'uses' => 'ModuleController@edit',
			'as' => 'module.edit'
		]);

		Route::post('module/{id}/update', [
			'uses' => 'ModuleController@update',
			'as' => 'module.update'
		]);

		Route::get('module/{module}/destroy', [
			'uses' => 'ModuleController@destroy',
			'as' => 'module.destroy'
		]);

		//Materi
		Route::get('{id}/materi', [
			'uses' => 'MateriController@index',
			'as' => 'materi.index'
		]);

		Route::get('materi/{id}/create', [
			'uses' => 'MateriController@create',
			'as' => 'materi.create'
		]);


		Route::post('materi/store', [
			'uses' => 'MateriController@store',
			'as' => 'materi.store'
		]);


		Route::get('materi/{id}/edit', [
			'uses' => 'MateriController@edit',
			'as' => 'materi.edit'
		]);

		Route::post('materi/{id}/update', [
			'uses' => 'MateriController@update',
			'as' => 'materi.update'
		]);

		Route::get('materi/{id}/destroy', [
			'uses' => 'MateriController@destroy',
			'as' => 'materi.destroy'
		]);




		// Umum


		// Prakerja 


		// Data Transaksi 
		Route::get('transaksi', [
			'uses' => 'TransaksiController@index',
			'as' => 'transaksi.index'
		]);


		// Pengguna
		Route::get('pengguna', [
			'uses' => 'PenggunaController@index',
			'as' => 'pengguna.index'
		]);

		Route::post('pengguna/store', [
			'uses' => 'PenggunaController@store',
			'as' => 'pengguna.store'
		]);

		Route::get('pengguna/{user}/update', [
			'uses' => 'PenggunaController@update',
			'as' => 'pengguna.update'
		]);

		Route::get('pengguna/{user}/destroy', [
			'uses' => 'PenggunaController@destroy',
			'as' => 'pengguna.destroy'
		]);	
	});
});

// Peserta
Route::group(['middleware' => ['auth','checkRole:Admin,Peserta']], function ()
{
	Route::prefix('peserta')->group(function () {
	    Route::get('dashboard', [
			'uses' => 'DashboardController@peserta',
			'as' => 'peserta.dashboard'
		]);

		// Modul
		Route::get('modul', [
			'uses' => 'ModuleController@indexPeserta',
			'as' => 'peserta.module'
		]);

		Route::get('detail/{module}/modul', [
			'uses' => 'ModuleController@showModul',
			'as' => 'module.detail'
		]);

		//quiz
		Route::get('quis', [
			'uses' => 'Peserta\QuisController@index',
			'as' => 'peserta.quis'
		]);



	});

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


//CONFIG
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    return 'DONE'; //Return anything
});


