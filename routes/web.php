<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InputAspirasiController;
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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('users', 'UserController');

Route::get('/', [FrontendController::class, 'search'])->name('search');

Route::middleware(['auth'])->group(function () {
    Route::resource('penduduk', 'PendudukController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('aspirasi', 'AspirasiController');
    Route::resource('inputaspirasi', 'InputAspirasiController');
    Route::get('aspirasisearch', [AspirasiController::class, 'search'])->name('search');
    Route::get('inputaspirasisearch', [InputAspirasiController::class, 'search'])->name('search');
    // Route::get('/inputaspirasi', 'InputAspirasiController@index');
    // Route::get('/inputaspirasi/action', 'InputAspirasiController@action')->name('inputaspirasi.action');
});

Route::get('/live_search', 'LiveSearchController@index');
Route::get('/live_search/action', 'LiveSearchController@action')->name('live_search.action');
