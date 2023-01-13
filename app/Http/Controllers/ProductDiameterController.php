<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDiameterSize;
use App\Http\Requests\StoreProductDiameterRequest;
use App\Http\Requests\UpdateProductDiameterRequest;
use App\Helpers\ResponseFormatter;

class ProductDiameterController extends Controller
{
    public function index() {
        $productDiameters = ProductDiameterSize::limit(10)->get();
        return ResponseFormatter::success(
            $productDiameters,
            'Product diameter data successfully fetched'
        );
    }

    public function createProductDiameter() {
        return view('productDiameter.createProductDiameter');
    }

    public function storeProductDiameter(ProductDiameterSize $ProductDiameterSize, StoreProductDiameterRequest $StoreProductDiameterRequest) {
        try {
            $ProductDiameterSize->create($StoreProductDiameterRequest->validated());

            return ResponseFormatter::success(
                $ProductDiameterSize,
                'Product diameter data successfully added'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product diameter data failed to add',
                422
            );
        }
    }
    
    // ProductDiameter
    public function showProductDiameter(ProductDiameterSize $ProductDiameterSize) {
        return ResponseFormatter::success(
            $ProductDiameterSize,
            'Product diameter data successfully fetched'
        );
    }
    
    public function editProductDiameter(ProductDiameterSize $ProductDiameterSize) {
        return ResponseFormatter::success(
            $ProductDiameterSize,
            'Product diameter data successfully fetched'
        );
    }

    public function updateProductDiameter(ProductDiameterSize $ProductDiameterSize, UpdateProductDiameterRequest $UpdateProductDiameterRequest) {
        try {
            $ProductDiameterSize->update($UpdateProductDiameterRequest->validated());

            return ResponseFormatter::success(
                $ProductDiameterSize,
                'Product diameter data successfully updated'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product diameter data failed to update',
                422
            );
        }
    }

    public function deleteProductDiameter(ProductDiameterSize $ProductDiameterSize) {
        try {
            $ProductDiameterSize->delete();

            return ResponseFormatter::success(
                $ProductDiameterSize,
                'Product diameter data successfully deleted'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product diameter data failed to delete',
                422
            );
        }
    }
}
