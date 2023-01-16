<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Http\Requests\StoreOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;
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
    public function getOfficeName()
    {
        $data = DB::table('offices')->select('offices.*','offices.officeName as name','tbl_kabkot.ibukota as cityName')->join('tbl_kabkot','offices.officeCityId','=','tbl_kabkot.id')->where('activeFlag','active')->get();
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
                'Office successfully added'
            );
            
        } catch (Exception $error) {
            return ResponseFormatter::error(
                $error,
                'Office failed to add',
                500
            );
        }
    }
    public function updateOfficeStatus(Request $request)
    {
        $id=$request->id;
        $activeFlag=$request->activeFlag;
        $post=[
            'activeFlag'=>$activeFlag=='active'?'inactive':'active'
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
    public function detailOffice(Request $request)
    {
        $detail = DB::table('offices')->select('offices.*','tbl_provinsi.provinsi as province_name', 'tbl_kabkot.kabupaten_kota as regency_name','tbl_kecamatan.kecamatan as district_name', 'tbl_kelurahan.kelurahan as village_name','tbl_kelurahan.kd_pos as postal_code')
        ->join('tbl_provinsi','tbl_provinsi.id','=','offices.officeProvinceId')
        ->join('tbl_kabkot','tbl_kabkot.id','=','offices.officeCityId')
        ->join('tbl_kecamatan','tbl_kecamatan.id','=','offices.officeDistrictId')
        ->join('tbl_kelurahan','tbl_kelurahan.id','=','offices.officeVillageId')
        ->where('offices.id', $request->id)->first();
        $get_province = DB::table('tbl_provinsi')->select('*')->get();      
        return response()->json([
        'get_province'=>$get_province,
        'detail'=>$detail
        ]);
    }
    public function updateOffice(Request $request,UpdateOfficeRequest $UpdateOfficeRequest) {
        try {
            $UpdateOfficeRequest->validate();
            $post = [
                'officeName'=>$request->officeNameUpdate,
                'officeInitial'=>$request->officeInitialUpdate,
                'officeInitial'=>$request->officeInitialUpdate,
                'officeTypeId'=>$request->officeTypeIdUpdate,
                'officeProvinceId'=>$request->officeProvinceIdUpdate,
                'officeCityId'=>$request->officeCityIdUpdate,
                'officeDistrictId'=>$request->officeDistrictIdUpdate,
                'officeVillageId'=>$request->officeVillageIdUpdate,
                'officePostalCode'=>$request->officePostalCodeUpdate,
                'officeAddress'=>$request->officeAddressUpdate,
            ];
            Office::find($request->id)->update($post);
            return ResponseFormatter::success(
                $post,
                'Office successfully updated'
            );
            
        } catch (Exception $error) {
            return ResponseFormatter::error(
                $error,
                'Office failed to update',
                500
            );
        }
    }
}
