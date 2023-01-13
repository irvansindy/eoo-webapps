<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Helpers\ResponseFormatter;

class ProductController extends Controller
{
    public function index() {
        $products = Product::limit(10)->get();
        return ResponseFormatter::success(
            $products,
            'product data successfully fetched'
        );
    }

    public function createProduct() {
        return view('product.createProduct');
    }

    public function storeProduct(Product $Product, StoreProductRequest $StoreProductRequest) {
        try {
            $Product->create($StoreProductRequest->validated());

            return ResponseFormatter::success(
                $Product,
                'product data successfully added'
            );
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'product data failed to add',
                422
            );
        }
    }

    public function showProduct(Product $Product) {
        return ResponseFormatter::success(
            $Product,
            'product data successfully fetched'
        );
    }

    public function editProduct(Product $Product) {
        return ResponseFormatter::success(
            $Product,
            'product data successfully fetched'
        );
    }

    public function updateProduct(Product $Product, UpdateProductRequest $UpdateProductRequest) {
        try {
            $Product->update($UpdateProductRequest->validated());

            return ResponseFormatter::success(
                $Product,
                'product data successfully updated'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::success(
                $th,
                'product data failed to update',
                422
            );
        }
    }

    public function deleteProduct(Product $Product) {
        try {
            $Product->delete();

            return ResponseFormatter::success(
                $Product,
                'product data successfully deleted'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::success(
                $th,
                'product data failed to delete',
                422
            );
        }
    }
}
