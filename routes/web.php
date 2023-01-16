<?php

use App\Http\Controllers\MasterMachineController;
use App\Http\Controllers\MasterOfficeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductVariantController;

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
    Route::get('getOfficeName', [MasterOfficeController::class, 'getOfficeName'])->name('getOfficeName');
    Route::get('getProvince', [MasterOfficeController::class, 'getProvince'])->name('getProvince');
    Route::get('getRegency', [MasterOfficeController::class, 'getRegency'])->name('getRegency');
    Route::get('getDistrict', [MasterOfficeController::class, 'getDistrict'])->name('getDistrict');
    Route::get('getVillage', [MasterOfficeController::class, 'getVillage'])->name('getVillage');
    Route::get('getPostalCode', [MasterOfficeController::class, 'getPostalCode'])->name('getPostalCode');
    Route::post('saveOffice', [MasterOfficeController::class, 'saveOffice'])->name('saveOffice');
    Route::post('updateOfficeStatus', [MasterOfficeController::class, 'updateOfficeStatus'])->name('updateOfficeStatus');
    Route::get('detailOffice', [MasterOfficeController::class, 'detailOffice'])->name('detailOffice');
    Route::post('updateOffice', [MasterOfficeController::class, 'updateOffice'])->name('updateOffice');
    // End master Office

    // Master Machine
    Route::get('masterMachine', [MasterMachineController::class, 'index'])->name('masterMachine');
    Route::get('getMachine', [MasterMachineController::class, 'getMachine'])->name('getMachine');
    Route::post('addMachine', [MasterMachineController::class, 'addMachine'])->name('addMachine');
    Route::get('detailMachine', [MasterMachineController::class, 'detailMachine'])->name('detailMachine');
    Route::post('updateMachine', [MasterMachineController::class, 'updateMachine'])->name('updateMachine');
    Route::get('deleteMachine', [MasterMachineController::class, 'deleteMachine'])->name('deleteMachine');
    // Emd Master MMachine
    // Product Type
    Route::get('productType', [ProductTypeController::class, 'index'])->name('productType');
    Route::get('getProductType', [ProductTypeController::class, 'getProductType'])->name('getProductType');
    Route::post('addProductType', [ProductTypeController::class, 'addProductType'])->name('addProductType');
    Route::get('detailProductType', [ProductTypeController::class, 'detailProductType'])->name('detailProductType');
    Route::post('updateProductType', [ProductTypeController::class, 'updateProductType'])->name('updateProductType');
    Route::get('deleteProductType', [ProductTypeController::class, 'deleteProductType'])->name('deleteProductType');
    // EndProduct Type
    
    // Product Variant
    Route::get('productVariant', [ProductVariantController::class, 'index'])->name('productVariant');
    Route::get('getProductVariant', [ProductVariantController::class, 'getProductVariant'])->name('getProductVariant');
    Route::post('addProductVariant', [ProductVariantController::class, 'addProductVariant'])->name('addProductVariant');
    Route::get('detailProductVariant', [ProductVariantController::class, 'detailProductVariant'])->name('detailProductVariant');
    Route::post('updateProductVariant', [ProductVariantController::class, 'updateProductVariant'])->name('updateProductVariant');
    Route::get('deleteProductVariant', [ProductVariantController::class, 'deleteProductVariant'])->name('deleteProductVariant');
    // End Product Variant

});
