<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;


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
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']); // nyimpen data
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatans', [KecamatanController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatans/{kecamatan:url_kecamatan}/desas', [DesaController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatans/{kecamatan:url_kecamatan}/desas/{desa:url_desa}/apilists', [ApilistController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatans/{kecamatan:url_kecamatan}/desas/{desa:url_desa}/apilists/bloodtypes', [BloodtypesController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatans/{kecamatan:url_kecamatan}/desas/{desa:url_desa}/apilists/pemilih', [PemilihController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatans/{kecamatan:url_kecamatan}/desas/{desa:url_desa}/apilists/sex', [SexController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatans/{kecamatan:url_kecamatan}/desas/{desa:url_desa}/apilists/populations', [PopulationController::class, 'index'])->middleware('auth');
