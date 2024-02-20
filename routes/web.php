<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InputAspirasiController;
use App\Http\Controllers\AspirasiController;
use App\Models\Aspirasi;
use App\Models\InputAspirasi;
use App\Models\Kategori;

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
    return view('welcome');
})->name('welcome');

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('siswa', SiswaController::class)->middleware('auth');
Route::resource('siswa', SiswaController::class)->middleware('auth');
Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('aspirasi', AspirasiController::class)->middleware('auth');
Route::resource('inputaspirasi', InputAspirasiController::class);
Route::get('/search',[InputAspirasiController::class,'search'])->name('inputaspirasi.search');
Route::get('/profil',[InputAspirasiController::class,'profil'])->name('profil');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::get('/laporan',[ InputAspirasiController::class,'laporan'])->name('laporan');
route::get('/laporan/cetak', [InputAspirasiController::class,'pdf']);
