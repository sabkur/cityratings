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

Route::get('/temp', function () {
    return view('template');
});

Route::get('/login', function () {
    return view('profile/login');
})->name('login')->middleware('guest');

Route::post('/beranda/login', 'KotaController@login')->middleware('guest');
Route::get('/beranda/logout', 'KotaController@logout')->middleware('auth');

// Beranda
Route::get('/beranda', 'KotaController@beranda')->name('beranda')->middleware('auth');

// Profilr
Route::get('/edit_profile', 'AdminController@edit_profile');
Route::put('/edit_profile/{id}', 'AdminController@simpan_profile');

// Manajemen Data
Route::get('/data_kota', 'KotaController@data_kota');
Route::post('/tambah_kota/import', 'KotaController@import_data_kota');
Route::get('/data_investasi', 'InvestasiController@data_investasi');
Route::get('/data_infrastruktur', 'InfrastrukturController@data_infrastruktur');
Route::get('/data_pariwisata', 'PariwisataController@data_pariwisata');
Route::get('/data_pelayanan_publik', 'PelayananPublikController@data_pelayanan_publik');

// Manajemen Bobot Kriteria
Route::get('/manajemen_bobot', 'BobotController@index');
Route::get('/manajemen_bobot_investasi', 'BobotController@indexInvestasi');
Route::get('/manajemen_bobot_infrastruktur', 'BobotController@indexInfrastruktur');
Route::put('/update_bobot_kriteria/simpan', 'BobotController@updateBobot');
Route::put('/update_bobot_kriteria_investasi/simpan', 'BobotController@updateBobotInvestasi');
Route::put('/update_bobot_kriteria_infrastruktur/simpan', 'BobotController@updateBobotInfrastruktur');

// Generate Index
Route::get('/hitung_indeks/{table_name}', 'TopsisController@hitung_indeks');


