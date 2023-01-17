<div class="modal fade" id="editProductClassModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Edit Product Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="container">
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Tipe Produk</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectProductTypeUpdate" id="selectProductTypeUpdate" class="select2" style="width: 100%"></select>
                            <input type="hidden" class="form-control" id="productTypeIdUpdate">
                            <span  style="color:red;" class="message_error text-red block productTypeIdUpdate_error"></span>
                        </div>
                    </div>     
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Nama</label>
                        </div>
                        <div class="col-md-8">
                            <input type="hidden" class="form-control" id="productClassId">
                            <input type="text" class="form-control" id="productClassUpdate">
                            <span  style="color:red;" class="message_error text-red block productClassUpdate_error"></span>
                        </div>
                    </div>     
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnUpdateProductClass" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>