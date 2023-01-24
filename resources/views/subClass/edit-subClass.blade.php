<div class="modal fade" id="editSubClass">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h4 class="modal-title">Edit Sub Class</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="container">
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Product Class</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectProductClassUpdate" id="selectProductClassUpdate" class="select2" style="width:100%"></select>
                            <input type="hidden" class="form-control" id="productClassIdUpdate">
                            <span  style="color:red;" class="message_error text-red block productClassIdUpdate_error"></span>
                        </div>
                    </div>     
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Nama</label>
                        </div>
                        <div class="col-md-8">
                            <input type="hidden" class="form-control" id="subClassId">
                            <input type="text" class="form-control" id="subClassNameUpdate">
                            <span  style="color:red;" class="message_error text-red block subClassNameUpdate_error"></span>
                        </div>
                    </div>     
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnUpdateSubClass" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>