<div class="modal fade" id="addOeeDetailModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h4 class="modal-title">Add OEE Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="container">
                    <div class="form-group row">
                        <div class="col-md-2 mt-2">
                            <label for="">Produk</label>
                        </div>
                        <div class="col-md-7">
                            <select name="selectProduct" id="selectProduct" class="select2" style="width: 100%"></select>
                            <input type="hidden" class="form-control" id="oeeDetailId">
                            <input type="hidden" class="form-control" id="productId">
                            <span  style="color:red;" class="message_error text-red block productId_error"></span>
                        </div>
                       
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2 mt-2">
                            <label for="">Berat Standar</label>
                        </div>
                        <div class="col-sm-3 mt-1">
                            <input type="text" class="form-control" id="productWeight" readonly>
                        </div>
                        <div class="col-sm-1 mt-2">
                            <label for="">Kg/Btg</label>
                        </div>
                    </div>
                  
                    <h5>Adapter Zone</h5> 
                    <div id="adapterZone_container" class="form-group row">
                        
                    </div>    
                    <h5>Temp Extruder</h5> 
                    <div id="ext_container" class="form-group row">
                        
                    </div>    
                    <h5>Die Heat</h5> 
                    <div id="die_container" class="form-group row">
                        
                    </div>   
                    <div class="form-group row">
                        <div class="col-md-3  mt-2">
                            <label for="">SCREW SPEED (nS1)(rpm)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" class="form-control" id="dieLength">
                            <input type="hidden" class="form-control" id="extLength">
                            <input type="number" style="text-align:center" class="form-control" id="screwSpeed">
                            <span  style="color:red;" class="message_error text-red block screwSpeed_error"></span>
                        </div>

                        <div class="col-md-3  mt-2">
                            <label for="">DOSING SPEED</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="dosingSpeed">
                            <span  style="color:red;" class="message_error text-red block dosingSpeed_error"></span>
                        </div>
                    </div> 
                  
                    <div class="form-group row">
                        <div class="col-md-3  mt-2">
                            <label for="">MAIN DRIVE (MS1)(%)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="mainDrive">
                            <span  style="color:red;" class="message_error text-red block mainDrive_error"></span>
                        </div>

                        <div class="col-md-3  mt-2">
                            <label for="">VACUM CYLINDER (BAR)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="vacumCylinder">
                            <span  style="color:red;" class="message_error text-red block vacumCylinder_error"></span>
                        </div>
                    </div> 
                   
                    <div class="form-group row">
                        <div class="col-md-3  mt-2">
                            <label for="">MELT TEMPERATUR (ºC) </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="meltTemp">
                            <span  style="color:red;" class="message_error text-red block meltTemp_error"></span>
                        </div>
                        <div class="col-md-3  mt-2">
                            <label for="">MELT PRESSURE (pM1)(BAR) </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="meltPress">
                            <span  style="color:red;" class="message_error text-red block meltPress_error"></span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <div class="col-md-3  mt-2">
                            <label for="">VACUM TANK (bar) </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="vacumTank">
                            <span  style="color:red;" class="message_error text-red block vacumTank_error"></span>
                        </div>
                        <div class="col-md-3  mt-2">
                            <label for="">VACUM TANK 2 (bar) </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="vacumTank2">
                            <span  style="color:red;" class="message_error text-red block vacumTank2_error"></span>
                        </div>

                    </div> 
                    <div class="form-group row">
                        <div class="col-md-3  mt-2">
                            <label for="">VACUM TANK 3 (bar) </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="vacumTank3">
                            <span  style="color:red;" class="message_error text-red block vacumTank3_error"></span>
                        </div>
                        <div class="col-md-3  mt-2">
                            <label for="">VACUM TANK 4 (bar) </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="vacumTank4">
                            <span  style="color:red;" class="message_error text-red block vacumTank4_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3  mt-2">
                            <label for="">WATER TEMP. VACUM TANK (°C)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="waterTemp">
                            <span  style="color:red;" class="message_error text-red block waterTemp_error"></span>
                        </div>
                        <div class="col-md-3  mt-2">
                            <label for="">WATER TEMP. VACUM TANK 2 (°C)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="waterTemp2">
                            <span  style="color:red;" class="message_error text-red block waterTemp2_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3  mt-2">
                            <label for="">HAUL OFF SPEED (M/min)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="haulOffSpeed">
                            <span  style="color:red;" class="message_error text-red block haulOffSpeed_error"></span>
                        </div>
                        <div class="col-md-3  mt-2">
                            <label for="">WATER PRESSURE (V. TANK )</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" style="text-align:center" class="form-control" id="waterPress">
                            <span  style="color:red;" class="message_error text-red block waterPress_error"></span>
                        </div>
                    </div> 
                 
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnAddOeeDetail" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>