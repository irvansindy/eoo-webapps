<?php

use App\Http\Controllers\DieHeadController;
use App\Http\Controllers\MasterMachineController;
use App\Http\Controllers\MasterOfficeController;
use App\Http\Controllers\OeeController;
use App\Http\Controllers\ProductClassController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLengthController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\ProductDiameterController;
use App\Http\Controllers\OeeDefectController;
use App\Http\Controllers\SocketController;
use App\Http\Controllers\SubClassController;
use App\Http\Controllers\ReportOeeController;

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
    Route::get('getMasterProduct', [ProductController::class, 'getMasterProduct'])->name('getMasterProduct');
    Route::get('getProductName', [ProductController::class, 'getProductName'])->name('getProductName');
    Route::get('getProductWeight', [ProductController::class, 'getProductWeight'])->name('getProductWeight');
    Route::get('editProduct', [ProductController::class, 'editProduct'])->name('editProduct');
    Route::get('deleteProduct', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    Route::post('storeProduct', [ProductController::class, 'storeProduct'])->name('storeProduct');
    Route::post('updateProduct', [ProductController::class, 'updateProduct'])->name('updateProduct');
    // end Product

    // product Diameter
    Route::get('productDiameter', [ProductDiameterController::class, 'index'])->name('productDiameter');
    Route::get('getProductDiameter', [ProductDiameterController::class, 'getProductDiameter'])->name('getProductDiameter');
    Route::get('getProductDiameterName', [ProductDiameterController::class, 'getProductDiameterName'])->name('getProductDiameterName');
    Route::get('editProductDiameter', [ProductDiameterController::class, 'editProductDiameter'])->name('editProductDiameter');
    Route::get('deleteProductDiameter', [ProductDiameterController::class, 'deleteProductDiameter'])->name('deleteProductDiameter');
    Route::post('storeProductDiameter', [ProductDiameterController::class, 'storeProductDiameter'])->name('storeProductDiameter');
    Route::post('updateProductDiameter', [ProductDiameterController::class, 'updateProductDiameter'])->name('updateProductDiameter');
    // end product Diameter

    // oee Defect
    Route::get('oeeDefect', [OeeDefectController::class, 'index'])->name('oeeDefect');
    Route::get('getOeeDefect', [OeeDefectController::class, 'getOeeDefect'])->name('getOeeDefect');
    Route::get('editOeeDefect', [OeeDefectController::class, 'editOeeDefect'])->name('editOeeDefect');
    Route::get('deleteOeeDefect', [OeeDefectController::class, 'deleteOeeDefect'])->name('deleteOeeDefect');
    Route::post('storeOeeDefect', [OeeDefectController::class, 'storeOeeDefect'])->name('storeOeeDefect');
    Route::post('updateOeeDefect', [OeeDefectController::class, 'updateOeeDefect'])->name('updateOeeDefect');
    // end oee Defect

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
    Route::get('getMachineName', [MasterMachineController::class, 'getMachineName'])->name('getMachineName');
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
    Route::get('getProductVariantName', [ProductVariantController::class, 'getProductVariantName'])->name('getProductVariantName');
    Route::post('addProductVariant', [ProductVariantController::class, 'addProductVariant'])->name('addProductVariant');
    Route::get('detailProductVariant', [ProductVariantController::class, 'detailProductVariant'])->name('detailProductVariant');
    Route::post('updateProductVariant', [ProductVariantController::class, 'updateProductVariant'])->name('updateProductVariant');
    Route::get('deleteProductVariant', [ProductVariantController::class, 'deleteProductVariant'])->name('deleteProductVariant');
    // End Product Variant
    
    // Product Class
    Route::get('productClass', [ProductClassController::class, 'index'])->name('productClass');
    Route::get('getProductClass', [ProductClassController::class, 'getProductClass'])->name('getProductClass');
    Route::post('addProductClass', [ProductClassController::class, 'addProductClass'])->name('addProductClass');
    Route::get('detailProductClass', [ProductClassController::class, 'detailProductClass'])->name('detailProductClass');
    Route::post('updateProductClass', [ProductClassController::class, 'updateProductClass'])->name('updateProductClass');
    Route::get('deleteProductClass', [ProductClassController::class, 'deleteProductClass'])->name('deleteProductClass');
    
    // End Product Class
    // SubClass
    Route::get('subClass', [SubClassController::class, 'index'])->name('subClass');
    Route::get('getSubClass', [SubClassController::class, 'getSubClass'])->name('getSubClass');
    Route::post('addSubClass', [SubClassController::class, 'addSubClass'])->name('addSubClass');
    Route::get('detailSubClass', [SubClassController::class, 'detailSubClass'])->name('detailSubClass');
    Route::post('updateSubClass', [SubClassController::class, 'updateSubClass'])->name('updateSubClass');
    Route::get('deleteSubClass', [SubClassController::class, 'deleteSubClass'])->name('deleteSubClass');
    // End SubClass

    // Socket
    Route::get('socket', [SocketController::class, 'index'])->name('socket');
    Route::get('getSocket', [SocketController::class, 'getSocket'])->name('getSocket');
    Route::post('addSocket', [SocketController::class, 'addSocket'])->name('addSocket');
    Route::get('detailSocket', [SocketController::class, 'detailSocket'])->name('detailSocket');
    Route::post('updateSocket', [SocketController::class, 'updateSocket'])->name('updateSocket');
    Route::get('deleteSocket', [SocketController::class, 'deleteSocket'])->name('deleteSocket');
    // End Socket

    // Product Lengtth
    Route::get('productLength', [ProductLengthController::class, 'index'])->name('productLength');
    Route::get('getProductLength', [ProductLengthController::class, 'getProductLength'])->name('getProductLength');
    Route::get('getProductLengthName', [ProductLengthController::class, 'getProductLengthName'])->name('getProductLengthName');
    Route::post('addProductLength', [ProductLengthController::class, 'addProductLength'])->name('addProductLength');
    Route::get('detailProductLength', [ProductLengthController::class, 'detailProductLength'])->name('detailProductLength');
    Route::post('updateProductLength', [ProductLengthController::class, 'updateProductLength'])->name('updateProductLength');
    Route::get('deleteProductLength', [ProductLengthController::class, 'deleteProductLength'])->name('deleteProductLength');
    // End Product Length
    
    // Die Head
    
    Route::get('dieHead', [DieHeadController::class, 'index'])->name('dieHead');
    Route::get('getDieHead', [DieHeadController::class, 'getDieHead'])->name('getDieHead');
    Route::post('addDieHead', [DieHeadController::class, 'addDieHead'])->name('addDieHead');
    Route::get('detailDieHead', [DieHeadController::class, 'detailDieHead'])->name('detailDieHead');
    Route::post('updateDieHead', [DieHeadController::class, 'updateDieHead'])->name('updateDieHead');
    Route::get('deleteDieHead', [DieHeadController::class, 'deleteDieHead'])->name('deleteDieHead');

    // End Die Head
    // OEE
    Route::get('oee', [OeeController::class, 'index'])->name('oee');
    Route::get('getOee', [OeeController::class, 'getOee'])->name('getOee');
    Route::get('getOeeShift', [OeeController::class, 'getOeeShift'])->name('getOeeShift');
    Route::post('addOee', [OeeController::class, 'addOee'])->name('addOee');
    Route::post('addOeeDetail', [OeeController::class, 'addOeeDetail'])->name('addOeeDetail');
    Route::get('getOeeDetailProgress', [OeeController::class, 'getOeeDetailProgress'])->name('getOeeDetailProgress');

    // End OEE
    // Report OEE
    Route::get('getReportOee', [ReportOeeController::class, 'getReportOee'])->name('getReportOee');
    Route::get('fetchReportOee', [ReportOeeController::class, 'fetchReportOee'])->name('fetchReportOee');
});
