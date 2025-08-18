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
use App\Http\Controllers\Public\pLogin;
use App\Http\Controllers\Public\pLogout;
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
Route::post('/logout',[pLogout::class, 'index']);

// ============ employee ============
// Route::middleware('checkLoginEmployee')->group(function() {
Route::get('/e',[eDashboard::class, 'index']);
Route::get('/e/permohonan-cuti', [ePermohonanCuti::class, 'index']);
Route::get('/e/rekapitulasi', [eRekapitulasi::class, 'index']);
Route::get('/e/status', [eStatus::class, 'index']);
Route::get('/e/verifikasi', [eVerifikasi::class, 'index']);
Route::get('/e/profile', [eProfile::class, 'index']);
    // });

// ============ admin ============
// Route::middleware('checkLoginAdmin')->group(function() {
Route::get('/a',[aDashboard::class,'index']);
Route::get('/a/manajemen-cuti',[aManajemenCuti::class,'index']);
Route::get('/a/pegawai',[aPegawai::class,'index']);
Route::get('/a/rekapitulasi',[aRekapitulasi::class,'index']);
Route::get('/a/profile',[aProfile::class,'index']);
Route::get('/a/validasi',[aValidasi::class,'index']);
// });