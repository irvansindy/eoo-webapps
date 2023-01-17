<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductClassRequest;
use App\Models\ProductClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\UpdateProductClassRequest;
use App\Models\ProductType;

class ProductClassController extends Controller
{
    public function index()
    {
        return view('productClass.productClass-index');
    }
    public function getProductClass()
    {
        $data =DB::table('product_classes')->join('product_types','product_types.id','=','product_classes.productTypeId')
                                            ->select('product_classes.*','product_types.productType','product_classes.productClass as name')
                                            ->whereNull('product_classes.deleted_at')
                                            ->get();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function addProductClass(ProductClass $ProductClass, StoreProductClassRequest $StoreProductClassRequest) {
        try {
            $ProductClass->create($StoreProductClassRequest->validated());
            return ResponseFormatter::success(
                $ProductClass,
                'Product class successfully added'
            );
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product class failed to add',
                500
            );
        }
    }
    public function detailProductClass(Request $request)
    {
        $detail =DB::table('product_classes')->join('product_types','product_types.id','=','product_classes.productTypeId')
        ->select('product_classes.*','product_types.productType')->where('product_classes.id',$request->id)->first();
        $productType = ProductType::select('productType as name','id')->get();
        return response()->json([
            'detail'=>$detail,
            'productType'=>$productType,
        ]);
    }
    public function updateProductClass(Request $request, UpdateProductClassRequest $UpdateProductClassRequest) {
        try {
            $UpdateProductClassRequest->validated();
            $post =[
                'productTypeId'=>$request->productTypeIdUpdate,
                'productClass'=>$request->productClassUpdate,
            ];
            ProductClass::find($request->id)->update($post);
            return ResponseFormatter::success(
                $post,
                'Product class successfully update'
            );
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Product class failed to update',
                500
            );
        }
    }
    public function deleteProductClass(Request $request)
    {
        $status =500;
        $message ='Product class failed to delete';
        $delete = ProductClass::find($request->id)->delete();
        if($delete){
            $status=200;
            $message ='Product class successfully deleted';
        }
        return response()->json([
            'status'=>$status,
            'message'=>$message,
        ]);
    }
}
