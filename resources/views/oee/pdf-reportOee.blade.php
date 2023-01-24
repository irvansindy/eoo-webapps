<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Machine Report</title>

    <style>
        * {
        box-sizing: border-box;
        }

        table {
        /* border-collapse: collapse; */
        border-spacing: 0;
        width: 100%;
        border: 1px;
        font-size: 12px;
        }
        td.table-cell-edit{
            background-color: lightgoldenrodyellow !important;
        }
        th, td {
        text-align: left;
        padding: 5px;
        }
        .container {
        padding: 2px 16px;
        }
        p{
            font-size: 12px;
        }
        * {
        box-sizing: border-box;
        }

        /* Create four equal columns that floats next to each other */
        .column {
        float: left;
        width: 20%;
        padding: 10px;
        height: auto; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
        content: "";
        display: table;
        clear: both;
        }
        .table-report {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }
        .table-report td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div>
        {{-- header --}}
        <table class="table-report">
            <tr>
                <td>Date : {{ $oeeMaster['oeeDetail']->date }}</td>
                <td>Product : {{ $oeeMaster['oeeDetail']['product']->productName.' - '.$oeeMaster['oeeDetail']['product']['productType']->productType. ' '.$oeeMaster['oeeDetail']['product']['productDiameter']->productDiameter.' '.$oeeMaster['oeeDetail']['product']['productDiameter']->productDiameterUnit. ' x '. $oeeMaster['oeeDetail']['product']['productLength']->productLength.' '.$oeeMaster['oeeDetail']['product']['productLength']->productLengthUnit}}</td>
            </tr>
            <tr>
                <td>Machine No : {{ $oeeMaster['machine']->machineNumber }}</td>
                <td>Weight/Pcs : {{ $oeeMaster['oeeDetail']['product']->productWeightStandard }}</td>
            </tr>
            <tr>
                <td>Extruder : {{ $oeeMaster['oeeDetail']['tempExtruder']->name }}</td>
                <td>Od x Walthickness : </td>
            </tr>
            <tr>
                <td>Formulation : {{ $oeeMaster['oeeDetail']['product']->productFormula }}</td>
                <td>Die Hied : {{ $oeeMaster['machine']['DieHead']->dieHeadName }}</td>
            </tr>
        </table>
        <br>
        {{-- data extruder --}}
        <div class="row">
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>Zone Extruder</td>
                    </tr>
                    @forelse ($tempExtruderSetup as $tempExtruderSetup)
                        <tr>
                            <td>{{ $tempExtruderSetup->zoneNumber }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>Data Kosong</td>
                        </tr>
                    @endforelse
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>07:30 - 14:00</td>
                    </tr>
                    @forelse ($tempExtruderShift1 as $extruderShift1)
                    <tr>
                        <td>{{ number_format($extruderShift1->oeeDetailValue, 1) }}</td>
                    </tr>
                    @empty
                        <td>Data Kosong</td>
                    @endforelse
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>15:30 - 22:00</td>
                    </tr>
                    @forelse ($tempExtruderShift2 as $tempExtruderShift2)
                    <tr>
                        <td>{{ number_format($tempExtruderShift2->oeeDetailValue, 1) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>Data Kosong</td>
                    </tr>
                    @endforelse
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>23:30 - 06:00</td>
                    </tr>
                    @forelse ($tempExtruderShift3 as $tempExtruderShift3)
                    <tr>
                        <td>{{ number_format($tempExtruderShift3->oeeDetailValue, 1) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>Data Kosong</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
        {{-- end data extruder --}}
        <br>
        {{-- data adapter zone --}}
        <div class="row">
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>Adapter Zone</td>
                    </tr>
                    @forelse ($adapterZoneSetup as $adapterZoneSetup)
                        <tr>
                            <td>{{ $adapterZoneSetup->zoneNumber }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>Data Kosong</td>
                        </tr>
                    @endforelse
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>07:30 - 14:00</td>
                    </tr>
                    @forelse ($adapterZoneShift1 as $adapterZoneShift1)
                    <tr>
                        <td>{{ number_format($adapterZoneShift1->oeeDetailValue, 1) }}</td>
                    </tr>
                    @empty
                        <td>Data Kosong</td>
                    @endforelse
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>15:30 - 22:00</td>
                    </tr>
                    @forelse ($adapterZoneShift2 as $adapterZoneShift2)
                    <tr>
                        <td>{{ number_format($adapterZoneShift2->oeeDetailValue, 1) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>Data Kosong</td>
                    </tr>
                    @endforelse
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>23:30 - 06:00</td>
                    </tr>
                    @forelse ($adapterZoneShift3 as $adapterZoneShift3)
                    <tr>
                        <td>{{ number_format($adapterZoneShift3->oeeDetailValue, 1) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>Data Kosong</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
        {{-- end data adapter zone --}}
        <br>
        {{-- data die heating --}}
        <div class="row">
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>Die Heating</td>
                    </tr>
                    @forelse ($dieHeatSetup as $dieHeatSetup)
                        <tr>
                            <td>{{ $dieHeatSetup->zoneNumber }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>Data Kosong</td>
                        </tr>
                    @endforelse
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>07:30 - 14:00</td>
                    </tr>
                    @forelse ($dieHeatShift1 as $dieHeatShift1)
                    <tr>
                        <td>{{ number_format($dieHeatShift1->oeeDetailValue, 1) }}</td>
                    </tr>
                    @empty
                        <td>Data Kosong</td>
                    @endforelse
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>15:30 - 22:00</td>
                    </tr>
                    @forelse ($dieHeatShift2 as $dieHeatShift2)
                    <tr>
                        <td>{{ number_format($dieHeatShift2->oeeDetailValue, 1) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>Data Kosong</td>
                    </tr>
                    @endforelse
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>23:30 - 06:00</td>
                    </tr>
                    @forelse ($dieHeatShift3 as $dieHeatShift3)
                    <tr>
                        <td>{{ number_format($dieHeatShift3->oeeDetailValue, 1) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>Data Kosong</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
        {{-- end data die heating --}}
        <br>
        {{-- data detail shift 1 --}}
        <table class="table-report">
            <tr>
                <td>#</td>
                <td>Shift 1</td>
                <td>Shift 2</td>
                <td>Shift 3</td>
            </tr>
            <tr>
                <td>Screw Speed</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->screwSpeed  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->screwSpeed }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->screwSpeed  }}</td>
            </tr>
            <tr>
                <td>Dosing Speed</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->dosingSpeed  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->dosingSpeed }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->dosingSpeed  }}</td>
            </tr>
            <tr>
                <td>Main Drive</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->mainDrive  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->mainDrive }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->mainDrive  }}</td>
            </tr>
            <tr>
                <td>Vacum Cylinder</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->vacumCylinder  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->vacumCylinder }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->vacumCylinder  }}</td>
            </tr>
            <tr>
                <td>Melt Pressure</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->meltPressure  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->meltPressure }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->meltPressure  }}</td>
            </tr>
            <tr>
                <td>Vacum Tank</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->vacumTank  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->vacumTank }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->vacumTank  }}</td>
            </tr>
            <tr>
                <td>Water Temp Vacum Tank</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->waterTempVacumTank  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->waterTempVacumTank }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->waterTempVacumTank  }}</td>
            </tr>
            <tr>
                <td>Water Pressure</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->waterPressure  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->waterPressure }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->waterPressure  }}</td>
            </tr>
        </table>
        {{-- end data detail shift 1 --}}
        <br>
        {{-- data down time --}}
        <table class="table-report">
            <tr>
                <td>#</td>
                <td>Shift 1</td>
                <td>Shift 2</td>
                <td>Shift 3</td>
            </tr>
            <tr>
                <td>Screw Speed</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->screwSpeed  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->screwSpeed }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->screwSpeed  }}</td>
            </tr>
            <tr>
                <td>Dosing Speed</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->dosingSpeed  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->dosingSpeed }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->dosingSpeed  }}</td>
            </tr>
            <tr>
                <td>Main Drive</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->mainDrive  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->mainDrive }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->mainDrive  }}</td>
            </tr>
            <tr>
                <td>Vacum Cylinder</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->vacumCylinder  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->vacumCylinder }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->vacumCylinder  }}</td>
            </tr>
            <tr>
                <td>Melt Pressure</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->meltPressure  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->meltPressure }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->meltPressure  }}</td>
            </tr>
            <tr>
                <td>Vacum Tank</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->vacumTank  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->vacumTank }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->vacumTank  }}</td>
            </tr>
            <tr>
                <td>Water Temp Vacum Tank</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->waterTempVacumTank  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->waterTempVacumTank }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->waterTempVacumTank  }}</td>
            </tr>
            <tr>
                <td>Water Pressure</td>
                <td>{{ $oeeDetailShift1 == null ? '0' : $oeeDetailShift1->waterPressure  }}</td>
                <td>{{ $oeeDetailShift2 == null ? '0' : $oeeDetailShift2->waterPressure }}</td>
                <td>{{ $oeeDetailShift3 == null ? '0' : $oeeDetailShift3->waterPressure  }}</td>
            </tr>
        </table>
        {{-- end data down time --}}

    </div>
</body>
</html>