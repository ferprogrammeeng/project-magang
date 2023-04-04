<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermohonanController;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(PermohonanController::class)
->prefix('permohonan')->name('Permohonan.')
->group(function() {
  Route::view('', 'permohonan.form')->name('form');
  Route::view('add', 'permohonan.form')->name('form');
  Route::post('add', 'store')->name('tambah');
  Route::put('edit', 'update')->name('edit');
  Route::get('cek_resi/{no_resi}', 'cekResi')->name('cek_resi');
  Route::view('cek_resi', 'permohonan.resi')->name('resi');
});

Route::controller(AdminController::class)
->prefix('admin')->name('Admin.')
->middleware('auth')
->group(function() {
  Route::get('', 'index')->name('dashboard');
  Route::get('dashboard', 'index')->name('dashboard');
  Route::get('login', 'form')->name('form');
  Route::post('login', 'login')->name('login');
  Route::get('logout', 'logout')->name('logout');

  Route::prefix('permohonan')->name('permohonan')
  ->group(function() {
    Route::get('', 'list');
    Route::get('{filter}', 'list')->name('-list');
    Route::get('{id}', 'detail')->name('-detail');
    Route::post('{id}/update', 'update')->name('-update');
  });
});

Route::any('/', function(){
  return '<h1>Maaf, url yang Anda masukkan tidak ditemukan</h1>';
});
