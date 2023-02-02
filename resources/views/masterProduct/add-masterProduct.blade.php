<div class="modal fade" id="addMasterProduct">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h4 class="modal-title">Add Produk</h4>
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
                            <input type="text" class="form-control" id="productName">
                            <span  style="color:red;" class="message_error text-red block productName_error"></span>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Mesin</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%" id="machineId"></select>
                            <span  style="color:red;" class="message_error text-red block machineId_error"></span>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Type</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%" id="productTypeId"></select>
                            <span  style="color:red;" class="message_error text-red block productTypeId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Diameter</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%" id="productDiameterId"></select>
                            <span  style="color:red;" class="message_error text-red block productDiameterId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Panjang</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%" id="productlengthId"></select>
                            <span  style="color:red;" class="message_error text-red block productlengthId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Varian</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control select2" style="width: 100%" id="productvariantId"></select>
                            <span  style="color:red;" class="message_error text-red block productvariantId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Standar Berat</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="productWeightStandard">
                            <span  style="color:red;" class="message_error text-red block productWeightStandard_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="col">
                                <label for="">Kg/Jam</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="kgPerHour">
                                <span  style="color:red;" class="message_error text-red block kgPerHour_error"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col">
                                <label for="">Pcs/Jam</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="pcsPerHour">
                                <span  style="color:red;" class="message_error text-red block pcsPerHour_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="col">
                                <label for="">Kg/Hari</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="kgPerDay">
                                <span  style="color:red;" class="message_error text-red block kgPerDay_error"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col">
                                <label for="">Pcs/Hari</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="pcsPerDay">
                                <span  style="color:red;" class="message_error text-red block pcsPerDay_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Toleransi Akurasi Produksi</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="productionAccuracyTolerancePerPcs">
                            <span  style="color:red;" class="message_error text-red block productionAccuracyTolerancePerPcs_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Formula</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="productFormula" id="productFormula" rows="5"></textarea>
                            <span  style="color:red;" class="message_error text-red block productFormula_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2 mb-2">
                            <label for="">Socket</label>
                        </div>
                        <div class="col-md-8">
                            {{-- <input type="text" class="form-control" id="productSocket"> --}}
                            <select class="form-control select2" style="width: 100%" id="productSocket"></select>
                            <span  style="color:red;" class="message_error text-red block productSocket_error"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnAddMasterProduct" type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>