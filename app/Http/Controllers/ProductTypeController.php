<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductTypeRequest;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\UpdateProductTypeRequest;

class ProductTypeController extends Controller
{
    public function index()
    {
        return view('productType.productType-index');
    }
    public function getProductType()
    {
        $data = ProductType::all();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function addProductType(ProductType $ProductType, StoreProductTypeRequest $StoreProductTypeRequest) {
        try {
            $ProductType->create($StoreProductTypeRequest->validated());
            return ResponseFormatter::success(
                $ProductType,
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
    public function detailProductType(Request $request)
    {
        $detail = ProductType::find($request->id);
        return response()->json([
            'detail'=>$detail,
        ]);
    }
    public function updateProductType(Request $request, UpdateProductTypeRequest $UpdateProductTypeRequest) {
        try {
            $UpdateProductTypeRequest->validated();
            $post =[
                'productType'=>$request->productTypeUpdate
            ];
            ProductType::find($request->id)->update($post);
            return ResponseFormatter::success(
                $post,
                'Product type successfully update'
            );
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product type failed to update',
                500
            );
        }
    }
    public function deleteProductType(Request $request)
    {
        $status =500;
        $message ='Product type failed to delete';
        $delete = ProductType::find($request->id)->delete();
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
