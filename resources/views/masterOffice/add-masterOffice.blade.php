
<div class="modal fade" id="addMasterOffice">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Add Office</h4>
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
                            <input type="text" class="form-control" id="officeName">
                            <span  style="color:red;" class="message_error text-red block officeName_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Inisial</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="officeInitial">
                            <span  style="color:red;" class="message_error text-red block officeInitial_error"></span>
                        </div>
                    </div>
                  
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Tipe</label>
                        </div>
                        <div class="col-md-8">
                            <select name="" id="selectOfficeType" class="form-control select2" style="width:100%">
                                <option value="">Pilih Tipe</option>
                                <option value="1">Pusat</option>
                                <option value="2">Cabang</option>
                            </select>
                            <input type="hidden" class="form-control" id="officeTypeId">
                            <span  style="color:red;" class="message_error text-red block officeTypeId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Provinsi</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectProvince" class="select2" style="width:100%" id="selectProvince"></select>
                            <input type="hidden" class="form-control" id="officeProvinceId">
                            <span  style="color:red;" class="message_error text-red block officeProvinceId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Kabupaten</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectRegency" class="select2" style="width:100%" id="selectRegency">
                                <option value="">Pilih Provinsi terlebih dahulu</option>
                            </select>
                            <input type="hidden" class="form-control" id="officeCityId">
                            <span  style="color:red;" class="message_error text-red block officeCityId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Kecamatan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectDistrict" class="select2" style="width:100%" id="selectDistrict">
                                <option value="">Pilih Kabupaten terlebih dahulu</option>
                            </select>
                            <input type="hidden" class="form-control" id="officeDistrictId">
                            <span  style="color:red;" class="message_error text-red block officeDistrictId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Kelurahan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="selectVillage" class="select2" style="width:100%" id="selectVillage">
                                <option value="">Pilih Kecamatan terlebih dahulu</option>
                            </select>
                            <input type="hidden" class="form-control" id="officeVillageId">
                            <span  style="color:red;" class="message_error text-red block officeVillageId_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Kode Pos</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="officePostalCode">
                            <span  style="color:red;" class="message_error text-red block officePostalCode_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mt-2">
                            <label for="">Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" id="officeAddress" rows="3"></textarea>
                            <span  style="color:red;" class="message_error text-red block officeAddress_error"></span>
                        </div>
                    </div>
               </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button id="btnSaveOffice" type="button" onclick="saveOffice()" class="btn btn-success">Save changes</button>
            </div>
        </div>
    </div>
</div>