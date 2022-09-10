<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

// Registrasi
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// Login
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
// Kelola Kupon
Route::resource('/kelola', KelolaController::class)->middleware('auth');
// Tambah Data Pelanggam
Route::get('/tambah', [PointController::class, 'create'])->middleware('auth');
Route::post('/tambah', [PointController::class, 'store'])->middleware('auth');
