<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\SuratTugasController;

Route::get('/', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard'
    ]);
})->middleware('auth');

Route::get('/user', function () {
    return view('user.index', [
        'title' => 'Data User'
    ]);
})->middleware('auth');



Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::resource('/dosen', DosenController::class)->middleware('auth');
Route::resource('/surattugas', SuratTugasController::class)->middleware('auth');


Route::resource('/publikasi', PublikasiController::class)->middleware('auth');

Route::post('surattugas/import', [SuratTugasController::class, 'ImportExcelData']);
