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
                    <input type="hidden" id="settingShiftMaster">
                    <input type="hidden" id="settingMasterId">
                    <input type="hidden" id="settingMachineDate">     
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
                                    <div class="card-header bg-maroon">
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
                                                    <label for="">Good Pipe Actual Kg</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" id="summaryGoodProductActualKg">
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Good Pipe Actual Pcs</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" id="summaryGoodProductActualPcs">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Scrap Pipe</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" id="summaryScrapPipe">
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Scrap Material</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" id="summaryScrapMaterial">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Material Use</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" id="summaryMaterialUse">
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Scrap Stoping</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" id="summaryScrapStoping">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Good Pipe Standart Kg</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" id="summaryGoodPipeStandartKg">
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label for="">Good PipeStandart Pcs</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" id="summaryGoodPipeStandartPcs">
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
                                    <div class="form-group row">
                                        <div class="col-md-3 mt-2">
                                            <label for="">IDLE (NO ORDER)</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="idle">
                                        </div>
                                        <div class="col-md-1 mt-2">
                                            <label for="">Jam</label>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <label for="">Setup Dies</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="setupDies">
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
                                            <input type="number" class="form-control" id="setupRoutage">
                                        </div>
                                        <div class="col-md-1 mt-2">
                                            <label for="">Jam</label>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <label for="">No Material</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="noMaterial">
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
                                            <input type="number" class="form-control" id="waitingForSparepart">
                                        </div>
                                        <div class="col-md-1 mt-2">
                                            <label for="">Jam</label>
                                        </div>
                                    </div>
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
                                    <div class="form-group row" id="settingDeffectContainer">
 
                                    </div>
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