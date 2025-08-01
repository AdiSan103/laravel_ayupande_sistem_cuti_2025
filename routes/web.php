<?php

use App\Http\Controllers\Admin\aDashboard;
use App\Http\Controllers\Employee\eDashboard;
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
// });

// ============ admin ============
// Route::middleware('checkLoginAdmin')->group(function() {

    Route::get('/a',[aDashboard::class,'index']);
// });