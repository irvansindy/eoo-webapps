<div class="modal fade" id="addMasterMachine">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-orange">
                <h4 class="modal-title text-white">Add Machine</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="container">
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Nama</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="machineName">
                            <span  style="color:red;" class="message_error text-red block machineName_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Tipe</label>
                        </div>
                        <div class="col-md-8">
                            <select name="" id="selectTypeMachine" class="form-control select2" style="width:100%">
                                <option value="">Pilih Tipe</option>
                                <option value="1">HDPE</option>
                                <option value="2">PVC</option>
                            </select>
                            <input type="hidden" class="form-control" id="machineType">
                            <span  style="color:red;" class="message_error text-red block machineType_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Lokasi</label>
                        </div>
                        <div class="col-md-8">
                            <select name="" id="selectMachineOffice" class="form-control select2" style="width:100%">
                            </select>
                            <input type="hidden" class="form-control" id="machineOfficeId">
                            <span  style="color:red;" class="message_error text-red block machineOfficeId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Kapasitas (Kg/Jam)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" placeholder="Small" class="form-control" id="machineSmall">
                            <span  style="color:red;" class="message_error text-red block machineSmall_error"></span>
                        </div>
                        <div class="col-md-3">
                            <input type="number" placeholder="Medium" class="form-control" id="machineMedium">
                            <span  style="color:red;" class="message_error text-red block machineMedium_error"></span>
                        </div>
                        <div class="col-md-3">
                            <input type="number" placeholder="Large" class="form-control" id="machineLarge">
                            <span  style="color:red;" class="message_error text-red block machineLarge_error"></span>
                        </div>
                    </div>
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnAddMachine" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>