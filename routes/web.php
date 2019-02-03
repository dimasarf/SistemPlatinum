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

Route::get('/jadwal-baru', function () {
    return view('InputSchedule');
});
Route::POST('/displayForm', 'InputScheduluController@displayForm');
Route::GET('/save-jadwal', 'InputScheduluController@storeJadwal');
Route::GET('/jadwal-lihat', 'ViewScheduleController@index');
Route::POST('/jadwal-cari', 'ViewScheduleController@cariJadwal');
Route::GET('/tutor-baru', 'InputTutorController@index')->name('tutor-baru');
Route::POST('/tutor-baruu', 'InputTutorController@save');
Route::GET('/tutor-lihat', 'ViewTutorController@index');
Route::GET('/jadwal-tutor/{id}','ViewTutorController@getJadwal');
Route::GET('/mapel-baru', 'InputMapelController@index')->name('mapel-baru');
Route::POST('/mapel-baru', 'InputMapelController@save');
Route::GET('/mapel-lihat', 'ViewMapelController@index');
Route::GET('/jadwal-mapel/{id}','ViewMapelController@getJadwalMapel');
Route::GET('/kelas-baru', 'InputKelasController@index')->name('kelas-baru');
Route::POST('/kelas-baru', 'InputKelasController@save');
Route::GET('/kelas-lihat', 'ViewKelasController@index');
Route::GET('/jadwal-kelas/{id}','ViewKelasController@getJadwalKelas');