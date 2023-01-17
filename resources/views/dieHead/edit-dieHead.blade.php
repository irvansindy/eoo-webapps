
<div class="modal fade" id="editDieHead">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Edit Die Head</h4>
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
                            <input type="hidden" class="form-control" id="dieHeadId">
                            <input type="text" class="form-control" id="dieHeadNameUpdate">
                            <span  style="color:red;" class="message_error text-red block dieHeadNameUpdate_error"></span>
                        </div>
                    </div>     
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Machine</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectMachineUpdate" id="selectMachineUpdate" class="select2" style="width: 100%"></select>
                            <input type="hidden" class="form-control" id="machineIdUpdate">
                            <span  style="color:red;" class="message_error text-red block machineIdUpdate_error"></span>
                        </div>
                    </div>     
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnUpdateDieHead" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>