<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMachineRequest;
use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\UpdateMachineRequest;
use App\Models\MachineCapacity;
use App\Models\MachineType;
use App\Models\Office;
use Exception;
class MasterMachineController extends Controller
{
    public function index()
    {
       return view('masterMachine.masterMachine-index');
    }
    public function getMachine()
    {
        $data= DB::table('machines')->select('machines.*','offices.officeName','machine_types.name as typeName')
                                    ->join('offices','offices.id','=','machines.officeId')
                                    ->leftJoin('machine_types', 'machine_types.id','=','machines.machineTypeId')
                                    ->orderBy('machines.id','asc')
                                    ->whereNull('machines.deleted_at')
                                    ->get();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function addMachine(Request $request, StoreMachineRequest $StoreMachineRequest) {
        try {
            $StoreMachineRequest->validated();
            $machineInitial = Office::find($request->machineOfficeId)->officeInitial;
            $machineId = Machine::orderBy('id', 'desc')->first();
            $machineNumber = $machineId ==null ? 1 : (int)$machineId->id+1;
            $post = [
                'machineNumber'=> $machineInitial . ' - '.$machineNumber,
                'machineName'=>$request->machineName,
                'officeId'=>$request->machineOfficeId,
                'machineTypeId'=>1,
                'machineCapacityId'=>1,
            ];
           $postCapacity =[
            'machineId'=>$machineNumber,
            'small'=>$request->machineSmall,
            'medium'=>$request->machineMedium,
            'large'=>$request->machineLarge,
           ];
           DB::transaction(function() use($post,$postCapacity) {
               Machine::create($post);
                MachineCapacity::create($postCapacity);
            });
           
            return ResponseFormatter::success(
                $post,
                'Machine successfully added'
            );
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Machine failed to add',
                500
            );
        }
    }
    public function detailMachine(Request $request)
    {
        $detail = DB::table('machines')->select('machines.*','offices.officeName','machine_types.name as typeName')
                                        ->join('offices','offices.id','=','machines.officeId')
                                        ->leftJoin('machine_types', 'machine_types.id','=','machines.machineTypeId')
                                        ->orderBy('machines.id','asc')
                                        ->where('machines.id',$request->id)
                                        ->first();
        $office = DB::table('offices')->select('offices.*','offices.officeName as name','tbl_kabkot.ibukota as cityName')->join('tbl_kabkot','offices.officeCityId','=','tbl_kabkot.id')->where('activeFlag','active')->get();
        $type = MachineType::all();
        $capacity = MachineCapacity::where('machineId',$request->id)->first();
        return response()->json([
            'detail'=>$detail,
            'office'=>$office,
            'type'=>$type,
            'capacity'=>$capacity,

        ]); 
    }
    public function updateMachine(Request $request, UpdateMachineRequest $UpdateMachineRequest) {
        try {
            $UpdateMachineRequest->validated();
            $machineInitial = Office::find($request->machineOfficeIdUpdate)->officeInitial;
           
            $post = [
                'machineNumber'=> $machineInitial . ' - '.$request->id,
                'machineName'=>$request->machineNameUpdate,
                'officeId'=>$request->machineOfficeIdUpdate,
                'machineTypeId'=>$request->machineTypeUpdate,
            ];
           $postCapacity =[
            'machineId'=>$request->id,
            'small'=>$request->machineSmallUpdate,
            'medium'=>$request->machineMediumUpdate,
            'large'=>$request->machineLargeUpdate,
           ];
           DB::transaction(function() use($post,$postCapacity,$request) {
               Machine::find($request->id)->update($post);
                MachineCapacity::where('machineId',$request->id)->update($postCapacity);
            });
           
            return ResponseFormatter::success(
                $post,
                'Machine successfully updated'
            );
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Machine failed to update',
                500
            );
        }
    }
    public function deleteMachine(Request $request)
    {
       
        $status = 500;
        $message ='Machine failed to delete';
        $delete = Machine::find($request->id);
      
        $delete->delete();
        if($delete){
            $status=200;
            $message ="Machine successfully deleted";
        }
        return response()->json([
            'status'=>$status,
            'message'=>$message,

        ]);
    }
}
