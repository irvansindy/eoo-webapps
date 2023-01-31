<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\oeeMaster;
use App\Models\oeeDetail;
use App\Models\OeeDownTime;
use App\Models\OeeDefectLog;
use App\Models\OeeDefectLogProduct;
use Carbon\Carbon;
use App\Helpers\ResponseFormatter;
use \Mpdf\Mpdf as PDF; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportOeeController extends Controller
{
    public function getReportOeeWrong() {
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

        $oeeDownTimeShift1 = OeeDownTime::with('oeeMaster')
        ->where('oeeMasterId', $oeeMaster->id)
        ->whereHas('oeeMaster', function($query) {
            $query->where('shift', 1);
        })->get([
            'oee_down_times.idle',
            'oee_down_times.setupRoutage',
            'oee_down_times.waitingForSparepart',
            'oee_down_times.setupDies',
            'oee_down_times.noMaterial',
            DB::raw("SUM(oee_down_times.idle + oee_down_times.setupRoutage + oee_down_times.waitingForSparepart + oee_down_times.setupDies + oee_down_times.noMaterial) as totalDownTime")
        ]);

        $oeeDownTimeShift2 = OeeDownTime::with('oeeMaster')
        ->where('oeeMasterId', $oeeMaster->id)
        ->whereHas('oeeMaster', function($query) {
            $query->where('shift', 2);
        })->get([
            'oee_down_times.idle',
            'oee_down_times.setupRoutage',
            'oee_down_times.waitingForSparepart',
            'oee_down_times.setupDies',
            'oee_down_times.noMaterial',
            DB::raw("SUM(oee_down_times.idle + oee_down_times.setupRoutage + oee_down_times.waitingForSparepart + oee_down_times.setupDies + oee_down_times.noMaterial) as totalDownTime")
        ]);
        $oeeDownTimeShift3 = OeeDownTime::with('oeeMaster')
        ->where('oeeMasterId', $oeeMaster->id)
        ->whereHas('oeeMaster', function($query) {
            $query->where('shift', 3);
        })->get([
            'oee_down_times.idle',
            'oee_down_times.setupRoutage',
            'oee_down_times.waitingForSparepart',
            'oee_down_times.setupDies',
            'oee_down_times.noMaterial',
            DB::raw("SUM(oee_down_times.idle + oee_down_times.setupRoutage + oee_down_times.waitingForSparepart + oee_down_times.setupDies + oee_down_times.noMaterial) as totalDownTime")
        ]);

        // oee Defect
        $oeeDefectLogShift1 = OeeDefectLog::with(['OeeDefect', 'oeeMaster'])
        ->where('oeeMasterId', $oeeMaster->id)
        ->whereHas('oeeMaster', function($query) {
            $query->where('shift', 1);
        })
        ->get();
        
        $oeeDefectLogShift2 = OeeDefectLog::with(['OeeDefect', 'oeeMaster'])
        ->where('oeeMasterId', $oeeMaster->id)
        ->whereHas('oeeMaster', function($query) {
            $query->where('shift', 2);
        })
        ->get();
        
        $oeeDefectLogShift3 = OeeDefectLog::with(['OeeDefect', 'oeeMaster'])
        ->where('oeeMasterId', $oeeMaster->id)
        ->whereHas('oeeMaster', function($query) {
            $query->where('shift', 3);
        })
        ->get();

        // oee Remark
        $remarkShift1 = oeeMaster::where([
            'id' => 1,
            'shift' => 1
        ])->get([
            'remark',
            'shift'
        ]);

        $remarkShift2 = oeeMaster::where([
            'id' => 1,
            'shift' => 2
        ])->get([
            'remark',
            'shift'
        ]);

        $remarkShift3 = oeeMaster::where([
            'id' => 1,
            'shift' => 3
        ])->get([
            'remark',
            'shift'
        ]);

        // for table style
        $document->simpleTables = true;

        // parsing to view
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
            'oeeDownTimeShift1' => $oeeDownTimeShift1,
            'oeeDownTimeShift2' => $oeeDownTimeShift2,
            'oeeDownTimeShift3' => $oeeDownTimeShift3,
            'oeeDefectLogShift1' => $oeeDefectLogShift1,
            'oeeDefectLogShift2' => $oeeDefectLogShift2,
            'oeeDefectLogShift3' => $oeeDefectLogShift3,
            'remarkShift1' => $remarkShift1,
            'remarkShift2' => $remarkShift2,
            'remarkShift3' => $remarkShift3,
        ]));
        
        // Save PDF on your public storage 
        Storage::disk('public')->put($resultNameReportOee, $document->Output($resultNameReportOee, "S"));

        // get file
        return Storage::disk('public')->download($resultNameReportOee, 'Request', $header);
    }

    // public function fetchReportOee(Request $request) {
    public function getReportOee(Request $request) {
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
        // content file
        $document->SetDisplayMode('fullpage');

        $getOeeMaster = oeeMaster::with([
            'oeeDetail',
            'machine',
        ])
        // ->where('machineId', $request->id)
        // ->where('created_at', 'like', '%'.$request->date.'%')
        // ->get();
        ->where('machineId', 1)
        ->where('created_at', 'like', '%2023-01-25%')
        ->get();

        $oeeMaster = [];
        $oeeTempExtruder = [];
        $oeeAdapterZone = [];
        $oeeDieHeat = [];
        $oeeDetail = [];
        $oeeDownTime = [];
        $oeeDefect = [];
        $oeeRemark = oeeMaster::where('machineId', 1)
        ->where('created_at', 'like', '%2023-01-25%')
        ->get();

        foreach ($getOeeMaster as $oeeMasterData) {
            // get data master
            array_push($oeeMaster, $oeeMasterData);

            // get data oee extruder
            $getOeeTempExtruder = oeeDetail::with([
                'oeeMaster',
                'tempExtruder'
            ])
            ->where('oeeMasterId', $oeeMasterData->id)
            ->where('oee_details.tempExtruderId',1)
            ->orderBy('shift', 'asc')
            ->orderBy('status', 'asc')
            // ->sortBy('status')
            ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time', 'oee_details.shift', 'oee_details.status', 'oee_details.oeeMasterId']);
            array_push($oeeTempExtruder, $getOeeTempExtruder);

            // get data adapter zone
            $getOeeAdapterZone = oeeDetail::with([
                'oeeMaster',
                'tempExtruder'
            ])
            ->where('oeeMasterId', $oeeMasterData->id)
            ->where('oee_details.tempExtruderId',3)
            ->orderBy('shift', 'asc')
            ->orderBy('status', 'asc')
            ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time', 'oee_details.shift', 'oee_details.status', 'oee_details.oeeMasterId']);
            array_push($oeeAdapterZone, $getOeeAdapterZone);

            // get data die heating
            $getOeeDietHeat = oeeDetail::with([
                'oeeMaster',
                'tempExtruder'
            ])
            ->where('oeeMasterId', $oeeMasterData->id)
            ->where('oee_details.tempExtruderId',2)
            ->orderBy('shift', 'asc')
            ->orderBy('status', 'asc')
            ->get(['oee_details.zoneNumber', 'oee_details.oeeDetailValue', 'oee_details.time', 'oee_details.shift', 'oee_details.status', 'oee_details.oeeMasterId']);
            array_push($oeeDieHeat, $getOeeDietHeat);

            // get data detail
            $getOeeDetail = oeeDetail::with([
                'product',
                'machine',
                'tempExtruder'
            ])->where('oeeMasterId', $oeeMasterData->id)
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
            array_push($oeeDetail, $getOeeDetail);

            // get oee down time
            $getOeeDownTime = OeeDownTime::with('oeeMaster')
            ->where('oeeMasterId', $oeeMasterData->id)
            ->get([
                'oee_down_times.idle',
                'oee_down_times.setupRoutage',
                'oee_down_times.waitingForSparepart',
                'oee_down_times.setupDies',
                'oee_down_times.noMaterial',
                DB::raw("SUM(oee_down_times.idle + oee_down_times.setupRoutage + oee_down_times.waitingForSparepart + oee_down_times.setupDies + oee_down_times.noMaterial) as totalDownTime")
            ]);
            array_push($oeeDownTime, $getOeeDownTime);

            // get oee defect
            $getOeeDefectLog = OeeDefectLog::with(['OeeDefect', 'oeeMaster'])
            ->where('oeeMasterId', $oeeMasterData->id)
            ->get();
            array_push($oeeDefect, $getOeeDefectLog);
        }
        // dd($oeeMaster[1]['oeeDetail']['product']['productType']->productType);
        // dd(count($oeeTempExtruder[0]));
        // response json
        // return ResponseFormatter::success(
        //     [
        //         'oeeMaster' => $oeeMaster,
        //         'oeeDetail' => $oeeDetail,
        //         'oeeTempExtruder' => $oeeTempExtruder,
        //         'oeeAdapterZone' => $oeeAdapterZone,
        //         'oeeDieHeat' => $oeeDieHeat,
        //         'oeeDownTime' => $oeeDownTime,
        //         'oeeDefect' => $oeeDefect,
        //         'oeeRemark' => $oeeRemark,
        //     ],
        //     'Oee data successfully fetched'
        // );

        // for table style
        $document->simpleTables = true;

        // parsing to view
        $document->writeHTML(view('oee.reportOee-pdf', [
            'oeeMaster' => $oeeMaster,
            'oeeTempExtruder' => $oeeTempExtruder,
            'oeeAdapterZone' => $oeeAdapterZone,
            'oeeDieHeat' => $oeeDieHeat,
            'oeeDetail' => $oeeDetail,
            'oeeDownTime' => $oeeDownTime,
            'oeeDefect' => $oeeDefect,
            'oeeRemark' => $oeeRemark,
        ]));

        // Save PDF on your public storage 
        Storage::disk('public')->put($resultNameReportOee, $document->Output($resultNameReportOee, "S"));

        // get file
        return Storage::disk('public')->download($resultNameReportOee, 'Request', $header);
    }

    public function getReportOee2(Request $request) {
        try {
            $machineId = $request->id;
            $date = $request->date;

            $fetchOeeReportData = oeeMaster::with([
                'machine',
                'oeeDetail'
            ])
            ->where('machineId', $machineId)
            ->where('created_at', 'like', '%'.$date.'%')
            ->get();
            
            foreach ($fetchOeeReportData as $oeeReport) {
                dd($oeeReport->oeeDetail->product->productName);
            }

            return ResponseFormatter::success(
                $fetchOeeReportData,
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
