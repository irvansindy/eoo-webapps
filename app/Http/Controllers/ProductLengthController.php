<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductLengthSize;
use App\Http\Requests\StoreProductLengthRequest;
use App\Http\Requests\UpdateProductLengthRequest;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;

class ProductLengthController extends Controller
{
    public function index()
    {
        return view('productLength.productLength-index');
    }
    public function getProductLength() {
        $data = ProductLengthSize::limit(10)->get();
        return response()->json([
            'data'=>$data,
        ]);
    }

    public function getProductLengthName()
    {
        $data = ProductLengthSize::select(DB::raw('CONCAT(productLength, " ", productLengthUnit) AS name'),'id')->get();
        return response()->json([
            'data'=>$data,
        ]);
    }

    public function createProductLength() {
        return view('productLength.createproductLength');
    }

    public function addProductLength(ProductLengthSize $ProductLengthSize, StoreProductLengthRequest $StoreProductLengthRequest) {
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
    public function detailProductLength(Request $request)
    {
        $detail = ProductLengthSize::find($request->id);
        return response()->json([
            'detail'=>$detail,
        ]);
    }
    public function updateProductLength(Request $request, UpdateProductLengthRequest $UpdateProductLengthRequest) {
        try {
            $UpdateProductLengthRequest->validated();
            $post =[
                'productLength'=>$request->productLengthUpdate,
                'productLengthUnit'=>$request->productLengthUnitUpdate,
            ];
            ProductLengthSize::find($request->id)->update($post);
            return ResponseFormatter::success(
                $post,
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

    public function deleteProductLength(Request $request)
    {
        $status =500;
        $message ='Product length failed to delete';
        $delete = ProductLengthSize::find($request->id)->delete();
        if($delete){
            $status=200;
            $message ='Product length successfully deleted';
        }
        return response()->json([
            'status'=>$status,
            'message'=>$message,
        ]);
    }
}
