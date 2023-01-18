<div class="modal fade" id="addOeeDetailModal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Add OEE Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="container">
                    <div class="form-group row">
                        <div class="col-md-1 mt-2">
                            <label for="">Product</label>
                        </div>
                        <div class="col-md-3">
                            <select name="selectProduct" id="selectProduct" class="select2" style="width: 100%"></select>
                            <input type="hidden" class="form-control" id="productId">
                            <span  style="color:red;" class="message_error text-red block productId_error"></span>
                        </div>
                    </div>
                    <h5>Temp Extruder</h5> 
                    <div id="ext_container" class="form-group row">
                        
                    </div>    
                    <h5>Die Heat</h5> 
                    <div id="die_container" class="form-group row">
                        
                    </div>    
                       
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnAddOeeHeader" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>