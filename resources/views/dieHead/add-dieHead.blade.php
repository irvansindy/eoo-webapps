
<div class="modal fade" id="addDieHeadModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Add Die Head</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="container">
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="dieHeadName">
                            <span  style="color:red;" class="message_error text-red block dieHeadName_error"></span>
                        </div>
                    </div>     
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Machine</label>
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
                <button id="btnAddDieHead" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>