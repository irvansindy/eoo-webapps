
<div class="modal fade" id="editMasterOffice">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Edit Office</h4>
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
                            <input type="text" class="form-control" id="officeNameUpdate">
                            <input type="hidden" class="form-control" id="officeId">
                            <span  style="color:red;" class="message_error text-red block officeNameUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Inisial</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="officeInitialUpdate">
                            <span  style="color:red;" class="message_error text-red block officeInitialUpdate_error"></span>
                        </div>
                    </div>
                  
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Tipe</label>
                        </div>
                        <div class="col-md-8">
                            <select name="" id="selectOfficeTypeUpdate" class="form-control select2" style="width:100%">
                                <option value="">Pilih Tipe</option>
                                <option value="1">Pusat</option>
                                <option value="2">Cabang</option>
                            </select>
                            <input type="hidden" class="form-control" id="officeTypeIdUpdate">
                            <span  style="color:red;" class="message_error text-red block officeTypeIdUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Provinsi</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectProvinceUpdate" class="select2" style="width:100%" id="selectProvinceUpdate"></select>
                            <input type="hidden" class="form-control" id="officeProvinceIdUpdate">
                            <span  style="color:red;" class="message_error text-red block officeProvinceIdUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Kabupaten</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectRegencyUpdate" class="select2" style="width:100%" id="selectRegencyUpdate">
                              
                            </select>
                            <input type="hidden" class="form-control" id="officeCityIdUpdate">
                            <span  style="color:red;" class="message_error text-red block officeCityIdUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Kecamatan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectDistrictUpdate" class="select2" style="width:100%" id="selectDistrictUpdate">
                              
                            </select>
                            <input type="hidden" class="form-control" id="officeDistrictIdUpdate">
                            <span  style="color:red;" class="message_error text-red block officeDistrictIdUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Kelurahan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectVillageUpdate" class="select2" style="width:100%" id="selectVillageUpdate">
                              
                            </select>
                            <input type="hidden" class="form-control" id="officeVillageIdUpdate">
                            <span  style="color:red;" class="message_error text-red block officeVillageIdUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Kode Pos</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="officePostalCodeUpdate">
                            <span  style="color:red;" class="message_error text-red block officePostalCodeUpdate_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" id="officeAddressUpdate" rows="3"></textarea>
                            <span  style="color:red;" class="message_error text-red block officeAddressUpdate_error"></span>
                        </div>
                    </div>
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnUpdateOffice" type="button" onclick="updateOffice()" class="btn btn-success">Save changes</button>
            </div>
        </div>
    </div>
</div>