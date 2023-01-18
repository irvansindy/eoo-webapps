<div class="modal fade" id="addOeeHeaderModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Add OEE Header</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="container">
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Mesin</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectMachine" id="selectMachine" class="select2" style="width: 100%"></select>
                            <input type="hidden" class="form-control" id="machineId">
                            <span  style="color:red;" class="message_error text-red block machineId_error"></span>
                        </div>
                    </div>     
                       
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnAddOeeHeader" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>