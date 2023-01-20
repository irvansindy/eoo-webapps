<div class="modal fade" id="editMasterProduct">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Edit Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Nama</label>
                        </div>
                        <div class="col-md-8">
                            <input type="hidden" class="form-control" id="productId">
                            <input type="text" class="form-control" id="productNameUpdate">
                            <span  style="color:red;" class="message_error text-red block productNameUpdate_error"></span>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Mesin</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%" name="machineUpdateId" id="machineUpdateId"></select>
                            <input type="hidden" class="form-control" id="valueMachineUpdateId">
                            <span  style="color:red;" class="message_error text-red block machineUpdateId_error"></span>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Type</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%" name="productTypeUpdateId" id="productTypeUpdateId"></select>
                            <input type="hidden" class="form-control" id="valueProductTypeUpdateId">
                            <span  style="color:red;" class="message_error text-red block productTypeUpdateId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Diameter</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%" name="productDiameterUpdateId" id="productDiameterUpdateId"></select>
                            <input type="hidden" class="form-control" id="valueProductDiameterUpdateId">
                            <span  style="color:red;" class="message_error text-red block productDiameterUpdateId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Panjang</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%" name="productlengthUpdateId" id="productlengthUpdateId"></select>
                            <input type="hidden" class="form-control" id="valueProductlengthUpdateId">
                            <span  style="color:red;" class="message_error text-red block productlengthUpdateId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Varian</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%" name="productvariantUpdateId" id="productvariantUpdateId"></select>
                            <input type="hidden" class="form-control" id="valueProductvariantUpdateId">
                            <span  style="color:red;" class="message_error text-red block productvariantUpdateId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Standar Berat</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="productWeightStandardUpdate">
                            <span  style="color:red;" class="message_error text-red block productWeightStandardUpdate_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="col">
                                <label for="">Kg/Jam</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="kgPerHourUpdate">
                                <span  style="color:red;" class="message_error text-red block kgPerHourUpdate_error"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col">
                                <label for="">Pcs/Jam</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="pcsPerHourUpdate">
                                <span  style="color:red;" class="message_error text-red block pcsPerHourUpdate_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="col">
                                <label for="">Kg/Hari</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="kgPerDayUpdate">
                                <span  style="color:red;" class="message_error text-red block kgPerDayUpdate_error"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col">
                                <label for="">Pcs/Hari</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="pcsPerDayUpdate">
                                <span  style="color:red;" class="message_error text-red block pcsPerDayUpdate_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Toleransi Akurasi Produksi</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="productionAccuracyTolerancePerPcsUpdate">
                            <span  style="color:red;" class="message_error text-red block productionAccuracyTolerancePerPcsUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Formula</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="productFormulaUpdate" id="productFormulaUpdate" rows="5"></textarea>
                            <span  style="color:red;" class="message_error text-red block productFormulaUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Socket</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="productSocketUpdate">
                            <span  style="color:red;" class="message_error text-red block productSocketUpdate_error"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnUpdateMasterProduct" type="button" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>