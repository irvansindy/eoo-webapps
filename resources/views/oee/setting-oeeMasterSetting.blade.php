<div class="modal fade" id="oeeMasterSetting">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Setting OEE Master</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="container">
                <div class="card card-dark">
                    <div class="card-header bg-maroon">
                        <div class="card-title text-white">Machine Info</div>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="form-group row">
                                <div class="col-md-3 mt-2">
                                   <label for="">Extruder</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text"  style="text-align: center" class="form-control" readonly  disabled id="settingMachineName">
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label for="">Machine Number</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text"  style="text-align: center" class="form-control" readonly disabled id="settingMachineNumber">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3 mt-2">
                                    <label for="">Shift</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" style="text-align: center" id="settingShiftMaster" readonly disabled class="form-control">
                                </div>
                                <div class="col-md-3 mt-2">
                                   <label for="">Machine Date</label>
                                </div>
                                <div class="col-md-3">
                                    
                                    <input type="date"  style="text-align: center" readonly disabled class="form-control" id="settingMachineDate">
                                </div>
                            </div>
                            <input type="hidden" id="settingMasterId">
                        </div>
                    </div>
                </div>
                        <div class="card card-dark">
                            <div class="card-header bg-maroon">
                                <div class="card-title text-white">Product List</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                                {{-- SUmmary Product --}}
                                <div class="card card-dark" id="summaryProduct">
                                    <div class="card-header bg-info">
                                        <div class="card-title text-white">Summary Product</div>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Good Pipe Actual Pcs</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" style="text-align:center" class="form-control" id="summaryGoodProductActualPcs" readonly>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Good Pipe Actual Kg</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" style="text-align:center" class="form-control" id="summaryGoodProductActualKg" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Scrap Pipe</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" style="text-align:center" class="form-control" id="summaryScrapPipe" readonly>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Scrap Material</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" style="text-align:center" class="form-control" id="summaryScrapMaterial" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Material Use</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" style="text-align:center" class="form-control" id="summaryMaterialUse" readonly>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Scrap Stoping</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" style="text-align:center" class="form-control" id="summaryScrapStoping" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Good PipeStandart Pcs</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" style="text-align:center" class="form-control" id="summaryGoodPipeStandartPcs"readonly>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Good Pipe Standart Kg</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" style="text-align:center" class="form-control" id="summaryGoodPipeStandartKg" readonly>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- SUmmary Product --}}
                                <div id="settingProductList" class="mt-2">
                            
                                </div>  
                            </div>
                        </div>
                        <div class="card card-dark">
                            <div class="card-header bg-maroon">
                                <div class="card-title text-white">Down Time</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                    <div class="container">
                                        <div class="card card-dark" id="summaryDownTime">
                                            <div class="card-header bg-info">
                                                <div class="card-title text-white">Summary Down Time</div>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="form-group row">
                                                        <div class="col-md-3 mt-2">
                                                            <label for="">IDLE (NO ORDER)</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" readOnly style="text-align:center" class="form-control" id="idleSummary">
                                                        </div>
                                                        <div class="col-md-1 mt-2">
                                                            <label for="">Jam</label>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <label for="">Setup Dies</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" readOnly style="text-align:center" class="form-control" id="setupDiesSummary">
                                                        </div>
                                                        <div class="col-md-1 mt-2">
                                                            <label for="">Jam</label>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="form-group row">
                                                        <div class="col-md-3 mt-2">
                                                            <label for="">Setup Routage</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" readOnly style="text-align:center" class="form-control" id="setupRoutageSummary">
                                                        </div>
                                                        <div class="col-md-1 mt-2">
                                                            <label for="">Jam</label>
                                                        </div>
                                                        <div class="col-md-3 mt-2">
                                                            <label for="">No Material</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" readOnly style="text-align:center" class="form-control" id="noMaterialSummary">
                                                        </div>
                                                        <div class="col-md-1 mt-2">
                                                            <label for="">Jam</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-3 mt-2">
                                                            <label for="">Waiting For Sparepart</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" readOnly style="text-align:center" class="form-control" id="waitingForSparepartSummary">
                                                        </div>
                                                        <div class="col-md-1 mt-2">
                                                            <label for="">Jam</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  <div class="container" id="settingDownTimeContainer">
                                  
                                  </div>
                            </div>
                        </div>   
                        <div class="card card-dark">
                            <div class="card-header bg-maroon">
                                <div class="card-title text-white">Defect</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                            <div class="container">
                                <div class="card card-dark" id="summaryDefect">
                                    <div class="card-header bg-info">
                                        <div class="card-title text-white">Summary Defect</div>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="form-group row" id="settingDefectSummary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="container"id="settingDeffectContainer">
                                </div>

                            </div>
                        </div>
                        <div class="card card-dark">
                            <div class="card-header bg-maroon">
                                <div class="card-title text-white">Remark</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row" style="margin-top:-10px">
                                    <div class="col-md-2 mt-2">
                                        <label>Remark</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="settingRemark" rows="3"></textarea>
                                        <span  style="color:red;" class="message_error text-red block settingRemark_error"></span>
                                    </div>
                                </div>    
                            </div>
                        </div>
                   
               </div>

            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnUpdateSettingOeeHeader" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>