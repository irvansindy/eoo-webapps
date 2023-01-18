<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\StoreOeeHeaderRequest;
use App\Models\oeeMaster;
use App\Models\TempExtruder;

class OeeController extends Controller
{
    public function index()
    {
        return view('oee.oee-index');
    }
    public function getOee(Request $request)
    {
        $data = DB::table('oee_masters')
                    ->select('machines.machineName','machineNumber','offices.officeName', DB::raw('DATE(oee_masters.created_at) as date'),'oee_masters.machineId')
                    ->leftJoin('machines','machines.id','=','oee_masters.machineId')
                    ->leftJoin('offices','offices.id','=','machines.officeId')
                    ->whereBetween(DB::raw('DATE(oee_masters.created_at)'), [$request->from, $request->to])
                    ->where('oee_masters.machineId','like','%'.$request->officeFilter.'%')
                    ->groupBy(DB::raw('DATE(oee_masters.created_at)'),'oee_masters.machineId')
                    ->get();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function getOeeShift(Request $request)
    {
       
        $data = DB::table('oee_masters')
                    ->select('machines.machineName','oee_masters.machineId','machineNumber','offices.officeName','oee_masters.shift')
                    ->leftJoin('machines','machines.id','=','oee_masters.machineId')
                    ->leftJoin('offices','offices.id','=','machines.officeId')
                    ->where(DB::raw('DATE(oee_masters.created_at)'), $request->date)
                    ->where('oee_masters.machineId', $request->machineId)
                    ->get();
        $length = TempExtruder::all();
        return response()->json([
            'data'=>$data,
            'length'=>$length,

        ]);
    }
    public function addOee(Request $request, StoreOeeHeaderRequest $StoreOeeHeaderRequest) {
        try {
         $StoreOeeHeaderRequest->validated();
         $headerLast = oeeMaster::select('shift')
                        ->where(DB::raw('DATE(created_at)'), date('Y-m-d'))
                        ->where('machineId',$request->machineId)
                        ->orderBy('id','desc')->first();
        $shift='';
        if($headerLast != null ){
            if($headerLast->shift == 3){
                return ResponseFormatter::error(
                    $shift,
                    'Can`t add more shift',
                    500
                );
            }else{
                $post=[
                    'shift'=>$headerLast->shift+1,
                    'productId'=>0,
                    'status'=>0,
                    'machineId'=>$request->machineId,
                    'goodProductActualPcs'=>0,
                    'goodProductActualKg'=>0,
                ];    
            }
        }else{
            $post=[
                'shift'=>1,
                'machineId'=>$request->machineId,
                'goodProductActualPcs'=>0,
                'goodProductActualKg'=>0,
            ];  
        }
        oeeMaster::create($post);
           return ResponseFormatter::success(
              $post,
               'OEE Header successfully added'
           );           
       
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'OEE Header failed to add',
                500
            );
        }
    }
}
