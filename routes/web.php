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
use Carbon\Carbon;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/mahasiswa/login','LoginMahasiswaController@index');
Route::post('/mahasiswa/login','LoginMahasiswaController@submit');
Route::get('/dosen/login','LoginDosenController@index');
Route::post('/dosen/login','LoginDosenController@submit');

// Guard Dosen
Route::group(['middleware' => ['auth:dosen']], function () {
    Route::get('jadwal_mengajar','DosenController@jadwal_mengajar');
    Route::get('jadwal_mengajar/json','DosenController@jadwal_mengajar_json');
    Route::post('/kehadiran/update','KehadiranController@update');
    Route::post('kehadiran/{id_jadwal}','KehadiranController@store');
    Route::get('/kehadiran/{id_kehadiran}/absen','KehadiranController@show');
    
    
    Route::get('nilai/{id}','NilaiController@index');
    Route::get('kehadiran/{id_jadwal}/create','KehadiranController@create');
    Route::get('kehadiran/{id_jadwal}','KehadiranController@index');
    
    Route::post('/nilai/update_nilai/update','NilaiController@update_nilai');
});


// Guard Mahasiswa
Route::group(['middleware' => ['auth:mahasiswa']], function () {
    Route::get('/krs/daftarMatakuliahKontrak','KrsController@daftarMatakuliahKontrak');
    Route::get('/krs','KrsController@index');
    Route::get('/krs/tambahKrs','KrsController@tambahKrs');
    Route::get('/krs/tampilKrs','KrsController@tampilKrs');
    Route::post('/krs/hapusKrs','KrsController@hapusKrs');
    Route::get('/krs/selesai','KrsController@selesai');
    Route::get('/khs','KhsController@index');
    Route::get('/khs/pdf','KhsController@KHSpdf');
});

Auth::routes();

// Guard Web
Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/matakuliah/json','MatakuliahController@json');
    Route::get('/dosen/json','DosenController@json');
    Route::get('/fakultas/json','FakultasController@json');
    Route::get('/jurusan/json','JurusanController@json');
    Route::get('/ruangan/json','RuanganController@json');
    Route::get('/mahasiswa/json','MahasiswaController@json');
    Route::get('/tahunakademik/json','TahunakademikController@json');
    Route::get('/dosen/excel','DosenController@exportExcel');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/matakuliah','MatakuliahController');
    Route::resource('/dosen','DosenController');
    Route::resource('/fakultas','FakultasController');
    Route::resource('/jurusan','JurusanController');
    Route::resource('/ruangan','RuanganController');
    Route::resource('/tahunakademik','TahunakademikController');
    Route::resource('/kurikulum','KurikulumController');
    Route::resource('/mahasiswa','MahasiswaController');
    Route::get('/setting','SettingController@index');
    Route::put('/setting','SettingController@update');
    Route::resource('/jadwalkuliah','JadwalkuliahController');
});


Route::get('/tools/sms','ToolsController@sms');
Route::post('/send_sms','ToolsController@send_sms');
Route::post('setting-sms-update','ToolsController@updateSettingSms');

Route::get('/tools/whatapps','ToolsController@whatapps');
Route::post('/kirim-pesan-whatapps','ToolsController@send_whatapps');
Route::post('/update-setting-whatapps','ToolsController@updateSettingWhatapps');




