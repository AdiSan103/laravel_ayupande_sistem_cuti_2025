<?php

use App\Http\Controllers\Admin\aDashboard;
use App\Http\Controllers\Admin\aManajemenCuti;
use App\Http\Controllers\Admin\aPegawai;
use App\Http\Controllers\Admin\aProfile;
use App\Http\Controllers\Admin\aRekapitulasi;
use App\Http\Controllers\Admin\aValidasi;
use App\Http\Controllers\Employee\eDashboard;
use App\Http\Controllers\Employee\ePermohonanCuti;
use App\Http\Controllers\Employee\eProfile;
use App\Http\Controllers\Employee\eRekapitulasi;
use App\Http\Controllers\Employee\eStatus;
use App\Http\Controllers\Employee\eVerifikasi;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\Public\pLogin;
use App\Http\Controllers\Public\pLogout;
use App\Http\Controllers\Public\pRegister;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/p/login');
});

// ============ public ============
Route::get('/p/login', [pLogin::class,'index']);
Route::post('/p/login/post', [pLogin::class,'login']);
// Route::get('/p/register', [pRegister::class,'index']);
// Route::post('/p/register/post', [pRegister::class,'register']);
Route::post('/logout',[pLogout::class, 'index']);

// 
Route::get('/surat/preview/{id}', [LetterController::class, 'preview'])->name('surat.preview'); // lihat HTML
Route::get('/surat/download/{id}', [LetterController::class, 'download'])->name('surat.download'); // download PDF

// ============ employee ============
Route::middleware('checkLoginEmployee')->group(function() {
    Route::get('/e',[eDashboard::class, 'index']);
    Route::get('/e/permohonan-cuti', [ePermohonanCuti::class, 'index']);
    Route::post('/e/permohonan-cuti/save', [ePermohonanCuti::class, 'save']);
    Route::get('/e/rekapitulasi', [eRekapitulasi::class, 'index']); // sementara di hidden karena minimalisir fitur
    Route::get('/e/status', [eStatus::class, 'index']);
    Route::get('/e/verifikasi', [eVerifikasi::class, 'index']);
    Route::get('/e/verifikasi/{id}', [eVerifikasi::class, 'detail']);
    Route::post('/e/verifikasi/{id}/save', [eVerifikasi::class, 'save']);
    Route::get('/e/profile', [eProfile::class, 'index']);
    Route::post('/e/profile/save', [eProfile::class, 'save']);
});

// ============ admin ============
Route::middleware('checkLoginAdmin')->group(function() {
    Route::get('/a',[aDashboard::class,'index']);
    Route::get('/a/manajemen-cuti',[aManajemenCuti::class,'index']);
    Route::get('/a/pegawai',[aPegawai::class,'index']);
    Route::get('/a/pegawai/register', [aPegawai::class,'createform']);
    Route::post('/a/pegawai/register/post', [aPegawai::class,'created']);
    Route::get('/a/pegawai/{id}',[aPegawai::class,'detail']);
    Route::post('/a/pegawai/{id}/updated',[aPegawai::class,'updated']);
    Route::get('/a/rekapitulasi',[aRekapitulasi::class,'index']);
    Route::get('/a/rekapitulasi/{id}',[aRekapitulasi::class,'detail']);
    Route::get('/a/profile',[aProfile::class,'index']);
    Route::post('/a/profile/save',[aProfile::class,'save']);
    Route::get('/a/validasi',[aValidasi::class,'index']);
    Route::get('/a/validasi/{id}',[aValidasi::class,'detail']);
    Route::post('/a/validasi/{id}/updated',[aValidasi::class,'updated']);
});