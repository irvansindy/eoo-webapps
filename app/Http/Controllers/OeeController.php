<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\StoreOeeDetailRequest;
use App\Http\Requests\StoreOeeHeaderRequest;
use App\Models\oeeDetail;
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
                    ->select('machines.machineName','oee_masters.machineId','machineNumber','offices.officeName','oee_masters.shift','oee_masters.id','oee_masters.status','oee_masters.shift')
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
    public function addOeeDetail(Request $request,StoreOeeDetailRequest $StoreOeeDetailRequest) {
        // try {
            
            $StoreOeeDetailRequest->validated();
            $postDie=[];
            $postExt=[];
            $postAZ=[];
            $arrayDie=[];
            $arrayExt=[];
            $arrayAZ=[];
            $shift = oeeMaster::find($request->oeeMasterId);
            if($shift->status == 4){
                return ResponseFormatter::error(
                    $shift,
                    'Can`t add more progress',
                    500
                );
            }else{
                $postStatus=[
                    'status'=>$shift->status+1
                ];
                for($i =0 ; $i < count($request->extArr); $i++){
                    if($request->extArr[$i][0] != null || $request->extArr[$i][0] != ''){
                        $postExt =[
                            'zoneNumber'=> $i +1,
                            'tempExtruderId'=>1,
                            'productId'=>$request->productId,
                            'oeeDetailValue'=>$request->extArr[$i][0],
                            'screwSpeed'=>$request->screwSpeed,
                            'dosingSpeed'=>$request->dosingSpeed,
                            'mainDrive'=>$request->mainDrive,
                            'vacumCylinder'=>$request->vacumCylinder,
                            'meltTemperature'=>$request->meltTemp,
                            'meltPressure'=>$request->meltPress,
                            'vacumTank'=>$request->vacumTank,
                            'haulOffSpeed'=>$request->haulOffSpeed,
                            'waterTempVacumTank'=>$request->waterTemp,
                            'waterPressure'=>$request->waterPress,
                            'oeeMasterId'=>$request->oeeMasterId,
                            'shift'=>$shift->shift,
                               'date'=>date('Y-m-d'),
                            'time'=>date('H:i:s'),
                            'created_at'=>date('Y-m-d H:i:s'),
                            'machineId'=>$shift->machineId,
                            'status'=>$shift->status+1,
                            'adapterZone'=>$request->adapterZone
    
                        ];
                        array_push($arrayExt,$postExt);
                    }
                }
                for($j = 0; $j < count($request->dieArr); $j++){
                    if($request->dieArr[$j][0] !=null || $request->dieArr[$j][0] !=''){
                        $postDie=[
                            'zoneNumber' => $j+1,
                            'tempExtruderId'=>2,
                            'productId'=>$request->productId,
                            'oeeDetailValue'=>$request->dieArr[$j],
                            'screwSpeed'=>$request->screwSpeed,
                            'dosingSpeed'=>$request->dosingSpeed,
                            'mainDrive'=>$request->mainDrive,
                            'vacumCylinder'=>$request->vacumCylinder,
                            'meltTemperature'=>$request->meltTemp,
                            'meltPressure'=>$request->meltPress,
                            'vacumTank'=>$request->vacumTank,
                            'haulOffSpeed'=>$request->haulOffSpeed,
                            'waterTempVacumTank'=>$request->waterTemp,
                            'waterPressure'=>$request->waterPress,
                            'oeeMasterId'=>$request->oeeMasterId,
                            'shift'=>$shift->shift,
                            'date'=>date('Y-m-d'),
                            'time'=>date('H:i:s'),
                            'created_at'=>date('Y-m-d H:i:s'),
                            'machineId'=>$shift->machineId,
                            'status'=>$shift->status+1,
                            'adapterZone'=>$request->adapterZone
                        ];
                        array_push($arrayDie, $postDie);
                    }
                }
                for($k = 0; $k < count($request->aZArr); $k++){
                    // dd($request->aZArr[$k]);
                    if($request->aZArr[$k]!=null || $request->aZArr[$k] !=''){
                        $postAZ=[
                            'zoneNumber' => $k+1,
                            'tempExtruderId'=>3,
                            'productId'=>$request->productId,
                            'oeeDetailValue'=>$request->aZArr[$k],
                            'screwSpeed'=>$request->screwSpeed,
                            'dosingSpeed'=>$request->dosingSpeed,
                            'mainDrive'=>$request->mainDrive,
                            'vacumCylinder'=>$request->vacumCylinder,
                            'meltTemperature'=>$request->meltTemp,
                            'meltPressure'=>$request->meltPress,
                            'vacumTank'=>$request->vacumTank,
                            'haulOffSpeed'=>$request->haulOffSpeed,
                            'waterTempVacumTank'=>$request->waterTemp,
                            'waterPressure'=>$request->waterPress,
                            'oeeMasterId'=>$request->oeeMasterId,
                            'shift'=>$shift->shift,
                            'date'=>date('Y-m-d'),
                            'time'=>date('H:i:s'),
                            'created_at'=>date('Y-m-d H:i:s'),
                            'machineId'=>$shift->machineId,
                            'status'=>$shift->status+1,
                            'adapterZone'=>$request->adapterZone
                        ];
                        array_push($arrayAZ, $postAZ);
                    }
                }              
               $merge = array_merge($arrayExt,$arrayDie,$arrayAZ);
               DB::transaction(function() use($merge,$postStatus, $request) {
                    oeeDetail::insert($merge);
                    oeeMaster::find($request->oeeMasterId)->update($postStatus);
                });
                return ResponseFormatter::success(
                    $merge,
                     'OEE Detail successfully added'
                 );           
            }

       
        // } catch (\Throwable $th) {
        //     return ResponseFormatter::error(
        //         $th,
        //         'OEE Detail failed to add',
        //         500
        //     );
        // }
    }
    public function getOeeDetailProgress(Request $request)
    {
        
        $dataExt = DB::table('oee_masters')
                    ->leftJoin('oee_details','oee_details.oeeMasterId','=','oee_masters.id')
                    ->leftJoin('products','products.id','=','oee_details.productId')
                    ->select('oee_details.*')
                    ->where('oee_masters.id',$request->id)
                    ->where('oee_masters.shift', $request->shift)
                    ->where('oee_details.status', $request->status)
                    ->where('oee_details.tempExtruderId',1)
                    ->get();

        $dataDie = DB::table('oee_masters')
                    ->leftJoin('oee_details','oee_details.oeeMasterId','=','oee_masters.id')
                    ->leftJoin('products','products.id','=','oee_details.productId')
                    ->select('oee_details.*')
                    ->where('oee_masters.id',$request->id)
                    ->where('oee_masters.shift', $request->shift)
                    ->where('oee_details.status', $request->status)
                    ->where('oee_details.tempExtruderId',2)
                    ->get();

        $dataAZ = DB::table('oee_masters')
                    ->leftJoin('oee_details','oee_details.oeeMasterId','=','oee_masters.id')
                    ->leftJoin('products','products.id','=','oee_details.productId')
                    ->select('oee_details.*')
                    ->where('oee_masters.id',$request->id)
                    ->where('oee_masters.shift', $request->shift)
                    ->where('oee_details.status', $request->status)
                    ->where('oee_details.tempExtruderId',3)
                    ->get();
                    
        $detail = DB::table('oee_masters')
                    ->leftJoin('oee_details','oee_details.oeeMasterId','=','oee_masters.id')
                    ->leftJoin('products','products.id','=','oee_details.productId')
                    ->select('oee_details.*', 'products.productName','products.productWeightStandard as weight' )
                    ->where('oee_masters.id',$request->id)
                    ->where('oee_masters.shift', $request->shift)
                    ->where('oee_details.status', $request->status)
                    ->first();
       
        return response()->json([
            'dataExt'=>$dataExt,
            'dataDie'=>$dataDie,
            'dataAZ'=>$dataAZ,
            'detail'=>$detail,

        ]);        
    }
}
