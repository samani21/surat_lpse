<?php

use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [SuratController::class,'index'])->name('surat_keluar/home');

// Route::get('/surat',[SuratController::class,'index']);

Route::get('surat_masuk/kirim',[SuratController::class,'create'])->name('surat_masuk/kirim');
Route::post('surat_masuk/store',[SuratController::class,'store'])->name('surat_masuk/store');
