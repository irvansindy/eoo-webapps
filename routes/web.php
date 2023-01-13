<?php

use App\Http\Controllers\MasterOfficeController;
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
    // Product
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('createProduct', [ProductController::class, 'createProduct'])->name('createProduct');
    Route::post('storeProduct', [ProductController::class, 'storeProduct'])->name('storeProduct');
    Route::get('showProduct', [ProductController::class, 'showProduct'])->name('showProduct');
    Route::get('editProduct', [ProductController::class, 'editProduct'])->name('editProduct');
    Route::post('updateProduct', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::post('deleteProduct', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    // End Product
    // MasterOffice
    Route::get('masterOffice', [MasterOfficeController::class, 'index'])->name('masterOffice');
    Route::get('getOffice', [MasterOfficeController::class, 'getOffice'])->name('getOffice');
    Route::get('getProvince', [MasterOfficeController::class, 'getProvince'])->name('getProvince');
    Route::get('getRegency', [MasterOfficeController::class, 'getRegency'])->name('getRegency');
    Route::get('getDistrict', [MasterOfficeController::class, 'getDistrict'])->name('getDistrict');
    Route::get('getVillage', [MasterOfficeController::class, 'getVillage'])->name('getVillage');
    Route::get('getPostalCode', [MasterOfficeController::class, 'getPostalCode'])->name('getPostalCode');
    Route::post('saveOffice', [MasterOfficeController::class, 'saveOffice'])->name('saveOffice');
    Route::post('updateOfficeStatus', [MasterOfficeController::class, 'updateOfficeStatus'])->name('updateOfficeStatus');
    // End master Office
});
