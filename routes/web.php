<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CategoriController;

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


Route::get('/about', function () {
    return view('about.index');
});


Route::resource('artikel', ArtikelController::class);
Route::resource('categories', CategoriController::class)->middleware('isLogin');
Route::resource('tag', TagController::class)->middleware('isLogin');

//Route::get('/artikel', [ArtikelController::class, 'index']);
//Route::get('/artikel/{id}', [ArtikelController::class, 'detail'])->where('id', '[0-9]+');
//Route::get('/artikel/create', [ArtikelController::class,'create']);
//Route::post('/artikel/store', [ArtikelController::class,'store']);

Route::get('/', [App\Http\Controllers\ArtikelController::class, 'home']);

Auth::routes();
Route::get('/artikel', [App\Http\Controllers\ArtikelController::class, 'index'])->middleware('isLogin');
Route::get('/categories', [App\Http\Controllers\CategoriController::class, 'index'])->middleware('isLogin');
Route::get('/tag', [App\Http\Controllers\TagController::class, 'index'])->middleware('isLogin');
