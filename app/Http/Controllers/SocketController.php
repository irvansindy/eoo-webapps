<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSocketRequest;
use App\Models\Socket;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\UpdateSocketRequest;

class SocketController extends Controller
{
    public function index()
    {
        return view('socket.socket-index');
    }
    public function getSocket()
    {
        $data  = Socket::select('socketName as name', 'id')->get();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function addSocket(Socket $Socket, StoreSocketRequest $StoreSocketRequest) {
        try {
            $Socket->create($StoreSocketRequest->validated());
            return ResponseFormatter::success(
                $Socket,
                'Socket successfully added'
            );            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Socket failed to add',
                500
            );
        }
    }
    public function detailSocket(Request $request)
    {
        $detail = Socket::find($request->id);
        return response()->json([
            'detail'=>$detail,
        ]); 
    }
    public function updateSocket(Request $request, UpdateSocketRequest $UpdateSocketRequest) {
        try {
            $UpdateSocketRequest->validated();
            $post =[
                'socketName'=>$request->socketNameUpdate,
            ];
            Socket::find($request->id)->update($post);
            return ResponseFormatter::success(
                $post,
                'Socket successfully update'
            );
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Socket failed to update',
                500
            );
        }
    }
    public function deleteSocket(Request $request)
    {
        $status =500;
        $message ='Socket failed to delete';
        $delete = Socket::find($request->id)->delete();
        if($delete){
            $status=200;
            $message ='Socket successfully deleted';
        }
        return response()->json([
            'status'=>$status,
            'message'=>$message,
        ]);
    }
}
