<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDiameterSize;
use App\Http\Requests\StoreProductDiameterRequest;
use App\Http\Requests\UpdateProductDiameterRequest;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponseFormatter;

class ProductDiameterController extends Controller
{
    public function index() {
        // $productDiameters = ProductDiameterSize::limit(10)->get();
        // return ResponseFormatter::success(
        //     $productDiameters,
        //     'Product diameter data successfully fetched'
        // );
        return view('productDiameter.productDiameter-index');
    }

    public function getProductDiameter() {
        $productDiameters = ProductDiameterSize::all();
        return ResponseFormatter::success(
            $productDiameters,
            'Product diameter data successfully fetched'
        );
    }

    public function getProductDiameterName()
    {
        $data = ProductDiameterSize::select(DB::raw('CONCAT(productDiameter, " ", productDiameterUnit) AS name'),'id')->get();
        return response()->json([
            'data'=>$data,
        ]);
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
    
    public function editProductDiameter(Request $request) {
        $ProductDiameterSize = ProductDiameterSize::findOrFail($request->id);
        return ResponseFormatter::success(
            $ProductDiameterSize,
            'Product diameter data successfully fetched'
        );
    }

    public function updateProductDiameter(Request $request, UpdateProductDiameterRequest $UpdateProductDiameterRequest) {
        try {
            $UpdateProductDiameterRequest->validated();
            $ProductDiameterSize = ProductDiameterSize::findOrFail($request->id);
            $ProductDiameterSize->update([
                'productDiameter' => $request->updateProductDiameter,
                'productDiameterUnit' => $request->updateProductDiameterUnit
            ]);
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

    public function deleteProductDiameter(Request $request) {
        try {
            $ProductDiameterSize = ProductDiameterSize::findOrFail($request->id)->delete();
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
