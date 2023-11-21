<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\SiswaController;
use App\Models\Absensi;

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

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/main', function () {
//     return view('main');
// });

// Route::get('/absensi', function () {
//     return view('absensi');
// });

// Route::get('/rekapabsen', function () {
//     return view('rekap');
// });

// Route::get('/tes', function () {
//     return view('tes');
// });

Route::get('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login')->middleware('guest');
Route::view('/', 'main')->middleware('auth');
// Route::view('/rekapabsen', 'rekap')->middleware('auth');
Route::get('/absensi', [AbsensiController::class, 'index'])->middleware('auth');
Route::resource('/absensi', AbsensiController::class)->middleware('auth');
Route::post('/absensi/showByDate', [AbsensiController::class, 'showByDate'])->name('absensi.showByDate');
Route::get('/rekapabsen', [AbsensiController::class, 'rekap'])->middleware('auth');
Route::get('/rekapabsen/showMonthlyReport', [AbsensiController::class, 'showMonthlyReport'])->name('rekap.bulanan')->middleware('auth');
Route::resource('/siswaa', SiswaController::class)->middleware('auth');