<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductLengthSize;
use App\Http\Requests\StoreProductLengthRequest;
use App\Http\Requests\UpdateProductLengthRequest;
use App\Helpers\ResponseFormatter;

class ProductLengthController extends Controller
{
    public function index() {
        try {
            $ProductLengths = ProductLengthSize::limit(10)->get();
    
            return ResponseFormatter::success(
                $ProductLengths,
                'Product length data successfully fetched'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product length data failed to fetch',
                404
            );
        }
    }

    public function createProductLength() {
        return view('productLength.createproductLength');
    }

    public function storeProductLength(ProductLengthSize $ProductLengthSize, StoreProductLengthRequest $StoreProductLengthRequest) {
        try {
            $ProductLengthSize->create($StoreProductLengthRequest->validated());

            return ResponseFormatter::success(
                $ProductLengthSize,
                'Product length data successfully added'
            );
        } catch (\Throwable $th) {
            // return ResponseFormatter::error([
            //     'message' => 'Product length data failed to fetch',
            //     'error' => $th
            // ],                
            //     404
            // );
            return ResponseFormatter::error(
                $th,
                'Product length data failed to add',
                422
            );
        }
    }

    public function showProductLength(ProductLengthSize $ProductLengthSize) {
        return ResponseFormatter::success(
            $ProductLengthSize,
            'Product length data successfully fetched'
        );
    }
    
    public function editProductLength(ProductLengthSize $ProductLengthSize) {
        return ResponseFormatter::success(
            $ProductLengthSize,
            'Product length data successfully fetched'
        );
    }

    public function updateProductLength(ProductLengthSize $ProductLengthSize, UpdateProductLengthRequest $UpdateProductLengthRequest) {
        try {
            $ProductLengthSize->update($UpdateProductLengthRequest->validated());

            return ResponseFormatter::success(
                $ProductLengthSize,
                'Product length data successfully updated'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product length data failed to update',
                422
            );
        }
    }

    public function deleteProductLength(ProductLengthSize $ProductLengthSize) {
        try {
            $ProductLengthSize->delete();

            return ResponseFormatter::success(
                $ProductLengthSize,
                'Product length data successfully deleted'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product length data failed to delete',
                422
            );
        }
    }
}
