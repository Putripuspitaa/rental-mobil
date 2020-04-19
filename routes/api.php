<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get ('/', function(){
    return Auth::user()->level;
})->middleware('jwt.verify');
Route::post('register', 'petugascontroller@register');
Route::post('login', 'petugascontroller@login');
Route::get('petugas', 'petugascontroller@getAuthenticatedUser')->middleware('jwt.verify');

//jenis
Route::post('/simpan_jenis','jenismobilcontroller@store')->middleware('jwt.verify');
Route::put('/ubah_jenis/{id}','jenismobilcontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_jenis/{id}','jenismobilcontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_jenis','jenismobilcontroller@tampil_jenis')->middleware('jwt.verify');
Route::get('jenis',"jenismobilcontroller@index")->middleware('jwt.verify');

//penyewa
Route::post('/simpan_penyewa','penyewacontroller@store')->middleware('jwt.verify');
Route::put('/ubah_penyewa/{id}','penyewacontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_penyewa/{id}','penyewacontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_penyewa','penyewacontroller@tampil_jenis')->middleware('jwt.verify');
Route::get('penyewa',"penyewacontroller@index")->middleware('jwt.verify');

//mobil
Route::post('/simpan_mobil','mobilcontroller@store')->middleware('jwt.verify');
Route::put('/ubah_mobil/{id}','mobilcontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_mobil/{id}','mobilcontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_mobil','mobilcontroller@tampil_jenis')->middleware('jwt.verify');
Route::get('mobil',"mobilcontroller@index")->middleware('jwt.verify');

//peminjaman
Route::post('/simpan_peminjaman','peminjamancontroller@store')->middleware('jwt.verify');
Route::put('/ubah_peminjaman/{id}','peminjamancontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_peminjaman/{id}','peminjamancontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_peminjaman','peminjamancontroller@tampil_jenis')->middleware('jwt.verify');
Route::get('peminjaman',"peminjamancontroller@index")->middleware('jwt.verify');

//peminjaman
Route::post('/simpan_detail','detailcontroller@store')->middleware('jwt.verify');
Route::put('/ubah_detail/{id}','detailcontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_detail/{id}','detailcontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_detail','detailcontroller@tampil_jenis')->middleware('jwt.verify');
Route::get('detail',"detailcontroller@index")->middleware('jwt.verify');

