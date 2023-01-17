<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubClassRequest;
use App\Models\SubClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\UpdateSubClassRequest;

class SubClassController extends Controller
{
    public function index()
    {
        return view('subClass.subClass-index');
    }
    public function getSubClass()
    {
        $data = DB::table('sub_classes')->join('product_classes','product_classes.id','=','sub_classes.productClassId')->whereNull('sub_classes.deleted_at')->select('sub_classes.*','product_classes.productClass as productClassName')->get();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function addSubClass(SubClass $SubClass, StoreSubClassRequest $StoreSubClassRequest) {
        try {
            $SubClass->create($StoreSubClassRequest->validated());
            return ResponseFormatter::success(
                $SubClass,
                'Sub class successfully added'
            );            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Sub class failed to add',
                500
            );
        }
    }
    public function detailSubClass(Request $request)
    {
        $detail = DB::table('sub_classes')->join('product_classes','product_classes.id','=','sub_classes.productClassId')->whereNull('sub_classes.deleted_at')->select('sub_classes.*','product_classes.productClass as productClassName')->where('sub_classes.id', $request->id)->first();
        $data =DB::table('product_classes')->join('product_types','product_types.id','=','product_classes.productTypeId')
        ->select('product_classes.*','product_types.productType','product_classes.productClass as name')
        ->whereNull('product_classes.deleted_at')
        ->get();
        return response()->json([
            'detail'=>$detail,
            'data'=>$data,
        ]);
    }
    public function updateSubClass(Request $request, UpdateSubClassRequest $UpdateSubClassRequest) {
        try {
            $UpdateSubClassRequest->validated();
            $post =[
                'productClassId'=>$request->productClassIdUpdate,
                'subClassName'=>$request->subClassNameUpdate,
            ];
            SubClass::find($request->id)->update($post);
            return ResponseFormatter::success(
                $post,
                'Sub class successfully update'
            );
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Sub class failed to update',
                500
            );
        }
    }
    public function deleteSubClass(Request $request)
    {
        $status =500;
        $message ='Product class failed to delete';
        $delete = SubClass::find($request->id)->delete();
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
