<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PetugasController;
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
//     return view('welcome');
// });
Route::get('/', [PengaduanController::class, 'landing']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/dashboard', [HomeController::class, 'index']);
Route::get('/pengaduan-masyarakat', [PengaduanController::class, 'pengaduanMasyarakat']);
Route::get('/form-pengaduan', [PengaduanController::class, 'formPengaduan']);
Route::post('/input-pengaduan', [PengaduanController::class, 'inputPengaduan']);

Route::post('/pengaduan/proses/{id}', [PengaduanController::class, 'prosesPengaduan']);
Route::post('/pengaduan/selesai/{id}', [PengaduanController::class, 'selesaiPengaduan']);

Route::resource('pengaduan', PengaduanController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('petugas', PetugasController::class);