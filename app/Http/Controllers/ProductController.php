<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Machine;
use App\Models\ProductType;
use App\Models\ProductDiameterSize;
use App\Models\ProductLengthSize;
use App\Models\ProductVariant;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponseFormatter;

class ProductController extends Controller
{
    public function index() {
        return view('masterProduct.masterProduct-index');
    }

    public function getMasterProduct() {
        try {
            $Product = Product::limit(100)->get();
            return ResponseFormatter::success(
                // ['data' => $Product],
                $Product,
                'product data successfully fetched'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product data failed to fetch',
                422
            );
        }
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

    public function editProduct(Request $request) {
        try {
            $Product = DB::table('products')->select(
                'products.*',
                'machines.machineName',
                'product_types.productType',
                'product_diameter_sizes.productDiameter',
                'product_length_sizes.productLength',
                'product_variants.productVariant'
                // DB::raw('CONCAT(productDiameter, " ", productDiameterUnit) AS name'),
            )->leftJoin('machines', 'machines.id', '=', 'products.machineId')
            ->leftJoin('product_types', 'product_types.id', '=', 'products.productTypeId')
            ->leftJoin('product_diameter_sizes', 'product_diameter_sizes.id', '=', 'products.productDiameterId')
            ->leftJoin('product_length_sizes', 'product_length_sizes.id', '=', 'products.productLengthId')
            ->leftJoin('product_variants', 'product_variants.id', '=', 'products.productVariantId')
            ->where('products.id', $request->id)->first();
            return ResponseFormatter::success(
                $Product,
                'product data successfully fetched'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::success(
                $th,
                'product data failed to fetch',
                422
            );
        }
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
