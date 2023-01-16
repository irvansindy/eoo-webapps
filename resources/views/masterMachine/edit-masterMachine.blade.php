<div class="modal fade" id="editMachine">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Edit Machine</h4>
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
                            <input type="hidden" class="form-control" id="machineId">
                            <input type="text" class="form-control" id="machineNameUpdate">
                            <span  style="color:red;" class="message_error text-red block machineNameUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Tipe</label>
                        </div>
                        <div class="col-md-8">
                            <select name="" id="selectTypeMachineUpdate" class="form-control select2" style="width:100%">
                                <option value="">Pilih Tipe</option>
                                <option value="1">HDPE</option>
                                <option value="2">PVC</option>
                            </select>
                            <input type="hidden" class="form-control" id="machineTypeUpdate">
                            <span  style="color:red;" class="message_error text-red block machineTypeUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Lokasi</label>
                        </div>
                        <div class="col-md-8">
                            <select name="" id="selectMachineOfficeUpdate" class="form-control select2" style="width:100%">
                            </select>
                            <input type="hidden" class="form-control" id="machineOfficeIdUpdate">
                            <span  style="color:red;" class="message_error text-red block machineOfficeIdUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Kapasitas (Kg/Jam)</label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" placeholder="Small" class="form-control" id="machineSmallUpdate">
                            <span  style="color:red;" class="message_error text-red block machineSmallUpdate_error"></span>
                        </div>
                        <div class="col-md-3">
                            <input type="number" placeholder="Medium" class="form-control" id="machineMediumUpdate">
                            <span  style="color:red;" class="message_error text-red block machineMediumUpdate_error"></span>
                        </div>
                        <div class="col-md-3">
                            <input type="number" placeholder="Large" class="form-control" id="machineLargeUpdate">
                            <span  style="color:red;" class="message_error text-red block machineLargeUpdate_error"></span>
                        </div>
                    </div>
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnUpdateMachine" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>