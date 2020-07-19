<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {

    Route::get('beranda', 'BerandaController@index');

    // MANAGE MAHASISWA

    // GET MAHASISWA
    Route::get('mahasiswa', 'MahasiswaController@index');

    // TAMBAH MAHASISWA
    Route::get('mahasiswa/add', 'MahasiswaController@add');
    Route::post('mahasiswa/add', 'MahasiswaController@store');

    // EDIT MAHASISWA
    Route::get('mahasiswa/{id}', 'MahasiswaController@edit');
    Route::put('mahasiswa/{id}', 'MahasiswaController@update');

    // DELETE MAHASISWA
    Route::delete('mahasiswa/{id}', 'MahasiswaController@delete');

    // MANAGE KANDIDAT

    // GET KANDIDAT
    Route::get('kandidat', 'KandidatController@index');

    Route::get('kandidat/detail/{id}', 'KandidatController@show');

    // TAMBAH KANDIDAT
    Route::get('kandidat/add', 'KandidatController@add');
    Route::post('kandidat/add', 'KandidatController@store');

    // EDIT KANDIDAT
    Route::get('kandidat/{id}', 'KandidatController@edit');
    Route::put('kandidat/{id}', 'KandidatController@update');

    // DELETE KANDIDAT
    Route::delete('kandidat/{id}', 'KandidatController@delete');


    // PEMILIHAN
    Route::get('pemilihan', 'PemilihanController@index');

    Route::get('pemilihan/{id}', 'PemilihanController@store');

    // GET VISI MISI BERDASARKAN KANDIDAT
    Route::get('get_visi_misi_by_kandidat/{id}', 'PemilihanController@get_visi_misi_by_kandidat');

});

Route::get('keluar', function() {
    Auth::logout();

    return redirect('login');
});

Auth::routes();

Route::get('/home', function() {
    return redirect('beranda');
});
