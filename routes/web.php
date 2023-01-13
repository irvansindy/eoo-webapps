<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('createProduct', [ProductController::class, 'createProduct'])->name('createProduct');
    Route::post('storeProduct', [ProductController::class, 'storeProduct'])->name('storeProduct');
    Route::get('showProduct', [ProductController::class, 'showProduct'])->name('showProduct');
    Route::get('editProduct', [ProductController::class, 'editProduct'])->name('editProduct');
    Route::post('updateProduct', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::post('deleteProduct', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
});
