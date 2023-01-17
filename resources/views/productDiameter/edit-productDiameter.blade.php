<div class="modal fade" id="editProductDiameter">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Edit Diameter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Ukuran</label>
                        </div>
                        <div class="col-md-8">
                            <input type="hidden" class="form-control" id="productDiameterId">
                            <input type="number" class="form-control" id="updateProductDiameter">
                            <span  style="color:red;" class="message_error text-red block updateProductDiameter_error"></span>
                        </div>
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Satuan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="updateProductDiameterUnit">
                            <span  style="color:red;" class="message_error text-red block updateProductDiameterUnit_error"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnEditProductDiameter" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>