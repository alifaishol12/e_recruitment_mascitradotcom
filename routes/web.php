<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\IndoRegionController;

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

Route::resource('post', PostController::class);

Route::resource('biodata', BiodataController::class);

Route::resource('pendidikan', PendidikanController::class);

Route::resource('dokumen', DokumenController::class);

// Route::post('biodata', BiodataController::class);

Route::post('/getkabupaten',[BiodataController::class, 'getkabupaten'])->name('getkabupaten');
Route::post('/getkecamatan',[BiodataController::class, 'getkecamatan'])->name('getkecamatan');
Route::post('/getdesa',[BiodataController::class, 'getdesa'])->name('getdesa');


Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
