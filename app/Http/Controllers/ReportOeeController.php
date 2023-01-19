<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\oeeMaster;
use App\Models\oeeDetail;
use Carbon\Carbon;

class ReportOeeController extends Controller
{
    public function getReportOee(oeeMaster $oeeMaster, oeeDetail $oeeDetail) {
        // oeeMaster $oeeMaster, oeeDetail $oeeDetail, Request $request
        $oeeMaster->findOrFail(1);
        $oeeDetail->where('oeeMasterId', $oeeMaster->id)->get();
        dd([
            $oeeMaster,
            $oeeDetail
        ]);
    }
}
