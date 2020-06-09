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
Route::get('adminblkk/login', [
	'uses' => 'AuthController@loginAdmin',
	'as' => 'login.admin'
]);

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
Route::get('daftar-akun', [
	'uses' => 'AuthController@daftarAkun',
	'as' => 'daftar.akun'
]);

Route::get('/json/{id}/cari-program', [
	'uses' => 'AuthController@cariProgram',
	'as' => 'json.cp'
]);


Route::post('register', [
	'uses' => 'AuthController@register',
	'as' => 'post.register'
]);

// Sites
Route::get('informasi', [
	'uses' => 'SiteController@informasi',
	'as' => 'informasi'
]);

Route::get('program', [
	'uses' => 'SiteController@program',
	'as' => 'program'
]);

Route::post('program/cari', [
	'uses' => 'SiteController@cariProgram',
	'as' => 'cari.program'
]);

Route::post('informasi/cari', [
	'uses' => 'SiteController@cariInformasi',
	'as' => 'cari.informasi'
]);

// Admin
Route::group(['middleware' => ['auth','checkRole:Admin,Pengajar']], function ()
{
	Route::prefix('admin')->group(function () {
		// Dashboard
		Route::get('dashboard', [
			'uses' => 'DashboardController@admin',
			'as' => 'admin.dashboard'
		]);

		// Slider
		Route::get('slider', [
			'uses' => 'SliderController@index',
			'as' => 'slider.index'
		]);

		Route::get('slider/create', [
			'uses' => 'SliderController@create',
			'as' => 'slider.create'
		]);

		Route::post('slider/store', [
			'uses' => 'SliderController@store',
			'as' => 'slider.store'
		]);

		Route::get('slider/{slider}/edit', [
			'uses' => 'SliderController@edit',
			'as' => 'slider.edit'
		]);

		Route::post('slider/{slider}/update', [
			'uses' => 'SliderController@update',
			'as' => 'slider.update'
		]);

		Route::get('slider/{slider}/destroy', [
			'uses' => 'SliderController@destroy',
			'as' => 'slider.destroy'
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
		Route::get('quiz/nilai/{id}', [
			'uses' => 'QuizController@nilai',
			'as' => 'quiz.nilai'
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

		// Peserta Umum
		Route::get('data-peserta/umum', [
			'uses' => 'PesertaController@index',
			'as' => 'peserta.indexUmum'
		]);

		Route::get('detail-peserta/{peserta}/umum', [
			'uses' => 'PesertaController@show',
			'as' => 'peserta.showUmum'
		]);

		Route::get('detail-peserta/{id}/sertifikat', [
			'uses' => 'PesertaController@sertifikat',
			'as' => 'peserta.showSertifikat'
		]);
		Route::get('detail-peserta/{id}/preview', [
			'uses' => 'PesertaController@preview',
			'as' => 'peserta.previewSertifikat'
		]);

		Route::get('peserta/destroy/{user}', [
			'uses' => 'PesertaController@destroy',
			'as' => 'peserta.destroy'
		]);

		// Prakerja
		Route::get('peserta/prakerja', [
			'uses' => 'PesertaController@indexPrakerja',
			'as' => 'peserta.prakerja'
		]);

		Route::get('detail-peserta/{peserta}/prakerja', [
			'uses' => 'PesertaController@show',
			'as' => 'peserta.showPrakerja'
		]);

		// Data Transaksi 
		Route::get('transaksi', [
			'uses' => 'TransaksiController@index',
			'as' => 'transaksi.index'
		]);

		Route::get('transaksi/{transaksi}/show', [
			'uses' => 'TransaksiController@show',
			'as' => 'transaksi.show'
		]);

		Route::get('transaksi/update/{transaksi}', [
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

		// Profil
		Route::get('pengguna/profil', [
			'uses' => 'PenggunaController@profil',
			'as' => 'pengguna.profil'
		]);

		Route::post('pengguna/update/profil', [
			'uses' => 'PenggunaController@profUpdate',
			'as' => 'profil.profUpdate'
		]);

		Route::get('kupon', [
			'uses' => 'KuponController@index',
			'as' => 'kupon.index'
		]);

			Route::get('kupon/create', [
			'uses' => 'KuponController@create',
			'as' => 'kupon.create'
		]);
			Route::post('kupon/store', [
			'uses' => 'KuponController@store',
			'as' => 'kupon.store'
		]);

		Route::get('kupon/{id}/edit', [
			'uses' => 'KuponController@edit',
			'as' => 'kupon.edit'
		]);

		Route::post('kupon/{id}/update', [
			'uses' => 'KuponController@update',
			'as' => 'kupon.update'
		]);

		Route::get('kupon/{id}/destroy', [
			'uses' => 'KuponController@destroy',
			'as' => 'kupon.destroy'
		]);



		// Pengaturan
		Route::get('pengaturan', [
			'uses' => 'PengaturanController@index',
			'as' => 'pengaturan.index'
		]);

		Route::post('pengaturan/store', [
			'uses' => 'PengaturanController@store',
			'as' => 'pengaturan.store'
		]);

		Route::post('pengaturan/update/{pengaturan}', [
			'uses' => 'PengaturanController@update',
			'as' => 'pengaturan.update'
		]);
	});
});

// Peserta
Route::group(['middleware' => ['auth','checkRole:Admin,Pengajar,Peserta']], function ()
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
		Route::post('sertifikat', [
			'uses' => 'Peserta\SertifikatController@index',
			'as' => 'peserta.sertifikat'
		]);

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

		// Edit Profil
		Route::get('edit/profil', [
			'uses' => 'PesertaController@editProfil',
			'as' => 'edit.profil'
		]);

		Route::post('update/profil', [
			'uses' => 'PesertaController@updateProfil',
			'as' => 'update.profil'
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

// Download File 
Route::get('download/{module}/file', [
	'uses' => 'ModuleController@download',
	'as' => 'module.download'
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

Route::get('ikuti-pelatihan/{slug}/detail-pembayaran', [
	'uses' => 'SiteController@checkout',
	'as' => 'checkout'
]);

//invoice
Route::post('invoice', [
	'uses' => 'Peserta\InvoiceController@index',
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
