<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\oeeMaster;
use App\Models\oeeDetail;
use App\Models\OeeDownTime;
use Carbon\Carbon;
use App\Helpers\ResponseFormatter;
use \Mpdf\Mpdf as PDF; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportOeeController extends Controller
{
    public function getReportOee() {
        // init setup timer
        ini_set('max_execution_time', 3600);

        // set resulf filename pdf
        $resultNameReportOee = 'Oee-Report.pdf';

        // setup file pdf
        $document = new PDF([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);

        // $document->Image('public/logo.png', 0, 0, 210, 140, 'jpg', '', true, false);
        $imageLogo = '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/logo.png" width="70px"/>';
        $document->WriteHTML($imageLogo);
        $document->WriteHTML('<br>');
        $document->WriteHTML('<br>');

        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$resultNameReportOee.'"',
            'Content-Transfer-Encoding' => 'binary',
            'Accept-Ranges' => 'bytes'
        ];

        $oeeMaster = oeeMaster::with([
            'oeeDetail',
            'product',
            'machine',
        ])->findOrFail(1);

        // content file
        $document->SetDisplayMode('fullpage');
        
        $oeeMaster = oeeMaster::with([
            'oeeDetail',
            'product',
            'machine',
        ])->findOrFail(1);

        $tempExtruderSetup = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 0)
        ->where('oee_details.status', 0)
        ->where('oee_details.tempExtruderId',1)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);

        $tempExtruderShift1 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 1)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',1)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $tempExtruderShift2 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 2)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',1)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $tempExtruderShift3 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 3)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',1)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $dieHeatSetup = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 0)
        ->where('oee_details.status', 0)
        ->where('oee_details.tempExtruderId',2)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);

        $dieHeatShift1 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 1)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',2)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $dieHeatShift2 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 2)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',2)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $dieHeatShift3 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 3)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',2)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $adapterZoneSetup = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 0)
        ->where('oee_details.status', 0)
        ->where('oee_details.tempExtruderId',3)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);

        $adapterZoneShift1 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 1)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',3)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $adapterZoneShift2 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 2)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',3)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $adapterZoneShift3 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 3)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',3)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $oeeDownTime = OeeDownTime::where('oeeMasterId', $oeeMaster->id)->get();

        $oeeDetailShift1 = oeeDetail::with([
            'product',
            'machine',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 1)
        ->where('oee_details.status', 1)
        ->first([
            'oee_details.screwSpeed',
            'oee_details.dosingSpeed',
            'oee_details.mainDrive',
            'oee_details.vacumCylinder',
            'oee_details.meltPressure',
            'oee_details.meltTemperature',
            'oee_details.vacumTank',
            'oee_details.haulOffSpeed',
            'oee_details.waterTempVacumTank',
            'oee_details.waterPressure',
        ]);

        $oeeDetailShift2 = oeeDetail::with([
            'product',
            'machine',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 2)
        ->where('oee_details.status', 1)
        ->first();

        $oeeDetailShift3 = oeeDetail::with([
            'product',
            'machine',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 3)
        ->where('oee_details.status', 1)
        ->first();

        // for table style
        $document->simpleTables = true;

        // render to view
        $document->writeHTML(view('oee.pdf-reportOee', [
            'oeeMaster' => $oeeMaster,
            'oeeDetailShift1' => $oeeDetailShift1,
            'oeeDetailShift2' => $oeeDetailShift2,
            'oeeDetailShift3' => $oeeDetailShift3,
            'tempExtruderSetup' => $tempExtruderSetup,
            'tempExtruderShift1' => $tempExtruderShift1,
            'tempExtruderShift2' => $tempExtruderShift2,
            'tempExtruderShift3' => $tempExtruderShift3,
            'dieHeatSetup' => $dieHeatSetup,
            'dieHeatShift1' => $dieHeatShift1,
            'dieHeatShift2' => $dieHeatShift2,
            'dieHeatShift3' => $dieHeatShift3,
            'adapterZoneSetup' => $adapterZoneSetup,
            'adapterZoneShift1' => $adapterZoneShift1,
            'adapterZoneShift2' => $adapterZoneShift2,
            'adapterZoneShift3' => $adapterZoneShift3,
            'oeeDownTime' => $oeeDownTime,
            
        ]));
        
        // Save PDF on your public storage 
        Storage::disk('public')->put($resultNameReportOee, $document->Output($resultNameReportOee, "S"));

        // get file
        return Storage::disk('public')->download($resultNameReportOee, 'Request', $header);
    }

    public function fetchReportOee(Request $request) {
        $oeeMaster = oeeMaster::with([
            'oeeDetail',
            'machine',
        ])->findOrFail(1);

        $tempExtruderShift1 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 1)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',1)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $tempExtruderShift2 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 2)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',1)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $tempExtruderShift3 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 3)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',1)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $dieHeatShift1 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 1)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',2)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $dieHeatShift2 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 2)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',2)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $dieHeatShift3 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 3)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',2)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $adapterZoneShift1 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 1)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',3)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $adapterZoneShift2 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 2)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',3)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $adapterZoneShift3 = oeeDetail::with([
            'oeeMaster',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 3)
        ->where('oee_details.status', 1)
        ->where('oee_details.tempExtruderId',3)
        ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time']);
        
        $oeeDetailShift1 = oeeDetail::with([
            'product',
            'machine',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 1)
        ->where('oee_details.status', 1)
        ->first([
            'oee_details.screwSpeed',
            'oee_details.dosingSpeed',
            'oee_details.mainDrive',
            'oee_details.vacumCylinder',
            'oee_details.meltPressure',
            'oee_details.meltTemperature',
            'oee_details.vacumTank',
            'oee_details.haulOffSpeed',
            'oee_details.waterTempVacumTank',
            'oee_details.waterPressure',
        ]);

        $oeeDetailShift2 = oeeDetail::with([
            'product',
            'machine',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 2)
        ->where('oee_details.status', 1)
        ->first([
            'oee_details.screwSpeed',
            'oee_details.dosingSpeed',
            'oee_details.mainDrive',
            'oee_details.vacumCylinder',
            'oee_details.meltPressure',
            'oee_details.meltTemperature',
            'oee_details.vacumTank',
            'oee_details.haulOffSpeed',
            'oee_details.waterTempVacumTank',
            'oee_details.waterPressure',
        ]);

        $oeeDetailShift3 = oeeDetail::with([
            'product',
            'machine',
            'tempExtruder'
        ])->where('oeeMasterId', $oeeMaster->id)
        ->where('oee_details.shift', 3)
        ->where('oee_details.status', 1)
        ->first([
            'oee_details.screwSpeed',
            'oee_details.dosingSpeed',
            'oee_details.mainDrive',
            'oee_details.vacumCylinder',
            'oee_details.meltPressure',
            'oee_details.meltTemperature',
            'oee_details.vacumTank',
            'oee_details.haulOffSpeed',
            'oee_details.waterTempVacumTank',
            'oee_details.waterPressure',
        ]);

        $oeeDownTimeShift1 = OeeDownTime::with('oeeMaster')
        ->where('oeeMasterId', $oeeMaster->id)
        ->whereHas('oeeMaster', function($query) {
            $query->where('shift', 1);
        })
        // ->whereHas('oeeMaster', function($query) {
        //     $query->where('oeeDetail', 1);
        // })
        ->get();

        dd([
            // $oeeDetailShift2->screwSpeed
            // $oeeDownTimeShift1,
            $oeeDownTimeShift1[0]->oeeMaster->oeeDetail->shift
        ]);

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

    public function fetchReportOeeById(Request $request) {
        try {
            $masterId = $request->id;
            $date = $request->date;
            $machineCapacity = $request->machineCapacity;
            $productDiameter = $request->productDiameter;
            $productVariant = $request->productVariant;
            
            // get data detail by master id
            if ($masterId) {
                $fetchOeeDetail = oeeDetail::with([
                    'oeeMaster',
                    'product',
                    'machine',
                    'tempExtruder',
                ])->whereHas('oeeMaster', function($query) {
                    $query->where('oeeMasterId', 1);
                })->get();
                // results
                return ResponseFormatter::success(
                    $fetchOeeDetail,
                    'Oee Data successfully fetched'
                );
            }

            // default data detail
            $fetchOeeDetail = oeeDetail::with([
                'oeeMaster',
                'product',
                'machine',
                'tempExtruder',
            ]);

            // get data detail by date
            if ($date) {
                $fetchOeeDetail->where('date', 'like', '%'.$date.'%');
            }

            // get data detail by machine capacity
            if ($machineCapacity) {
                $fetchOeeDetail->whereHas('machine', function($query) {
                    $query->where('small', 'like', '%'.$machineCapacity.'%')->orWhere('medium', 'like', '%'.$machineCapacity.'%')->orWhere('large', 'like', '%'.$machineCapacity.'%');
                });
            }

            // get data detail by product diameter
            if ($productDiameter) {
                $fetchOeeDetail->where('product', function($query) {
                    $query->where('productDiameterId', 'like', '%'.$productDiameter.'%');
                });
            }

            // get data detail by product length
            if ($productLength) {
                $fetchOeeDetail->where('product', function($query) {
                    $query->where('productlengthId', 'like', '%'.$productLength.'%');
                });
            }
            
            // get data detail by product variant
            if ($productVariant) {
                $fetchOeeDetail->where('product', function($query) {
                    $query->where('productvariantId', 'like', '%'.$productVariant.'%');
                });
            }

            return ResponseFormatter::success(
                $fetchOeeDetail->get(),
                'Oee data successfully fetched'
            );
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                $th,
                'Oee data failed to fetch',
                404
            );
        }
        
    }
}
