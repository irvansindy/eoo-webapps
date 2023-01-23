<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\StoreOeeDetailRequest;
use App\Http\Requests\StoreOeeHeaderRequest;
use App\Models\OeeDefect;
use App\Models\OeeDefectLog;
use App\Models\OeeDeffectLog;
use App\Models\oeeDetail;
use App\Models\OeeDownTime;
use App\Models\oeeMaster;
use App\Models\OeeShiftLog;
use App\Models\Product;
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
                    ->orderBy(DB::raw('DATE(oee_masters.created_at)'),'asc')
                    ->get();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function getOeeShift(Request $request)
    {
       
        $data = DB::table('oee_masters')
                    ->select('machines.machineName','oee_masters.machineId','machineNumber','offices.officeName','oee_masters.shift','oee_masters.id','oee_masters.status','oee_masters.shift',DB::raw('DATE(oee_masters.created_at) as date'))
                    ->leftJoin('machines','machines.id','=','oee_masters.machineId')
                    ->leftJoin('offices','offices.id','=','machines.officeId')
                    ->where(DB::raw('DATE(oee_masters.created_at)'), $request->date)
                    ->where('oee_masters.machineId', $request->machineId)
                    ->get();
        $length = TempExtruder::all();
        $deffectLength = OeeDefect::all();
        return response()->json([
            'data'=>$data,
            'length'=>$length,
            'deffectLength'=>$deffectLength,

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
        try {
            
            $StoreOeeDetailRequest->validated();
            $postDie=[];
            $postExt=[];
            $postAZ=[];
            $arrayDie=[];
            $arrayExt=[];
            $arrayAZ=[];
        //    Validasi, cek dulu. apakah data sudah ada apa nggak, jika ada, maka akan diinsert ulang. Jika kosong buat baru
            $existValidation = DB::table('oee_masters')
                                ->join('oee_details','oee_details.oeeMasterId','=','oee_masters.id')
                                ->where('oee_masters.shift', $request->shift)
                                ->where('oee_details.status', $request->statusIdUpdate)
                                ->where( DB::raw('DATE(oee_masters.created_at)'), $request->date)
                                ->count();
            if($existValidation  > 0){
              
                $shift = oeeMaster::find($request->oeeMasterId);
              
                  
                    for($i =0 ; $i < count($request->extArr); $i++){
                        if($request->extArr[$i][0] != null || $request->extArr[$i][0] != ''){
                            $postExt =[
                                'zoneNumber'=> $i +1,
                                'tempExtruderId'=>1,
                                'productId'=>$request->productId,
                                'oeeDetailValue'=>$request->extArr[$i],
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
                                'shift'=>$request->shift,
                                   'date'=>date('Y-m-d'),
                                'time'=>date('H:i:s'),
                                'created_at'=>date('Y-m-d H:i:s'),
                                'machineId'=>$shift->machineId,
                                'status'=> $request->statusIdUpdate,
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
                                'shift'=>$request->shift,
                                'date'=>date('Y-m-d'),
                                'time'=>date('H:i:s'),
                                'created_at'=>date('Y-m-d H:i:s'),
                                'machineId'=>$shift->machineId,
                                'status'=> $request->statusIdUpdate,
                                'adapterZone'=>$request->adapterZone
                            ];
                            array_push($arrayDie, $postDie);
                        }
                    }
                    for($k = 0; $k < count($request->aZArr); $k++){
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
                                'shift'=>$request->shift,
                                'date'=>date('Y-m-d'),
                                'time'=>date('H:i:s'),
                                'created_at'=>date('Y-m-d H:i:s'),
                                'machineId'=>$shift->machineId,
                                'status'=> $request->statusIdUpdate,
                                'adapterZone'=>$request->adapterZone
                            ];
                            array_push($arrayAZ, $postAZ);
                        }
                    }              
                   $merge = array_merge($arrayExt,$arrayDie,$arrayAZ);
                
                   DB::transaction(function() use($merge, $request) {
                    $delete = DB::table('oee_details')
                    ->where('oee_details.shift', $request->shift)
                    ->where('oee_details.status', $request->statusIdUpdate)
                    ->where( DB::raw('DATE(oee_details.created_at)'), $request->date)->delete();
                 
                        if($delete){
                            oeeDetail::insert($merge);
                        }else{
                            dd('test');
                        }

                    });
                    return ResponseFormatter::success(
                        $merge,
                         'OEE Detail successfully added'
                     );           
                
            }else{
               
                $shift = oeeMaster::find($request->oeeMasterId);
           
                    $postStatus=[
                        'status'=>$shift->status+1
                    ];
                    for($i =0 ; $i < count($request->extArr); $i++){
                        if($request->extArr[$i][0] != null || $request->extArr[$i][0] != ''){
                            $postExt =[
                                'zoneNumber'=> $i +1,
                                'tempExtruderId'=>1,
                                'productId'=>$request->productId,
                                'oeeDetailValue'=>$request->extArr[$i],
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

       
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'OEE Detail failed to add',
                500
            );
        }
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
                    ->where( DB::raw('DATE(oee_masters.created_at)'), $request->date)
                    ->where('oee_details.tempExtruderId',1)
                    ->get();

        $dataDie = DB::table('oee_masters')
                    ->leftJoin('oee_details','oee_details.oeeMasterId','=','oee_masters.id')
                    ->leftJoin('products','products.id','=','oee_details.productId')
                    ->select('oee_details.*')
                    ->where('oee_masters.id',$request->id)
                    ->where('oee_masters.shift', $request->shift)
                    ->where('oee_details.status', $request->status)
                    ->where( DB::raw('DATE(oee_masters.created_at)'), $request->date)
                    ->where('oee_details.tempExtruderId',2)
                    ->get();

        $dataAZ = DB::table('oee_masters')
                    ->leftJoin('oee_details','oee_details.oeeMasterId','=','oee_masters.id')
                    ->leftJoin('products','products.id','=','oee_details.productId')
                    ->select('oee_details.*')
                    ->where('oee_masters.id',$request->id)
                    ->where('oee_masters.shift', $request->shift)
                    ->where('oee_details.status', $request->status)
                    ->where( DB::raw('DATE(oee_masters.created_at)'), $request->date)
                    ->where('oee_details.tempExtruderId',3)
                    ->get();
                    
        $detail = DB::table('oee_masters')
                    ->leftJoin('oee_details','oee_details.oeeMasterId','=','oee_masters.id')
                    ->leftJoin('products','products.id','=','oee_details.productId')
                    ->select('oee_details.*', 'products.productName','products.productWeightStandard as weight')
                    ->where('oee_masters.id',$request->id)
                    ->where('oee_masters.shift', $request->shift)
                    ->where( DB::raw('DATE(oee_masters.created_at)'), $request->date)
                    ->where('oee_details.status', $request->status)
                    ->first();
      
        $product = Product::select('productName as name', 'id')->get();
        $master = oeeDetail::select('status')
                            ->where('oeeMasterId',$request->id)
                            ->where( DB::raw('DATE(created_at)'), $request->date)
                            ->groupBy('status')->get(); 
                   
        return response()->json([
            'dataExt'=>$dataExt,
            'dataDie'=>$dataDie,
            'dataAZ'=>$dataAZ,
            'detail'=>$detail,
            'product'=>$product,
            'master'=>$master,

        ]);        
    }
    public function getStatusLength(Request $request)
    {
        $master = oeeDetail::select('status')
                            ->where('oeeMasterId',$request->id)
                            ->where( DB::raw('DATE(created_at)'), $request->date)
                            ->groupBy('status')->get(); 
        return response()->json([
            'master'=>$master,
        ]);        
    }
    public function getMasterShift(Request $request)
    {
        // Validasi mengamnbil dari log, jika data tidak ada. maka ngambil dari Oee Detail 
        $validasi = OeeShiftLog ::where('machineId', $request->id)->where('machineDate',$request->date)->get();
        if(count($validasi) > 0){
            $data = OeeShiftLog::select('oee_shift_logs.*','products.productWeightStandard as weight','products.productName')
            ->join('products','products.id','=','oee_shift_logs.productId')
            ->where('oee_shift_logs.oeeMasterId',$request->id)
            ->where( 'oee_shift_logs.machineDate', $request->date)
            ->groupBy('productId')->get(); 
        }else{
            $data = oeeDetail::select('oee_details.machineId','oee_details.productId','products.productWeightStandard as weight','products.productName','oee_masters.*')
            ->join('products','products.id','=','oee_details.productId')
            ->join('oee_masters','oee_masters.id','=','oee_details.oeeMasterId')
            ->where('oee_details.oeeMasterId',$request->id)
            ->where( DB::raw('DATE(oee_details.created_at)'), $request->date)
            ->groupBy('oee_details.productId')->get(); 
        }
        $downTime = OeeDownTime::where('oeeMasterId', $request->id)->first();
        $validasiDefect = OeeDefectLog::where('oeeMasterId', $request->id)->count();
        $oeeMaster = OeeMaster::find($request->id);
        if($validasiDefect == 0){
            $deffect = OeeDefect::all();
        }else{
            $deffect = DB::table('oee_defect_logs')->join('oee_defects','oee_defects.id','=','oee_defect_logs.defectId')->get();
        }
        return response()->json([
            'data'=>$data,
            'downTime'=>$downTime,
            'deffect'=>$deffect,
            'oeeMaster'=>$oeeMaster,
        ]);        
    }
    public function updateOeeMaster(Request $request)
    {
        $postShiftLog = [];
        $goodPipeKg=0;
        $goodPipePcs=0;
        $scrapPipe=0;
        $scrapMaterial=0;
        $materialUse=0;
        $materialUse=0;
        $scrapStoping=0;
        $goodPipeStandartKg=0;
        $goodPipeStandartPcs=0;
        $machineId = oeeMaster::find($request->id);
        $defectArray=[];
        foreach($request->arrSettingHeader as $row){
            $post =[
                'machineId'=>$machineId->machineId,
                'oeeMasterId' =>$request->id,
                'machineDate' =>$request->date,
                'productId'=>$row[0],
                'goodProductActualKg'=>$row[1],
                'goodProductActualPcs'=>$row[2],
                'scrapPipe'=>$row[3],
                'scrapMaterial'=>$row[4],
                'materialUse'=>$row[5],
                'scrapStoping'=>$row[6],
                'goodPipeStandartKg'=>$row[7],
                'goodPipeStandartPcs'=>$row[8],
                'created_at'=>date('Y-m-d H:i:s')
            ];
            array_push($postShiftLog,$post);
            $goodPipeKg +=$row[1];
            $goodPipePcs +=$row[2];
            $scrapPipe +=$row[3];
            $scrapMaterial +=$row[4];
            $materialUse +=$row[5];
            $scrapStoping +=$row[6];
            $goodPipeStandartKg +=$row[7];
            $goodPipeStandartPcs +=$row[8];
        }
        foreach($request->arrSettingDefect as $col){
            $postDefect =[
                'oeeMasterId'=>$request->id,
                'defectId'=>$col[0],
                'value'=>$col[1],
            ];
            array_push($defectArray,$postDefect);
        }
        $postHeader = [
            'goodProductActualKg'=>$goodPipeKg,
            'goodProductActualPcs'=>$goodPipePcs,
            'scrapPipe'=>$scrapPipe,
            'scrapMaterial'=>$scrapMaterial,
            'materialUse'=>$materialUse,
            'scrapStoping'=>$scrapStoping,
            'goodPipeStandartKg'=>$goodPipeStandartKg,
            'goodPipeStandartPcs'=>$goodPipeStandartPcs,
            'remark'=>$request->settingRemark,
        ];
        $postDownTime =[
            'idle'=>$request->idle,
            'setupRoutage'=>$request->setupRoutage,
            'waitingForSparepart'=>$request->waitingForSparepart,
            'setupDies'=>$request->setupDies,
            'noMaterial'=>$request->noMaterial,
            'oeeMasterId'=>$request->id
        ];
       
        DB::transaction(function() use($postHeader, $postShiftLog,$request,$postDownTime,$defectArray) {
            $update = oeeMaster::where('machineId',$request->id)
                                ->where('shift',$request->shift)
                                ->where( DB::raw('DATE(created_at)'), $request->date)->update($postHeader);
            if($update){
                // Validasi jika data sudah ada maka akan diupdate
             
                $validasi =  OeeShiftLog::where('oeeMasterId',$request->id)
                ->where( DB::raw('DATE(machineDate)'), $request->date)->count();
                if($validasi == 0){
                    OeeShiftLog::insert($postShiftLog);
                }else{
                    OeeShiftLog::where('machineId',$request->id)
                                ->where( DB::raw('DATE(machineDate)'), $request->date)->delete();
                    OeeShiftLog::insert($postShiftLog);
                }
                $validasiDownTime = OeeDownTime::where('oeeMasterId', $request->id)->count();
                if($validasiDownTime == 0){
                    OeeDownTime::create($postDownTime);
                }else{
                    OeeDownTime::where('oeeMasterId', $request->id)->update($postDownTime);
                }

                $validasiDefect = OeeDefectLog :: where('oeeMasterId',$request->id)->count();
                if($validasiDefect == 0 ){
                    OeeDefectLog::insert($defectArray);
                }else{
                    OeeDefectLog :: where('oeeMasterId',$request->id)->delete();
                    OeeDefectLog::insert($defectArray);
                }
            }
        });
       
    }

}
