<div class="modal fade" id="editProductVariant">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Edit Variant</h4>
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
                            <input type="hidden" class="form-control" id="productVariantId">
                            <input type="text" class="form-control" id="productVariantUpdate">
                            <span  style="color:red;" class="message_error text-red block productVariantUpdate_error"></span>
                        </div>
                    </div>     
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnUpdateProductVariant" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>