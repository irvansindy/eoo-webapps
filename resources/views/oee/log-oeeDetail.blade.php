<div class="modal fade" id="oeeDetailLogModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Log OEE Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" class="form-control" id="logOeeShift">
            <input type="hidden" class="form-control" id="logOeeMasterId">
            <div class="modal-body">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link tabView active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true" data-status='1'>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tabView" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false" data-status='2'>Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tabView" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false" data-status='3' >Messages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tabView" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false" data-status='4'>Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                <div class="container">
                                    <div class="row mt-4">
                                        <div class="col-md-3 mt-2">
                                            <label for="">Nama Product</label>
                                        </div>
                                        <div class="col-md-3">
                                            
                                            <input type="text" class="form-control" id="logProductName">
                                        </div>
                                        <div class="col-md-2 offset-1 mt-2">
                                            <label for="">Berat</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="logProductWeight">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                       <div class="col-md-12">
                                            <label>Adapter Zone</label>
                                            <table class="datatable-bordered nowrap display" id="oeeAdapterZoneTable">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center">Zone</th>
                                                        <th style="text-align:center">Nilai</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                       </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label>Temp Extruder</label>
                                            <table class="datatable-bordered nowrap display" id="oeeTempExtruderTable">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center">Zone</th>
                                                        <th style="text-align:center">Nilai</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label>Die Heat</label>
                                            <table class="datatable-bordered nowrap display" id="oeeDieHeatTable">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center">Zone</th>
                                                        <th style="text-align:center">Nilai</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row mt-4">
                                        <div class="col-md-3 mt-2">
                                            <label for="">SCREW SPEED (nS1)(rpm)</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"class="form-control" id="logScrewSpeed">
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label for="">DOSING SPEED</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"class="form-control" id="logDosingSpeed">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3 mt-2">
                                            <label for="">MAIN DRIVE (MS1)(%)</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"class="form-control" id="logMainDrive">
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label for="">VACUM CYLINDER (BAR)</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"class="form-control" id="logVacumCylinder">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3 mt-2">
                                            <label for="">MELT TEMPERATUR (ºC)</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"class="form-control" id="logMeltTemp">
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label for="">MELT PRESSURE (pM1)(BAR)</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"class="form-control" id="logMeltPress">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3 mt-2">
                                            <label for="">VACUM TANK (bar)</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"class="form-control" id="logVacumTank">
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label for="">HAUL OFF SPEED (M/min)</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"class="form-control" id="logHaulOffSpeed">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3 mt-2">
                                            <label for="">WATER TEMP. VACUM TANK (°C)</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"class="form-control" id="logWaterTemp">
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label for="">WATER PRESSURE (V. TANK )</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"class="form-control" id="logWaterPress">
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
              
            </div>
        </div>
    </div>
</div>