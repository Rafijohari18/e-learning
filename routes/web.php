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
Route::get('/', [
	'uses' => 'SiteController@beranda',
	'as' => 'beranda'
]);

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
Route::post('register', [
	'uses' => 'AuthController@register',
	'as' => 'post.register'
]);

// Sites
Route::get('informasi', [
	'uses' => 'SiteController@informasi',
	'as' => 'informasi'
]);

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

		Route::get('program/create', [
			'uses' => 'ProgramController@create',
			'as' => 'program.create'
		]);

		Route::post('program/store', [
			'uses' => 'ProgramController@store',
			'as' => 'program.store'
		]);

		Route::get('program/{program}/edit', [
			'uses' => 'ProgramController@edit',
			'as' => 'program.edit'
		]);

		Route::post('program/{program}/update', [
			'uses' => 'ProgramController@update',
			'as' => 'program.update'
		]);

		Route::get('program/{program}/destroy', [
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

		Route::get('module/{module}/show', [
			'uses' => 'ModuleController@show',
			'as' => 'module.show'
		]);

		Route::get('module/{module}/edit', [
			'uses' => 'ModuleController@edit',
			'as' => 'module.edit'
		]);

		Route::post('module/{module}/update', [
			'uses' => 'ModuleController@update',
			'as' => 'module.update'
		]);

		Route::get('module/{module}/destroy', [
			'uses' => 'ModuleController@destroy',
			'as' => 'module.destroy'
		]);

		// Materi
		// Route::get('{id}/materi', [
		// 	'uses' => 'MateriController@index',
		// 	'as' => 'materi.index'
		// ]);

		// Route::get('materi/{id}/create', [
		// 	'uses' => 'MateriController@create',
		// 	'as' => 'materi.create'
		// ]);

		// Route::post('materi/store', [
		// 	'uses' => 'MateriController@store',
		// 	'as' => 'materi.store'
		// ]);

		// Route::get('materi/{id}/edit', [
		// 	'uses' => 'MateriController@edit',
		// 	'as' => 'materi.edit'
		// ]);

		// Route::post('materi/{id}/update', [
		// 	'uses' => 'MateriController@update',
		// 	'as' => 'materi.update'
		// ]);

		// Route::get('materi/{id}/destroy', [
		// 	'uses' => 'MateriController@destroy',
		// 	'as' => 'materi.destroy'
		// ]);
		
		// Peserta Umum
		Route::get('data-peserta/umum', [
			'uses' => 'PesertaController@index',
			'as' => 'peserta.indexUmum'
		]);

		Route::get('detail-peserta/{peserta}/umum', [
			'uses' => 'PesertaController@show',
			'as' => 'peserta.showUmum'
		]);

		Route::get('peserta/{user}/destroy', [
			'uses' => 'PesertaController@destroy',
			'as' => 'peserta.destroy'
		]);

		// Prakerja 


		// Data Transaksi 
		Route::get('transaksi', [
			'uses' => 'TransaksiController@index',
			'as' => 'transaksi.index'
		]);

		Route::get('transaksi/{transaksi}/show', [
			'uses' => 'TransaksiController@show',
			'as' => 'transaksi.show'
		]);

		Route::get('transaksi/{transaksi}/update', [
			'uses' => 'TransaksiController@update',
			'as' => 'transaksi.update'
		]);

		Route::get('transaksi/{transaksi}/destroy', [
			'uses' => 'TransaksiController@destroy',
			'as' => 'transaksi.destroy'
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
	Route::get('/peserta/quiz/{sectionId}','Peserta\QuisController@index')->name('peserta.quiz');
	Route::prefix('peserta')->group(function () {
		Route::get('dashboard', [
			'uses' => 'DashboardController@peserta',
			'as' => 'peserta.dashboard'
		]);

		// Program
		Route::get('program', [
			'uses' => 'ProgramController@indexPeserta',
			'as' => 'peserta.program'
		]);

		Route::get('detail/{program}/show', [
			'uses' => 'ProgramController@showProgram',
			'as' => 'program.detail'
		]);

		// Modul
		Route::get('modul/program/{proId}/modul/{mdId}/read', [
			'uses' => 'ProgramController@readModul',
			'as' => 'program.read'
		]);

		Route::post('daftar/belajar', [
			'uses' => 'ProgramController@daftarBelajar',
			'as' => 'daftar.belajar'
		]);

		Route::post('quis/tambah/{id}', [
			'uses' => 'Peserta\QuisController@tambah',
			'as' => 'quis.tambah'
		]);

		Route::get('quis/hasil', [
			'uses' => 'Peserta\QuisController@hasil',
			'as' => 'quis.hasil'
		]);

		// Sertifikat
		Route::get('sertifikat', [
			'uses' => 'Peserta\SertifikatController@index',
			'as' => 'peserta.sertifikat'
		]);

		Route::get('sertifikat/show/{id}', [
			'uses' => 'Peserta\SertifikatController@show',
			'as' => 'peserta.show'
		]);
	
		// Transaksi
		Route::get('transaksi', [
			'uses' => 'Peserta\InvoiceController@list',
			'as' => 'peserta.list'
		]);

		Route::get('transaksi/invoice/detail/{id}', [
			'uses' => 'Peserta\InvoiceController@detail',
			'as' => 'peserta.detail'
		]);

		Route::get('transaksi/detail/pembayaran', [
			'uses' => 'Peserta\InvoiceController@detailPembayaran',
			'as' => 'detail.pembayaran'
		]);

		// Upload Struk
		Route::get('upload/struk/pembayaran', [
			'uses' => 'Peserta\InvoiceController@uploadStruk',
			'as' => 'struk.upload'
		]);

		Route::post('upload/struk/pembayaran/{transaksi}/update', [
			'uses' => 'Peserta\InvoiceController@updateStruk',
			'as' => 'struk.update'
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

// Slug
Route::get('informasi/detail/{slug}', [
	'uses' => 'SiteController@detailInformasi',
	'as' => 'detail.informasi'
]);

Route::get('program/detail/{slug}', [
	'uses' => 'SiteController@detailProgram',
	'as' => 'detail.program'
]);

Route::get('ikuti-pelatihan/{program}/detail-pembayaran', [
	'uses' => 'SiteController@checkout',
	'as' => 'checkout'
]);

//invoice
Route::post('invoice', [
	'uses' => 'Peserta\invoiceController@index',
	'as' => 'invoice.modul'
]);

//CONFIG
Route::get('/clear-cache', function() {
	$exitCode = Artisan::call('config:clear');
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('config:cache');
	$exitCode = Artisan::call('view:clear');
    return 'DONE'; //Return anything
});
