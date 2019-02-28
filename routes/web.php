<?php

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

Route::get('/jadwal-baru', 'InputScheduluController@index');

Route::get('/', 'IndexController@index');

Route::POST('/displayForm', 'InputScheduluController@displayForm');
Route::POST('/displayFormKhusus', 'InputScheduluController@displayFormKhusus');
Route::GET('/save-jadwal', 'InputScheduluController@storeJadwal');
Route::GET('/jadwal-lihat', 'ViewScheduleController@index');
Route::POST('/jadwal-cari', 'ViewScheduleController@cariJadwal');
Route::GET('/jadwal/{date}', 'IndexController@getJadwalByDate');
Route::GET('/jadwal-khusus', 'InputScheduluController@indexKhusus');

Route::GET('/tutor-baru', 'InputTutorController@index')->name('tutor-baru');
Route::POST('/tutor-baruu', 'InputTutorController@save');
Route::DELETE('/tutor-hapus/{id}','ViewTutorController@delete');
Route::GET('/tutor-lihat', 'ViewTutorController@index');
Route::GET('/tutor-get', 'ViewTutorController@getTutors');

Route::GET('/jadwal-tutor/{id}','ViewTutorController@getJadwal');
Route::GET('/jadwal-tutor/{id}/minggu/{date}','ViewTutorController@getJadwalWeekly');

Route::GET('/mapel-baru', 'InputMapelController@index')->name('mapel-baru');
Route::POST('/mapel-baru', 'InputMapelController@save');
Route::GET('/mapel-lihat', 'ViewMapelController@index');
Route::GET('/jadwal-mapel/{id}','ViewMapelController@getJadwalMapel');
Route::DELETE('mapel-hapus/{id}', 'ViewMapelController@delete');

Route::GET('/kelas-baru', 'InputKelasController@index')->name('kelas-baru');
Route::POST('/kelas-baru', 'InputKelasController@save');
Route::GET('/kelas-lihat', 'ViewKelasController@index');
Route::DELETE('kelas-hapus/{id}', 'ViewKelasController@delete');

Route::GET('/jadwal-kelas/{id}','ViewKelasController@getJadwalKelas');
Route::DELETE('/jadwal-hapus/{id}','ViewScheduleController@delete');
Route::GET('/jadwal-get/{tanggal}', 'ViewScheduleController@getJadwal');

Route::GET('/jadwal-edit/{id}', 'EditScheduleController@index');
Route::POST('/jadwal-edit/{id}', 'EditScheduleController@save');
Route::POST('/pencarian', 'PencarianController@index');

Route::GET('/murid-baru-smp', 'MuridBaruController@indexSMP');
Route::GET('/murid-baru-sma', 'MuridBaruController@indexSMA');
Route::GET('/murid-baru-smk', 'MuridBaruController@indexSMK');
Route::POST('/murid-baru', 'MuridBaruController@store');

Route::GET('/murid-lihat-smp', 'ViewSiswaController@indexSMP');
Route::GET('/murid-lihat-sma', 'ViewSiswaController@indexSMA');
Route::GET('/murid-lihat-smk', 'ViewSiswaController@indexSMK');

Route::GET('/murid-profil/{id}', 'ProfilController@index');
Route::GET('/pembayaran', 'PembayaranController@index');
Route::GET('/pembayaran-sejarah', 'PaymentHistoryController@index');
Route::POST('/pembayaran-cari', 'PaymentHistoryController@cari');
Route::POST('/pembayaran-murid-cari', 'PembayaranController@cari');

Route::GET('/bayar/{id}', 'BayarController@index');
Route::POST('/bayar/{id}', 'BayarController@bayar');
