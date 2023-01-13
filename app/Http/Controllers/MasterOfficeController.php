<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Http\Requests\StoreOfficeRequest;
use App\Models\Office;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterOfficeController extends Controller
{
    public function index()
    {
        return view('masterOffice.masterOffice-index');
    }
    public function getOffice()
    {
        $data = DB::table('offices')->select('offices.*','tbl_kabkot.ibukota as cityName')->join('tbl_kabkot','offices.officeCityId','=','tbl_kabkot.id')->get();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function getProvince()
    {
        $getProvince = DB::table('tbl_provinsi')->select('*')->get();
        return response()->json([
            'getProvince'=>$getProvince
        ]);
    }
    public function getRegency(Request $request)
    {
        $getRegency = DB::table('tbl_kabkot')->select('*')->where('provinsi_id', $request->officeProvinceId)->get();
        return response()->json([
            'getRegency'=>$getRegency
        ]);
    }
    public function getDistrict(Request $request)
    {
        $getDistrict = DB::table('tbl_kecamatan')->select('*')->where('kabkot_id', $request->officeCityId)->get();
        return response()->json([
            'getDistrict'=>$getDistrict
        ]);
    }
    public function getVillage(Request $request)
    {
        $getVillage = DB::table('tbl_kelurahan')->select('*')->where('kecamatan_id', $request->officeDistrictId)->get();
        return response()->json([
            'getVillage'=>$getVillage
        ]);
    }
    public function getPostalCode(Request $request)
    {
        $getPostalCode = DB::table('tbl_kelurahan')->select('*')->where('id', $request->officeVillageId)->first();
        return response()->json([
            'getPostalCode'=>$getPostalCode
        ]);
    }
    public function saveOffice(Office $Office, StoreOfficeRequest $StoreOfficeRequest) {
        try {
                $Office->create($StoreOfficeRequest->validated());
            return ResponseFormatter::success(
                $Office,
                'product data successfully added'
            );
            
        } catch (Exception $error) {
            return ResponseFormatter::error(
                $error,
                'product data failed to add',
                500
            );
        }
    }
    public function updateOfficeStatus(Request $request)
    {
        $id=$request->id;
        $activeFlag=$request->activeFlag;
        dd($activeFlag);
        $post=[
            'activeFlag'=>$activeFlag
        ];
        $message ='Data Gagal diupdate';
        $update = Office::find($id);
       
        $update->update($post);
        if($update){
            $message='Data berhasil diupdate';
        }
        return response()->json([
            'message'=>$message,
        ]);
    }
    
}
