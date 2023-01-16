<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductVariantRequest;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\UpdateProductVariantRequest;

class ProductVariantController extends Controller
{
    public function index()
    {
        return view('productVariant.productVariant-index');
    }
    public function getProductVariant()
    {
        $data = ProductVariant::all();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function addProductVariant(ProductVariant $ProductVariant, StoreProductVariantRequest $StoreProductVariantRequest) {
        try {
            $ProductVariant->create($StoreProductVariantRequest->validated());
            return ResponseFormatter::success(
                $ProductVariant,
                'Product type successfully added'
            );
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product type failed to add',
                500
            );
        }
    }
    public function detailProductVariant(Request $request)
    {
        $detail = ProductVariant::find($request->id);
        return response()->json([
            'detail'=>$detail,
        ]);
    }
    public function updateProductVariant(Request $request, UpdateProductVariantRequest $UpdateProductVariantRequest) {
        try {
            $UpdateProductVariantRequest->validated();
            $post =[
                'productVariant'=>$request->productVariantUpdate
            ];
            ProductVariant::find($request->id)->update($post);
            return ResponseFormatter::success(
                $post,
                'Product variant successfully added'
            );
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product variant failed to add',
                500
            );
        }
    }
    public function deleteProductVariant(Request $request)
    {
        $status =500;
        $message ='Product type failed to delete';
        $delete = ProductVariant::find($request->id)->delete();
        if($delete){
            $status=200;
            $message ='Product type successfully deleted';
        }
        return response()->json([
            'status'=>$status,
            'message'=>$message,
        ]);
    }
    
}
