<div class="modal fade" id="addProductType">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h4 class="modal-title">Add Product Length</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="container">
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Panjang</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="productLength">
                            <span  style="color:red;" class="message_error text-red block productLength_error"></span>
                        </div>
                    </div>     
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Satuan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="productLengthUnit">
                            <span  style="color:red;" class="message_error text-red block productLengthUnit_error"></span>
                        </div>
                    </div>     
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnAddProductLength" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>