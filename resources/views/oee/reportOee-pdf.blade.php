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
        width: 25%;
        /* padding: 10px; */
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
                {{ date('F d, Y', strtotime($oeeMaster[0]->created_at)) }}
                @php
                    // dd($oeeMaster[0]->created_at->timestamp);
                @endphp
                <td>Date : {{ $oeeMaster[0]['oeeDetail']->date }}</td>
                <td>
                    @forelse ($oeeMaster as $oeeMasterData)
                    Produk {{ $loop->iteration }} : {{ $oeeMasterData['oeeDetail']['product']->productName.' - '.$oeeMasterData['oeeDetail']['product']['productType']->productType. ' '.$oeeMasterData['oeeDetail']['product']['productDiameter']->productDiameter.' '.$oeeMasterData['oeeDetail']['product']['productDiameter']->productDiameterUnit. ' x '. $oeeMasterData['oeeDetail']['product']['productLength']->productLength.' '.$oeeMasterData['oeeDetail']['product']['productLength']->productLengthUnit }}
                    @empty
                        Produk Kosong
                    @endforelse
                </td>
            </tr>
            <tr>
                <td>Machine No : {{ $oeeMaster[0]['machine']->machineNumber }}</td>
                <td>Weight/Pcs : {{ $oeeMaster[0]['oeeDetail']['product']->productWeightStandard }}</td>
            </tr>
            <tr>
                <td>Extruder : {{ $oeeMaster[0]['oeeDetail']['tempExtruder']->name }}</td>
                <td>Od x Walthickness : </td>
            </tr>
            <tr>
                <td>Formulation : {{ $oeeMaster[0]['oeeDetail']['product']->productFormula }}</td>
                <td>Die Hied : {{ $oeeMaster[0]['machine']['DieHead']->dieHeadName }}</td>
            </tr>
        </table>
        {{-- end header --}}
        <br>
        {{-- data extruder --}}
        <div class="row">
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td colspan="2">Time</td>
                    </tr>
                    <tr>
                        <td colspan="2">Temp. Extruder</td>
                    </tr>
                    @foreach ($oeeTempExtruder[0] as $extruder)
                        <tr>
                            <td colspan="2">Zone : {{ $loop->iteration }}</td>
                        </tr>
                    @endforeach
                    
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>Shift 1</td>
                    </tr>
                    <tr>
                        <td>07:30 - 14:00</td>
                    </tr>
                    @foreach ($oeeTempExtruder[0]->sortBy('zoneNumber') as $extruderShift1)
                    <tr>
                        <td>
                            {{ $extruderShift1->oeeDetailValue }}
                        </td>
                        
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>Shift 2</td>
                    </tr>
                    <tr>
                        <td>15:30 - 22:00</td>
                    </tr>
                    @foreach ($oeeTempExtruder[1]->sortBy('zoneNumber') as $extruderShift2)
                    <tr>
                        <td>
                            {{ $extruderShift2->oeeDetailValue }}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="column" style="background-color:#fff;">
                <table class="table-report">
                    <tr>
                        <td>Shift 3</td>
                    </tr>
                    <tr>
                        <td>23:30 - 06:00</td>
                    </tr>
                    @if (array_key_exists(2, $oeeTempExtruder))
                        @foreach ($oeeTempExtruder[2]->sortBy('zoneNumber') as $extruderShift2)
                        <tr>
                            <td>
                                {{ $extruderShift2->oeeDetailValue }}
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td>Data Kosong</td>
                    </tr>
                </table>
            </div>
        </div>
        {{-- end data extruder --}}
    </div>
</body>
</html>