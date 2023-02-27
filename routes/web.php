<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermohonanController;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(PermohonanController::class)->group(function() {
  Route::prefix('/permohonan')->group(function () {
    Route::name('Permohonan.')->group(function() {
      Route::get('/', 'create')->name('form');
      Route::get('/add', 'create')->name('form');
      Route::post('/add', 'store')->name('tambah');
      Route::put('/edit', 'update')->name('edit');
      Route::get('/cek_resi/{no_resi}', 'cekResi')->name('cek_resi');
      Route::get('/cek_resi', 'resi')->name('resi');
    });
  });

});

Route::controller(AdminController::class)->group(function() {
  Route::prefix('/admin')->group(function () {
    Route::name('Admin.')->group(function() {
      Route::get('/', 'index')->name('dashboard');
      Route::get('/dashboard', 'index')->name('dashboard');
      Route::get('/login', 'form')->name('form');
      Route::post('/login', 'login')->name('login');
      Route::get('/logout', 'logout')->name('logout');
      Route::get('/permohonan', 'list')->name('permohonan');
      Route::get('/permohonan/{filter}', 'list')->name('permohonan-list');
      Route::get('/permohonan/{id}', 'detail')->name('permohonan-detail');
      Route::post('/permohonan/{id}/update', 'update')->name('permohonan-update');
    });
  });
});

Route::any('/', function(){
  return '<h1>Maaf, url yang Anda masukkan tidak ditemukan</h1>';
});
