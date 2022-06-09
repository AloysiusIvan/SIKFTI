<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DetailPengajuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\CetakPengajuanController;
use App\Http\Controllers\KeuanganController;

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
    return view('login');
})->name('login');
Route::post('/postlogin', [LoginController::class,'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::post('/createcoa', [CoaController::class,'store'])->name('createcoa');
Route::post('/updatecoa/{id}', [CoaController::class,'update'])->name('updatecoa');
Route::delete('deletecoa/{id}', [CoaController::class,'delete'])->name('deletecoa');
Route::post('/createpengajuan', [DetailPengajuanController::class,'store'])->name('createpengajuan');
Route::post('/updatepengajuan/{id}', [DetailPengajuanController::class,'update'])->name('updatepengajuan');
Route::delete('deletepengajuan/{id}', [DetailPengajuanController::class,'destroy'])->name('deletepengajuan');
Route::post('aktifpengajuan/{id}', [PengajuanController::class,'aktifkan'])->name('aktifpengajuan');
Route::post('updaterealisasi/{id}', [DetailPengajuanController::class,'realisasi'])->name('updaterealisasi');
Route::post('lunaspengajuan/{id}', [PengajuanController::class,'lunas'])->name('lunaspengajuan');
Route::get('/cetak/{id}', [CetakPengajuanController::class,'cetak'])->name('cetak');
Route::get('/cetakkeuangan', [CetakPengajuanController::class,'cetakkeuangan'])->name('cetakkeuangan');

Route::group(['middleware' => ['admin']], function(){
    Route::get('/dashboardadmin', [DashboardAdminController::class,'index'])->name('dashboardadmin');
    Route::get('/pengajuanadmin', [PengajuanController::class,'indexadmin'])->name('pengajuanadmin');
    Route::get('/pencairandana', [PengajuanController::class,'indexpencairan'])->name('pencairandana');
    Route::get('/laporankeuangan', [KeuanganController::class,'index'])->name('laporankeuangan');
});

Route::group(['middleware' => ['wd2']], function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/coa', [CoaController::class,'index'])->name('coa');
    Route::get('/pengajuan', [PengajuanController::class,'index'])->name('pengajuan');
    Route::get('/addpengajuanpage', [DetailPengajuanController::class,'index'])->name('addpengajuanpage');
    Route::get('/cetakpengajuan', [CetakPengajuanController::class,'index'])->name('cetakpengajuan');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/laporankeuangan', [KeuanganController::class,'index'])->name('laporankeuangan');
});