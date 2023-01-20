<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\oeeMaster;
use App\Models\oeeDetail;
use Carbon\Carbon;
use App\Helpers\ResponseFormatter;

class ReportOeeController extends Controller
{
    public function getReportOee() {
        $oeeMaster = oeeMaster::with([
            'product',
            'machine'
        ])->findOrFail(1);
        $oeeDetail = oeeDetail::with([
            'product',
            'machine',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->get();

        return ResponseFormatter::success([
            'oeeMaster' => $oeeMaster,
            'ooDetails' => $oeeDetail
        ], 'Oee Data successfully fetched');
    }

    public function fetchReportOee(Request $request) {
        $id = $request->id;
        $date = $request->date;
        $machineCapacity = $request->machineCapacity;
        $machineCapacityNumber = $request->machineCapacityNumber;
        $productLength = $request->productLength;
        $productDiameter = $request->productDiameter;
        $productVariant = $request->productVariant;

        if ($id) {
            $dataOee = oeeMaster::with([
                'product',
                'machine',
                'ooDetail'
            ])->findOrFail($id);

            if ($dataOee) {
                return ResponseFormatter::success(
                    $dataOee,
                    'Oee Data successfully fetched'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Oee data failed to fetch',
                    404
                );
            }
        }

        $dataOee = oeeMaster::with([
            'product',
            'machine',
            'ooDetail'
        ]);

        if ($date) {
            $dataOee->whereHas('ooDetail', function($query) {
                $query->where('date', 'like', '%'.$date.'%');
            });
        }

        if ($machineCapacity && $machineCapacityNumber) {
            $dataOee->whereHas('ooDetail', function($query) {
                $query->where('machineId', 'like', '%'.$machineCapacity.'%')->where('small', 'like', '%'.$machineCapacityNumber.'%')->where('medium', 'like', '%'.$machineCapacityNumber.'%')->where('large', 'like', '%'.$machineCapacityNumber.'%');
            });
        }

        if ($productLength) {
            $dataOee->whereHas('product', function($query) {
                $query->where('productLength', 'like', '%'.$productLength.'%');
                // where('productlengthId', 'like', '%'.$productLength.'%')
            });
        }

        if ($productDiameter) {
            $dataOee->whereHas('product', function($query) {
                $query->where('productDiameter', 'like', '%'.$productDiameter.'%');
            });
        }
        
        if ($productVariant) {
            $dataOee->whereHas('product', function($query) {
                $query->where('productVariant', 'like', '%'.$productVariant.'%');
            });
        }

        return ResponseFormatter::success(
            $dataOee->first(),
            'Oee data successfully fetched'
        );
    }
}
