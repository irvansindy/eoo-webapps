
<div class="modal fade" id="oeeEditLogModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Update OEE Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="container">
                <div class="form-group row">
                    <div class="col-md-2 mt-2 offset-7">
                        <label for="">Progress</label>
                    </div>
                    <div class="col-md-3">
                    <select name="selectStatusUpdate" class="select2" style="width: 100%" id="selectStatusUpdate"></select>
                        <input type="hidden" class="form-control" id="statusIdUpdate">
                    </div>
                </div>
                    <div class="form-group row">
                        <div class="col-md-2 mt-2">
                            <label for="">Nama Produk</label>
                        </div>
                        <div class="col-md-6">
                            <select name="selectProductUpdate" id="selectProductUpdate" class="select2" style="width: 100%"></select>
                            <input type="hidden" class="form-control" id="oeeDetailIdUpdate">
                            <input type="hidden" class="form-control" id="oeeDateUpdate">
                            <input type="hidden" class="form-control" id="oeeShiftUpdate">
                            <input type="hidden" class="form-control" id="productIdUpdate">
                            <span  style="color:red;" class="message_error text-red block productIdUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2 mt-2">
                            <label for="">Berat Standar</label>
                        </div>
                        <div class="col-sm-3 mt-1">
                            <input type="text" class="form-control" id="productWeightUpdate" readonly>
                        </div>
                        <div class="col-sm-1 mt-2">
                            <label for="">Kg</label>
                        </div>
                    </div>
                  
                    <h5>Adapter Zone</h5> 
                    <div id="adapterZone_containerUpdate" class="form-group row">
                        
                    </div>    
                    <h5>Temp Extruder</h5> 
                    <div id="ext_containerUpdate" class="form-group row">
                        
                    </div>    
                    <h5>Die Heat</h5> 
                    <div id="die_containerUpdate" class="form-group row">
                        
                    </div>   
                    <div class="form-group row">
                        <div class="col-md-3  mt-2">
                            <label for="">SCREW SPEED (nS1)(rpm)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" class="form-control" id="dieLengthUpdate">
                            <input type="hidden" class="form-control" id="extLengthUpdate">
                            <input type="text" class="form-control" id="screwSpeedUpdate">
                            <span  style="color:red;" class="message_error text-red block screwSpeedUpdate_error"></span>
                        </div>

                        <div class="col-md-3  mt-2">
                            <label for="">DOSING SPEED</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="dosingSpeedUpdate">
                            <span  style="color:red;" class="message_error text-red block dosingSpeedUpdate_error"></span>
                        </div>
                    </div> 
                  
                    <div class="form-group row">
                        <div class="col-md-3  mt-2">
                            <label for="">MAIN DRIVE (MS1)(%)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="mainDriveUpdate">
                            <span  style="color:red;" class="message_error text-red block mainDriveUpdate_error"></span>
                        </div>

                        <div class="col-md-3  mt-2">
                            <label for="">VACUM CYLINDER (BAR)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="vacumCylinderUpdate">
                            <span  style="color:red;" class="message_error text-red block vacumCylinderUpdate_error"></span>
                        </div>
                    </div> 
                   
                    <div class="form-group row">
                        <div class="col-md-3  mt-2">
                            <label for="">MELT TEMPERATUR (ºC) </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="meltTempUpdate">
                            <span  style="color:red;" class="message_error text-red block meltTempUpdate_error"></span>
                        </div>
                        <div class="col-md-3  mt-2">
                            <label for="">MELT PRESSURE (pM1)(BAR) </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="meltPressUpdate">
                            <span  style="color:red;" class="message_error text-red block meltPressUpdate_error"></span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <div class="col-md-3  mt-2">
                            <label for="">VACUM TANK (bar) </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="vacumTankUpdate">
                            <span  style="color:red;" class="message_error text-red block vacumTankUpdate_error"></span>
                        </div>
                        
                        <div class="col-md-3  mt-2">
                            <label for="">HAUL OFF SPEED (M/min)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="haulOffSpeedUpdate">
                            <span  style="color:red;" class="message_error text-red block haulOffSpeedUpdate_error"></span>
                        </div>
                    </div> 
                    <div class="form-group row">
                       
                        <div class="col-md-3  mt-2">
                            <label for="">WATER TEMP. VACUM TANK (°C)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="waterTempUpdate">
                            <span  style="color:red;" class="message_error text-red block waterTempUpdate_error"></span>
                        </div>
                        <div class="col-md-3  mt-2">
                            <label for="">WATER PRESSURE (V. TANK )</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="waterPressUpdate">
                            <span  style="color:red;" class="message_error text-red block waterPressUpdate_error"></span>
                        </div>
                    </div> 
                 
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnUpdateOeeDetail" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>