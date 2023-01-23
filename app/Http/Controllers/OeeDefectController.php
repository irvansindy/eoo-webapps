<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OeeDefect;
use App\Http\Requests\StoreOeeDefect;
use App\Http\Requests\UpdateOeeDefect;
use App\Helpers\ResponseFormatter;

class OeeDefectController extends Controller
{
    public function index() {
        return view('oeeDefect.oeeDefect-index');
    }

    public function getOeeDefect() {
        try {
            $OeeDefect = OeeDefect::all();
            return ResponseFormatter::success(
                $OeeDefect,
                'Oee Defect data successfully fetched'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Oee Defect data failed to fetch',
                404
            );
        }
    }

    public function storeOeeDefect(OeeDefect $OeeDefect, StoreOeeDefect $StoreOeeDefect) {
        try {
            $OeeDefect->create($StoreOeeDefect->validated());
            return ResponseFormatter::success(
                $OeeDefect,
                'Oee Defect data successfully added'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Oee Defect data failed to add',
                422
            );
        }
    }

    public function editOeeDefect(Request $request) {
        try {
            $OeeDefect = OeeDefect::findOrFail($request->id);
            return ResponseFormatter::success(
                $OeeDefect,
                'Oee Defect data successfully fetched'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Oee Defect data failed to fetch',
                404
            );
        }
    }

    public function updateOeeDefect(Request $request, UpdateOeeDefect $UpdateOeeDefect) {
        try {
            // OeeDefect $OeeDefect, 
            // $OeeDefect->update($UpdateOeeDefect->validated());
            // dd($OeeDefect);
            $UpdateOeeDefect->validated();
            $OeeDefect = OeeDefect::findOrFail($request->id);
            $OeeDefect->update([
                'defectName' => $request->updateDefectName,
            ]);
            return ResponseFormatter::success(
                $OeeDefect,
                'Oee Defect data successfully updated'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Oee Defect data failed to update',
                422
            );
        }
    }

    public function deleteOeeDefect(Request $request) {
        try {
            $OeeDefect = OeeDefect::findOrFail($request->id);
            $OeeDefect->delete();
            return ResponseFormatter::success(
                $OeeDefect,
                'Oee Defect data successfully deleted'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Oee Defect data failed to delete',
                422
            );
        }
    }
}
