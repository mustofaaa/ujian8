<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\UserController;
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
    return redirect('blog');
});

Route::get('blog', [PostController::class, 'blog']);
Route::get('detail/{post}', [PostController::class, 'detail'])->name('detail');
Route::resource('rekomendasi', RekomendasiController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

Route::resource('user', UserController::class);
Route::resource('produk', ProdukController::class);
Route::resource('post', PostController::class);
Route::resource('kategori', KategoriController::class);
    
});