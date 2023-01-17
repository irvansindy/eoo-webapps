<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDieHeadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\UpdateDieHeadRequest;
use App\Models\DieHead;
use App\Models\Machine;

class DieHeadController extends Controller
{
    public function index()
    {
        return view('dieHead.dieHead-index');
    }
    public function getDieHead()
    {
        $data = DB::table('die_heads')->join('machines','machines.id','=','die_heads.machineId')->select('die_heads.dieheadName as name','die_heads.id','machines.machineName')->whereNull('die_heads.deleted_at')->get();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function addDieHead(DieHead $DieHead, StoreDieHeadRequest $StoreDieHeadRequest) {
        try {
            $DieHead->create($StoreDieHeadRequest->validated());
            return ResponseFormatter::success(
                $DieHead,
                'Die head successfully added'
            );            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Die head failed to add',
                500
            );
        }
    }
    public function detailDieHead(Request $request)
    {
        $detail = DB::table('die_heads')->join('machines','machines.id','=','die_heads.machineId')->select('die_heads.dieheadName as name','die_heads.id','machines.machineName','die_heads.machineId')->whereNull('die_heads.deleted_at')->where('die_heads.id', $request->id)->first();
        $data = Machine::select('machineName as name','id')->whereNull('deleted_at')->get();
        return response()->json([
            'detail'=>$detail,
            'data'=>$data,
        ]);
    }
    public function updateDieHead(Request $request, UpdateDieHeadRequest $UpdateDieHeadRequest) {
        try {
            $UpdateDieHeadRequest->validated();
            $post =[
                'dieHeadname'=>$request->dieHeadNameUpdate,
                'machineId'=>$request->machineIdUpdate,
            ];
            DieHead::find($request->id)->update($post);
            return ResponseFormatter::success(
                $post,
                'Die head successfully update'
            );
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Die head failed to update',
                500
            );
        }
    }
    public function deleteDieHead(Request $request)
    {
        $status =500;
        $message ='Product class failed to delete';
        $delete = DieHead::find($request->id)->delete();
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
