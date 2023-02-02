<script>
    $('#addOeeHeader').on('click', function(){
        select_active('getMachineName','selectMachine','Mesin')
    })
    $('#selectMachine').on('change', function(){
        var selectMachine = $('#selectMachine').val()
        $('#machineId').val(selectMachine)
    })
    $('#btnAddOeeHeader').on('click', function(){
        var data ={
            'machineId':$('#machineId').val(),
        }
        store('addOee',data,'oee')
    })
    $('#btnAddOeeDetail').on('click', function(){
        var die = $('#dieLength').val()
        var ext = $('#extLength').val()
        var extZone =document.getElementsByClassName("extZone");
        var dieZone =document.getElementsByClassName("dieZone");
        var adapterZone =document.getElementsByClassName("adapterZone");
        var extArr=[];
        var dieArr=[];
        var aZArr=[];
        for(i = 0; i < ext; i++ ){
           var  arr_extZone = extZone[i].value;
           if(arr_extZone !=null || arr_extZone !=''){
               var extObj = arr_extZone
           }
           extArr.push(extObj) 
           var extFilter = extArr.filter(function (el) {
                return el != '';
            });
        }
        for(j = 0; j < die; j++ ){
           var  arr_dieZone = dieZone[j].value;
           if(arr_dieZone !=null || arr_dieZone !=''){
               var dieObj =arr_dieZone
           }
           dieArr.push(dieObj) 
          var dieFilter = dieArr.filter(function (el) {
                return el != '';
            });
        }
        for(k = 0; k < 2; k++ ){
           var  arr_adapterZone = adapterZone[k].value;
           if(arr_adapterZone !=null || arr_adapterZone !=''){
               var aZObj =arr_adapterZone
           }
           aZArr.push(aZObj) 
          var aZFilter = aZArr.filter(function (el) {
                return el != '';
            });
        }
        
        var data={
            'screwSpeed':$('#screwSpeed').val(),
            'dosingSpeed':$('#dosingSpeed').val(),
            'mainDrive':$('#mainDrive').val(),
            'vacumCylinder':$('#vacumCylinder').val(),
            'meltTemp':$('#meltTemp').val(),
            'meltPress':$('#meltPress').val(),
            'vacumTank':$('#vacumTank').val(),
            'haulOffSpeed':$('#haulOffSpeed').val(),
            'waterTemp':$('#waterTemp').val(),
            'waterTemp2':$('#waterTemp2').val(),
            'vacumTank2':$('#vacumTank2').val(),
            'vacumTank3':$('#vacumTank3').val(),
            'vacumTank4':$('#vacumTank4').val(),
            'waterPress':$('#waterPress').val(),
            'productId':$('#productId').val(),
            'productWeight':$('#productWeight').val(),
            'oeeMasterId':$('#oeeDetailId').val(),
            'aZArr':aZArr,
            'dieArr':dieFilter,
            'extArr':extFilter,

        }
      
       if(dieFilter.length ==0 || extFilter.length==0||aZArr.length == 0){
        toastr['error']('Temp Extruder or Die Heat is required');
        return false
       }else{
           store('addOeeDetail',data,'oee')
       }
    })
    $('#selectProduct').on('change', function(){
        var selectProduct = $('#selectProduct').val()
        $('#productId').val(selectProduct)
        setInput('getProductWeight','productId','productWeight')
    })
    $('#btnUpdateSettingOeeHeader').on('click', function(){
        var settingProductId =document.getElementsByClassName("settingProductId");
        var settingGoodPipeKg =document.getElementsByClassName("settingGoodPipeKg");
        var settingGoodPipePcs =document.getElementsByClassName("settingGoodPipePcs");
        var settingScrapPipe =document.getElementsByClassName("settingScrapPipe");
        var settingScrapMaterial =document.getElementsByClassName("settingScrapMaterial");
        var settingMaterialUse =document.getElementsByClassName("settingMaterialUse");
        var settingScrapStoping =document.getElementsByClassName("settingScrapStoping");
        var settingGoodPipeStandartKg =document.getElementsByClassName("settingGoodPipeStandartKg");
        var settingGoodPipeStandartPcs =document.getElementsByClassName("settingGoodPipeStandartPcs");
        
        var defectLogProductValue =document.getElementsByClassName("defectLogProductValue");
        var defectLogProductId =document.getElementsByClassName("defectLogProductId");
        var defectLogProductDefectId =document.getElementsByClassName("defectLogProductDefectId");
        
        // Down Time
        var downTimeProductId =document.getElementsByClassName("downTimeProductId");
        var idle =document.getElementsByClassName("idle");
        var setupDies =document.getElementsByClassName("setupDies");
        var setupRoutage =document.getElementsByClassName("setupRoutage");
        var noMaterial =document.getElementsByClassName("noMaterial");
        var waitingForSparepart =document.getElementsByClassName("waitingForSparepart");
     

        
        var arrSettingHeader = []
        var arrSettingDownTime = []
        var arrSettingDefect = []
    
        for(i = 0; i < settingGoodPipeKg.length; i++ ){
            var  arr_settingGoodPipeKg = settingGoodPipeKg[i].value;
            var  arr_settingGoodPipePcs = settingGoodPipePcs[i].value;
            var  arr_settingScrapPipe = settingScrapPipe[i].value;
            var  arr_settingScrapMaterial = settingScrapMaterial[i].value;
            var  arr_settingMaterialUse = settingMaterialUse[i].value;
            var  arr_settingScrapStoping = settingScrapStoping[i].value;
            var  arr_settingGoodPipeStandartKg = settingGoodPipeStandartKg[i].value;
            var  arr_settingGoodPipeStandartPcs = settingGoodPipeStandartPcs[i].value;
            var  arr_settingProductId = settingProductId[i].value;

            var postHeader =[
                arr_settingProductId,
                arr_settingGoodPipeKg,
                arr_settingGoodPipePcs,
                arr_settingScrapPipe,
                arr_settingScrapMaterial,
                arr_settingMaterialUse,
                arr_settingScrapStoping,
                arr_settingGoodPipeStandartKg,
                arr_settingGoodPipeStandartPcs,

            ]
            arrSettingHeader.push(postHeader) 
        }
        for(j = 0 ; j < defectLogProductDefectId.length; j++){
            var  arr_defectLogProductValue = defectLogProductValue[j].value; 
            var  arr_defectLogProductId = defectLogProductId[j].value; 
            var  arr_defectLogProductDefectId = defectLogProductDefectId[j].value; 
            var postDefect =[
                arr_defectLogProductId,
                arr_defectLogProductDefectId,
                arr_defectLogProductValue,

            ]
            arrSettingDefect.push(postDefect)
        }
           // Down Time
        for(k= 0; k < downTimeProductId.length; k++){
            var  arr_downTimeProductId = downTimeProductId[k].value; 
            var  arr_idle = idle[k].value; 
            var  arr_setupDies = setupDies[k].value; 
            var  arr_setupRoutage = setupRoutage[k].value; 
            var  arr_noMaterial = noMaterial[k].value; 
            var  arr_waitingForSparepart = waitingForSparepart[k].value; 

            var postDownTime =[
                arr_downTimeProductId,
                arr_idle,
                arr_setupDies,
                arr_setupRoutage,
                arr_noMaterial,
                arr_waitingForSparepart,
            ];

            arrSettingDownTime.push(postDownTime)
            // var filterSettingDownTime = arrSettingDownTime.filter(function (el) {
            //     return el != '';
            // });
        }

        var data ={
            'id':$('#settingMasterId').val(),
            'date':$('#settingMachineDate').val(),
            'shift':$('#settingShiftMaster').val(),
            'settingRemark':$('#settingRemark').val(),
            'arrSettingHeader':arrSettingHeader,
            'arrSettingDefect':arrSettingDefect,
            'arrSettingDownTime':arrSettingDownTime
        }
       store('updateOeeMaster',data,'oee');
    })
    $('#selectProductUpdate').on('change', function(){
        var selectProductUpdate = $('#selectProductUpdate').val()
        $('#productIdUpdate').val(selectProductUpdate)
        setInput('getProductWeight','productIdUpdate','productWeightUpdate')
    })
    $('#btnUpdateOeeDetail').on('click', function(){
        var die = $('#dieLengthUpdate').val()
        var ext = $('#extLengthUpdate').val()
        var extZoneUpdate =document.getElementsByClassName("extZoneUpdate");
        var dieZoneUpdate =document.getElementsByClassName("dieZoneUpdate");
        var adapterZoneUpdate =document.getElementsByClassName("adapterZoneUpdate");
        var extArrUpdate=[];
        var dieArrUpdate=[];
        var aZArrUpdate=[];
        for(i = 0; i < ext; i++ ){
           var  arr_extZoneUpdate = extZoneUpdate[i].value;
           if(arr_extZoneUpdate !=null || arr_extZoneUpdate !=''){
               var extObjUpdate = arr_extZoneUpdate
           }
           extArrUpdate.push(extObjUpdate) 
           var extFilterUpdate = extArrUpdate.filter(function (el) {
                return el != '';
            });
        }
        for(j = 0; j < die; j++ ){
           var  arr_dieZoneUpdate = dieZoneUpdate[j].value;
           if(arr_dieZoneUpdate !=null || arr_dieZoneUpdate !=''){
               var dieObjUpdate =arr_dieZoneUpdate
           }
           dieArrUpdate.push(dieObjUpdate) 
          var dieFilterUpdate = dieArrUpdate.filter(function (el) {
                return el != '';
            });
        }
        for(k = 0; k < 2; k++ ){
           var  arr_adapterZoneUpdate = adapterZoneUpdate[k].value;
           if(arr_adapterZoneUpdate !=null || arr_adapterZoneUpdate !=''){
               var aZObjUpdate =arr_adapterZoneUpdate
           }
           aZArrUpdate.push(aZObjUpdate) 
          var aZFilterUpdate = aZArrUpdate.filter(function (el) {
                return el != '';
            });
        }
      
        var data={
            'screwSpeed':$('#screwSpeedUpdate').val(),
            'dosingSpeed':$('#dosingSpeedUpdate').val(),
            'mainDrive':$('#mainDriveUpdate').val(),
            'vacumCylinder':$('#vacumCylinderUpdate').val(),
            'meltTemp':$('#meltTempUpdate').val(),
            'meltPress':$('#meltPressUpdate').val(),
            'vacumTank':$('#vacumTankUpdate').val(),
            'vacumTank2':$('#vacumTan2kUpdate').val(),
            'vacumTank3':$('#vacumTank3Update').val(),
            'vacumTank4':$('#vacumTank4Update').val(),
            'haulOffSpeed':$('#haulOffSpeedUpdate').val(),
            'waterTemp':$('#waterTempUpdate').val(),
            'waterTemp2':$('#waterTemp2Update').val(),
            'waterPress':$('#waterPressUpdate').val(),
            'productId':$('#productIdUpdate').val(),
            'productWeight':$('#productWeightUpdate').val(),
            'oeeMasterId':$('#oeeDetailIdUpdate').val(),
            'aZArr':aZFilterUpdate,
            'dieArr':dieFilterUpdate,
            'extArr':extFilterUpdate,
            'statusIdUpdate':$('#statusIdUpdate').val(),
            'shift':$('#oeeShiftUpdate').val(),
            'date':$('#oeeDateUpdate').val()

        }
      
       if(dieFilterUpdate.length ==0 || extFilterUpdate.length==0||aZFilterUpdate.length == 0){
        toastr['error']('Temp Extruder or Die Heat is required');
        return false
       }else{
           store('addOeeDetail',data,'oee')
       }
    })
    $('#selectStatusUpdate').on('change', function(){
        var selectStatusUpdate = $('#selectStatusUpdate').val()
        $('#statusIdUpdate').val(selectStatusUpdate)
        var status = $('#statusIdUpdate').val()
        var id = $('#oeeDetailIdUpdate').val()
        var shift = $('#oeeShiftUpdate').val()
        var date = $('#oeeDateUpdate').val()
        onChangeLogDetailOee(shift,id, status,date)

    })
    getOee()
    select_filter('getOfficeName','officeFilter','Lokasi Kantor')
    $(document).on("click", ".addOeeDetailModal", function(){
        var die = $(this).data('die')
        var ext = $(this).data('ext')
        var id = $(this).data('id')
        $('#dieLength').val(die)
        $('#extLength').val(ext)
        $('#oeeDetailId').val(id)
        $('#productWeight').val('')
        $('#screwSpeed').val('')
        $('#dosingSpeed').val('')
        $('#mainDrive').val('')
        $('#vacumCylinder').val('')
        $('#meltTemp').val('')
        $('#haulOffSpeed').val('')
        $('#waterTemp').val('')
        $('#waterPress').val('')
        var  renderHTMLExt =''
        var  renderHTMLDie =''
        var  renderHTMLAdapterZone =''
        select_active('getProductName','selectProduct','Produk')
        for(i = 0; i < ext; i++){
            renderHTMLExt +=`<div class="col-md-2 mt-2">
                                <label>Zone ${i + 1}</label>
                            </div>
                            <div class="col-md-2">
                            <input type="number" class="form-control extZone" name="extZone" id="extZone${i + 1}">
                            <span  style="color:red;" class="message_error text-red block extZone${i + 1}_error"></span>
                        </div>
                            `
        }
        $('#ext_container').html(renderHTMLExt);
        for(j = 0; j < die; j++){
            renderHTMLDie +=`<div class="col-md-2 mt-2">
                                <label>Zone ${j + 1}</label>
                            </div>
                            <div class="col-md-2">
                            <input type="number" class="form-control dieZone" name ="dieZone" id="dieZone${j + 1}">
                            <span  style="color:red;" class="message_error text-red block dieZone${j + 1}_error"></span>
                        </div>
                            `
        }
        $('#die_container').html(renderHTMLDie);
        for(k = 0; k < 2; k++){
            renderHTMLAdapterZone +=`<div class="col-md-2 mt-2">
                                <label>Zone ${k + 1}</label>
                            </div>
                            <div class="col-md-2">
                            <input type="number" class="form-control adapterZone" name ="adapterZone" id="adapterZone${k + 1}">
                            <span  style="color:red;" class="message_error text-red block adapterZone${k + 1}_error"></span>
                        </div>
                            `
        }
        $('#adapterZone_container').html(renderHTMLAdapterZone);

    })
    $(document).on("click", ".oeeEditLogModal", function(){
        var die = $(this).data('die')
        var ext = $(this).data('ext')
        var id = $(this).data('id')
        var az = $(this).data('az')
        var date = $(this).data('date')
        var shift = $(this).data('shift')
        var status = $(this).data('status')
        $('#dieLengthUpdate').val(die)
        $('#extLengthUpdate').val(ext)
        $('#oeeDetailIdUpdate').val(id)
        $('#oeeShiftUpdate').val(shift)
        $('#oeeDateUpdate').val(date)
        var  renderHTMLExtUpdate =''
        var  renderHTMLDieUpdate =''

        var  renderHTMLAdapterZoneUpdate =''
        select_active('getProductName','selectProduct','Produk')
        for(i = 0; i < ext; i++){
            renderHTMLExtUpdate +=`<div class="col-md-2 mt-2">
                                <label>Zone ${i + 1}</label>
                            </div>
                            <div class="col-md-2">
                            <input type="number" class="form-control extZoneUpdate" name="extZoneUpdate" id="extZoneUpdate${i + 1}">
                            <span  style="color:red;" class="message_error text-red block extZoneUpdate${i + 1}_error"></span>
                        </div>
                            `
        }
        $('#ext_containerUpdate').html(renderHTMLExtUpdate);
        for(j = 0; j < die; j++){
            renderHTMLDieUpdate +=`<div class="col-md-2 mt-2">
                                <label>Zone ${j + 1}</label>
                            </div>
                            <div class="col-md-2">
                            <input type="number" class="form-control dieZoneUpdate" name ="dieZoneUpdate" id="dieZoneUpdate${j + 1}">
                            <span  style="color:red;" class="message_error text-red block dieZoneUpdate${j + 1}_error"></span>
                        </div>
                            `
        }
        $('#die_containerUpdate').html(renderHTMLDieUpdate);
        for(k = 0; k < az; k++){
            renderHTMLAdapterZoneUpdate +=`<div class="col-md-2 mt-2">
                                <label>Zone ${k + 1}</label>
                            </div>
                            <div class="col-md-2">
                            <input type="text" class="form-control adapterZoneUpdate" name ="adapterZoneUpdate" id="adapterZoneUpdate${k + 1}">
                            <span  style="color:red;" class="message_error text-red block adapterZoneUpdate${k + 1}_error"></span>
                        </div>
                            `
        }
        $('#adapterZone_containerUpdate').html(renderHTMLAdapterZoneUpdate);

        getLogDetailOee(shift,id, status,date)
    })
    $(document).on("click", ".oeeDetailLogModal", function(){
        var id = $(this).data('id')
        var shift = $(this).data('shift')
        var status = $(this).data('status')
        var date = $(this).data('date')
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getStatusLength')}}",
            type: "get",
            dataType: 'json',
            data:{
                'id':id,
                'date':date,
            },
            async: true,
            beforeSend: function() {
                SwalLoading('Please wait ...');
            },
            success: function(response) {
                swal.close();
                    $('.navigasiDinamis').empty()
                $.each(response.master,function(i,data){
                    var progressName = 'Progress '+ i
                  
                    $('.navigasiDinamis').append(`
                                <li class="nav-item">
                                    <a class="nav-link tabView"  id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true" data-status='${data.status}'>${data.status == 1 ?'Set':progressName}</a>
                                </li>`
                    )
                });
                logTable(status,shift,id,date)
                $('#logOeeMasterId').val(id)
                $('#logOeeShift').val(shift)
                $('#logOeeDate').val(date)
            },
            error: function(xhr, status, error) {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        });

    })
    $(document).on('click','.oeeMasterSetting', function(e){
        $('#summaryProduct').hide()
        $('#summaryDownTime').hide()
        $('#settingProductList').empty()
        $('#settingDeffectContainer').empty()
        $('#settingDownTimeContainer').empty()
        e.preventDefault()
        var date = $(this).data('date')
        var machine_number = $(this).data('machine_number')
        var machine_name = $(this).data('machine_name')
        var id = $(this).data('id')
        var shift = $(this).data('shift')
        var deffectLength = $(this).data('deffectLength')
        var data ={
            'id':id,
            'date':date,
        }
        console.log()
        $('#settingMachineNumber').val(machine_number)
        $('#settingMachineName').val(machine_name)
        $('#settingShiftMaster').val(shift)
        $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('getMasterShift')}}",
                type: "get",
                dataType: 'json',
                data: data,
                beforeSend: function () {
                  $('#loading').show();
                },
                success : function(response) {
                    // alert(response.length);
                    $('#settingMasterId').val(id)
                    $('#settingMachineDate').val(date)
                    $('#loading').hide();
                    $('#summaryDefect').hide()
                    var htmlGoodPipe =''
                    var htmlProductList =''
                    var htmlDeffect =''
                    var htmlDownTIme =''
                    
                    var htmlSummaryDefect =''
                    if(response){
                        // Defect
                       
                     
                        if(response.deffect){
                            if(response.defectSummary){
                            $('#summaryDefect').show()
                            $('#settingDefectSummary').empty()
                            for(m = 0 ; m < response.defectSummary.length; m++){
                                htmlSummaryDefect +=`
                                <div class="col-sm-2 mt-2">
                                                <label>${response.defectSummary[m].defectName}</label>
                                            </div>
                                        <div class="col-sm-3">
                                            <input type="number" style="text-align:center" class="form-control" value="${response.defectSummary[m].value == null ?'0':response.defectSummary[m].sumDefect}" readOnly>
                                        </div>  
                                        <div class="col-sm-1 mt-2">
                                            <label>Kg</label>
                                        </div>
                                `
                            }
                            $('#settingDefectSummary').html(htmlSummaryDefect);
                        }
                            for(j=0; j < response.deffect.length; j++){
                                var htmlDefectLog =''
                                var l =0;
                                 l =  l < response.deffect[j].defect.length;
                                 l++
                                for(l =0; l < response.deffect[j].defect.length; l++){
                                    htmlDefectLog +=`
                                         
                                            <input type="hidden"  class="form-control defectLogProductId" value ="${response.deffect[j].defect[l].productId}">
                                            <input type="hidden"  class="form-control defectLogProductDefectId" name ="defectLogProductDefectId" value ="${response.deffect[j].defect[l].defectId}">
                                            <div class="col-md-2 mt-2">
                                                <label>${response.deffect[j].defect[l].defect_name.defectName} </label>
                                               
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <input type="number" style="text-align:center"  class="form-control defectLogProductValue" name ="defectLogProductValue"  value ="${response.deffect[j].defect[l].value}">
                                            </div>
                                            <div class="col-sm-1 mt-2">
                                                 <label>Kg</label>
                                             </div>
                                          
                                    `;
                                }
                                htmlDeffect+= `
                                <div class="card card-dark collapsed-card">
                                <div class="card-header bg-dark">
                                    <div class="card-title text-white">${response.deffect[j].product.productName}</div>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="form-group row settingDefectLogProduct" id="settingDefectLogProduct${j+1}">
                                            ${htmlDefectLog}
                                        </div>
                                    </div>
                                </div>
                            </div>
                                `;
                          
                            }  
                        }else{

                            for(n =0; n <response.defectNull.length; n++ ){
                                var htmlDefectLog =''
                                for(o=0;o < response.defectMaster.length; o++){
                                    htmlDefectLog +=`
                                         
                                         <input type="hidden"  class="form-control defectLogProductId" value ="${response.defectNull[n].productId}">
                                         <input type="hidden"  class="form-control defectLogProductDefectId" name ="defectLogProductDefectId" value ="${response.defectMaster[o].id}">
                                         <div class="col-md-2 mt-2">
                                            <label>${response.defectMaster[o].defectName}</label>
                                         </div>
                                         
                                         <div class="col-md-3">
                                             <input type="number" style="text-align:center"  class="form-control defectLogProductValue" name ="defectLogProductValue">
                                         </div>
                                         <div class="col-sm-1 mt-2">
                                              <label>Kg</label>
                                          </div>
                                       
                                 `;
                                }
                                htmlDeffect +=`
                                    <div class="card card-dark collapsed-card">
                                    <div class="card-header bg-dark">
                                        <div class="card-title text-white">${response.defectNull[n].productName}</div>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="form-group row settingDefectLogProduct">
                                                ${htmlDefectLog}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                `;
                            }
                        }
                        $('#settingDeffectContainer').html(htmlDeffect);
                        // End Defect

                        // DownTIme
                            for(k = 0; k < response.downTime.length; k++){
                                htmlDownTIme +=`
                                <div class="card card-dark collapsed-card">
                                <div class="card-header bg-dark">
                                
                                        <label>
                                            ${response.downTime[k].productName}
                                        </label>
                                        
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="form-group row">
                                            <div class="col-md-3 mt-2">
                                                <label for="">IDLE (NO ORDER)</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" style="text-align:center" class="form-control downTimeProductId" value="${response.downTime[k].productId == null ?'':response.downTime[k].productId}" id="idle${k+1}">
                                                <input type="number" style="text-align:center" class="form-control idle" value="${response.downTime[k].idle == null ?'':response.downTime[k].idle}" id="idle${k+1}">
                                            </div>
                                            <div class="col-md-1 mt-2">
                                                <label for="">Jam</label>
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label for="">Setup Dies</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" value="${response.downTime[k].setupDies == null ? '': response.downTime[k].setupDies}" style="text-align:center" class="form-control setupDies" id="setupDies">
                                            </div>
                                            <div class="col-md-1 mt-2">
                                                <label for="">Jam</label>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group row">
                                            <div class="col-md-3 mt-2">
                                                <label for="">Setup Routage</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" value="${response.downTime[k].setupRoutage == null ? '': response.downTime[k].setupRoutage}" style="text-align:center" class="form-control setupRoutage" id="setupRoutage">
                                            </div>
                                            <div class="col-md-1 mt-2">
                                                <label for="">Jam</label>
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label for="">No Material</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" value="${response.downTime[k].noMaterial == null ?'': response.downTime[k].noMaterial}" style="text-align:center" class="form-control noMaterial" id="noMaterial">
                                            </div>
                                            <div class="col-md-1 mt-2">
                                                <label for="">Jam</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3 mt-2">
                                                <label for="">Waiting For Sparepart</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" value="${response.downTime[k].waitingForSparepart == null ? '' : response.downTime[k].waitingForSparepart}" style="text-align:center" class="form-control waitingForSparepart" id="waitingForSparepart">
                                            </div>
                                            <div class="col-md-1 mt-2">
                                                <label for="">Jam</label>
                                            </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                    
                                `;
                            }
                            if(response.downTime.length > 1 ){
                                $('#summaryDownTime').show()
                            }else{
                                $('#summaryDownTime').hide()
                            }
                            $('#settingDownTimeContainer').html(htmlDownTIme)

                            if(response.downTimeMaster){
                                $('#idleSummary').val(response.downTimeMaster.idle)
                                $('#setupDiesSummary').val(response.downTimeMaster.setupDies)
                                $('#setupRoutageSummary').val(response.downTimeMaster.setupRoutage)
                                $('#noMaterialSummary').val(response.downTimeMaster.noMaterial)
                                $('#waitingForSparepartSummary').val(response.downTimeMaster.waitingForSparepart)
                            }else{
                                $('#idleSummary').val('0')
                                $('#setupDiesSummary').val('0')
                                $('#setupRoutageSummary').val('0')
                                $('#noMaterialSummary').val('0')
                                $('#waitingForSparepartSummary').val('0')
                            }
                        // End DownTIme
                        
                        // Product
                            var summaryGoodProductActualKg =0;
                            var summaryGoodProductActualPcs =0;
                            var summaryScrapPipe =0;
                            var summaryScrapMaterial =0;
                            var summaryMaterialUse =0;
                            var summaryScrapStoping =0;
                            var summarygoodPipeStandartKg =0;
                            var summarygoodPipeStandartPcs =0;
                            if(response.data.length > 1){
                                $('#summaryProduct').show()
                            }else{
                                $('#summaryProduct').hide()
                            }
                                for(i = 0; i < response.data.length; i++){
                                    summaryGoodProductActualKg +=response.data[i].goodProductActualKg 
                                    summaryGoodProductActualPcs +=response.data[i].goodProductActualPcs 
                                    summaryScrapPipe +=response.data[i].scrapPipe 
                                    summaryScrapPipe +=response.data[i].scrapPipe 
                                    summaryScrapMaterial +=response.data[i].scrapMaterial 
                                    summaryMaterialUse +=response.data[i].materialUse 
                                    summaryScrapStoping +=response.data[i].scrapStoping 
                                    summarygoodPipeStandartKg +=response.data[i].goodPipeStandartKg 
                                    summarygoodPipeStandartPcs +=response.data[i].goodPipeStandartPcs 
                                
                                    htmlProductList +=`
                                    <div class="card card-dark collapsed-card">
                                        <div class="card-header bg-dark">
                                            <label>
                                                ${response.data[i].productName}
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                                <div class="form-group row">
                                                            <div class="col-md-3 mt-2">
                                                                    <label>Nama Produk</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                <input type="text"class="form-control settingProductName" name="settingProductName" id="settingProductName${i+1}" value="${response.data[i].productName}" readOnly>
                                                                <span  style="color:red;" class="message_error text-red block settingProductName${i + 1}_error"></span>
                                                                <input type="hidden" id="settingProductId" class="form-control settingProductId"value="${response.data[i].productId}">
                                                            </div>
                                                            
                                                </div>
                                                <div class="from-group row">
                                                    <div class="col-md-3 mt-2">
                                                                    <label>Berat Standar</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <input type="number" style="text-align:center" class="form-control settingProductWeight" name="settingProductWeight" id="settingProductWeight" value="${response.data[i].weight}" readOnly >
                                                                <span  style="color:red;" class="message_error text-red block settingProductWeight${i + 1}_error"></span>
                                                            </div>
                                                            <div class="col-sm-1 mt-2">
                                                                <label for="">Kg</label>
                                                            </div>
                                                </div>
                                                <div class="form-group row mt-4">
                                                                <div class="col-md-4 mt-2">
                                                                    <label>Good Pipe Actual Pcs</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <input type="number" style="text-align:center" class="form-control settingGoodPipePcs" name="settingGoodPipePcs" id="settingGoodPipePcs" value="${response.data[i].goodProductActualPcs}">
                                                                <span  style="color:red;" class="message_error text-red block settingGoodPipePcs${i + 1}_error"></span>
                                                            </div>
                                                            <div class="col-md-4 mt-2">
                                                                    <label>Good Pipe Actual Kg</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <input type="number" style="text-align:center" value="${response.data[i].goodProductActualKg}" class="form-control settingGoodPipeKg" name="settingGoodPipeKg" id="settingGoodPipeKg${i+1}">
                                                                <span  style="color:red;" class="message_error text-red block settingGoodPipeKg${i + 1}_error"></span>
                                                            </div>
                                                        
                                                    </div>
                                                <div class="form-group row">
                                                            <div class="col-md-4 mt-2">
                                                                    <label>Scrap Pipe</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <input type="number" style="text-align:center" class="form-control settingScrapPipe" name="settingScrapPipe" id="settingScrapPipe${i+1}" value="${response.data[i].scrapPipe}">
                                                                <span  style="color:red;" class="message_error text-red block settingScrapPipe${i + 1}_error"></span>
                                                            </div>
                                                                <div class="col-md-4 mt-2">
                                                                    <label>Scrap Material</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <input type="number" style="text-align:center" class="form-control settingScrapMaterial" name="settingScrapMaterial" id="settingScrapMaterial" value="${response.data[i].scrapMaterial}">
                                                                <span  style="color:red;" class="message_error text-red block settingScrapMaterial${i + 1}_error"></span>
                                                            </div>
                                                        
                                                    </div>
                                                <div class="form-group row">
                                                            <div class="col-md-4 mt-2">
                                                                    <label>Material Use</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <input type="number" style="text-align:center" class="form-control settingMaterialUse" name="settingMaterialUse" id="settingMaterialUse${i+1}" value="${response.data[i].materialUse}">
                                                                <span  style="color:red;" class="message_error text-red block settingMaterialUse${i + 1}_error"></span>
                                                            </div>
                                                                <div class="col-md-4 mt-2">
                                                                    <label>Scrap Stoping</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <input type="number" style="text-align:center" class="form-control settingScrapStoping" name="settingScrapStoping" id="settingScrapStoping" value="${response.data[i].scrapStoping}">
                                                                <span  style="color:red;" class="message_error text-red block settingScrapStoping${i + 1}_error"></span>
                                                            </div>
                                                        
                                                    </div>
                                                <div class="form-group row settingActualGood" >
                                                            <div class="col-md-4 mt-2">
                                                                    <label>Good Pipe Standart Pcs</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <input type="number" style="text-align:center" class="form-control settingGoodPipeStandartPcs" name="settingGoodPipeStandartPcs" id="settingGoodPipeStandartPcs" readOnly disabled value="${response.data[i].goodPipeStandartPcs}">
                                                                <span  style="color:red;" class="message_error text-red block settingGoodPipeStandartPcs${i + 1}_error"></span>
                                                            </div>
                                                            <div class="col-md-4 mt-2">
                                                                    <label>Good Pipe Standart Kg</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <input type="number" style="text-align:center" class="form-control settingGoodPipeStandartKg" name="settingGoodPipeStandartKg" id="settingGoodPipeStandartKg${i+1}" readOnly disabled value="${response.data[i].goodPipeStandartKg}">
                                                                <span  style="color:red;" class="message_error text-red block settingGoodPipeStandartKg${i + 1}_error"></span>
                                                            </div>
                                                            
                                                        
                                                    </div>
                                        </div>
                                    </div>
                                
                                    `
                                
                            }
                            $('#settingProductList').html(htmlProductList);
                            $('#settingRemark').val(response.oeeMaster.remark)
                            $('#summaryGoodProductActualKg').val(summaryGoodProductActualKg)
                            $('#summaryGoodProductActualPcs').val(summaryGoodProductActualPcs)
                            $('#summaryScrapPipe').val(summaryScrapPipe)
                            $('#summaryScrapMaterial').val(summaryScrapMaterial)
                            $('#summaryMaterialUse').val(summaryMaterialUse)
                            $('#summaryScrapStoping').val(summaryScrapStoping)
                            $('#summaryGoodPipeStandartKg').val(summarygoodPipeStandartKg)
                            $('#summaryGoodPipeStandartPcs').val(summarygoodPipeStandartPcs)
                            if(summarygoodPipeStandartKg === 0 || summarygoodPipeStandartKg === '0'){
                                    $('.settingActualGood').hide()
                                    }else{
                                        $('.settingActualGood').show()
                                    }
                            
                            }else{
                                toastr["error"]('Data tidak ada')
                                $('#loading').hide();
                            }
                        // End Product
                },
                error : function(response) {
                    console.log('failed :' + response);
                    alert('Gagal Get Data, Tidak Ada Data / Mohon Coba Kembali Beberapa Saat Lagi');
                    $('#loading').hide();
                }
            });
    })
    $(document).on('click','.lockMasterModal', function(e){
        e.preventDefault();
        var id = $(this).data('id')
        var data ={
            'id':id
        }
        Swal.fire({
        title: 'Apakah anda yakin untuk mengunci transaksi ?',
        text: "Anda tidak akan bisa menambah progress atau mengubah progress kembali",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText :'Batal',
        confirmButtonText: 'Ya '
        }).then((result) => {
        if (result.isConfirmed) {
            store('updateoeeLock',data,'oee')
         
        }
        })
    })
    $(document).on("click", ".tabView", function(e){
        e.preventDefault();
        var id =        $('#logOeeMasterId').val()
        var shift =  $('#logOeeShift').val()
        var date =   $('#logOeeDate').val()
        var status = $(this).data('status')
        logTable(status,shift,id,date)
      
    })
     function getOee()
   {
        $('#oeeTable').DataTable().clear();
        $('#oeeTable').DataTable().destroy();
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getOee')}}",
            type: "get",
            dataType: 'json',
            data:{
                'from':$('#from').val(),
                'to':$('#to').val(),
                'officeFilter':$('#officeFilter').val(),
            },
            async: true,
            beforeSend: function() {
                SwalLoading('Please wait ...');
            },
            success: function(response) {
                swal.close();
                var data=''
                for(i = 0; i < response.data.length; i++ )
                {
                    data += `<tr style="text-align: center;">
                                <td class='details-control'data-date="${response.data[i].date}" data-machine="${response.data[i].machineId}"></td>
                                <td style="text-align:center;">${response.data[i]['date']==null?'':response.data[i]['date']}</td>
                                <td style="text-align:center;">${response.data[i]['machineNumber']==null?'':response.data[i]['machineNumber']}</td>
                                <td style="text-align:center;">${response.data[i]['machineName']==null?'':response.data[i]['machineName']}</td>
                                <td style="text-align:center;">${response.data[i]['officeName']==null?'':response.data[i]['officeName']}</td>
                                <td style="text-align:center;">
                                    <button class="btn btn-success getReportOee" title="Export to Excell" data-date="${response.data[i].date}" data-machine="${response.data[i].machineId}">
                                        <i class="fas fa-file"></i>
                                    </button>    
                                </td>
                            </tr>
                            `;
                }
                    $('#oeeTable > tbody:first').html(data);
                        var table = $('#oeeTable').DataTable({
                            scrollX  : true,
                            scrollY  :280
                        }).columns.adjust()    
                        $('#oeeTable tbody').on('click', 'td.details-control', function () {
                        var tr = $(this).closest("tr");
                        var row =   table.row( tr );
                        if ( row.child.isShown() ) {
                            // This row is already open - close it
                            row.child.hide();
                            tr.removeClass( 'shown' );
                        }
                        else {
                            // Open this row
                            var data ={
                                'date': $(this).data('date'),
                                'machineId': $(this).data('machine'),
                            }
                            detail_log(row.child,data) ;
                            tr.addClass( 'shown' );
                        }
                    } ); 
            },
            error: function(xhr, status, error) {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        });
   }
    function detail_log(callback, data){
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('getOeeShift')}}",
                type: "get",
                dataType: 'json',
                data: data,
                beforeSend: function () {
                  $('#loading').show();
                },
                success : function(response) {
                    // alert(response.length);
                    $('#loading').hide();
                    if(response){
                        let row = '';
                        for(let i = 0; i < response.data.length; i++){     
                            $(document).ready(function() 
                            {
                                $('.table_detail').DataTable
                                ({
                                    "destroy": true,
                                    "autoWidth" : false,
                                    "searching": false,
                                    "aaSorting" : false,
                                    "paging":   false,
                                    "scrollX":true
                                }).columns.adjust()    
                            });
                            $('.table_detail tbody').append(``);
                            var buttonUpdateDetail= ''
                            var buttonListDetail= ''
                            var buttonSettingMaster= ''
                            var buttonLockMaster= ''
                            var buttonReportExcell= ''
                            var  buttonAddOeeDetail = `<button title="Detail" id="oeeDetail" class="addOeeDetailModal btn btn-sm btn-success rounded"data-id="${response.data[i]['id']}" data-ext ="${response.length[0].length}" data-die ="${response.length[1].length}"  data-toggle="modal" data-target="#addOeeDetailModal">
                                                 <i class="fas fa-plus-circle"></i>          
                                            </button>  `
                            if(response.data[i].lockMaster == 1){
                                buttonSettingMaster =`
                                            <button title="Setting" class="oeeMasterSetting btn btn-sm btn-primary rounded"data-id="${response.data[i]['id']}" data-machine_number="${response.data[i].machineNumber}" data-ext ="${response.length[0].length}"data-machine_name ="${response.data[i].machineName}" data-shift="${response.data[i].shift}" data-die ="${response.length[1].length}" data-date="${response.data[i].date}"
                                            data-deffectLength="${response.deffectLength.length}"  data-toggle="modal" data-target="#oeeMasterSetting">
                                                 <i class="fas fa-book"></i>          
                                            </button>`
                                buttonReportExcell =`<button class="btn btn-sm btn-success" title="Export to Excell" data-date="${response.data[i].date}" data-machine="${response.data[i].machineId}">
                                                <i class="fas fa-file"></i>
                                            </button>`
                                buttonAddOeeDetail =""
                                buttonUpdateDetail =""
                            }
                            if(response.data[i].status > 0 ){
                                buttonListDetail =`
                                <button title="Detail" class="oeeDetailLogModal btn btn-sm btn-warning rounded"data-id="${response.data[i]['id']}" data-status="${response.data[i]['status']}" data-shift="${response.data[i].shift}" data-toggle="modal" data-target="#oeeDetailLogModal" data-date="${response.data[i].date}">
                                                <i class="fas fa-list"></i>     
                                            </button> 
                                `;
                            }
                            if(response.data[i].status > 0  && response.data[i].lockMaster == 0){
                                buttonUpdateDetail =`    
                                            <button title="Edit Log" class="oeeEditLogModal btn btn-sm btn-info rounded"data-id="${response.data[i]['id']}" data-status="1" data-shift="${response.data[i].shift}" data-toggle="modal" data-target="#oeeEditLogModal" data-ext ="${response.length[0].length}" data-die ="${response.length[1].length}" data-az="${response.length[2].length}"data-date="${response.data[i].date}">
                                                <i class="fas fa-paste"></i>     
                                            </button>   
                                          `
                            }
                            if(response.data[i].status > 3 && response.data[i].lockMaster == 0 ){
                                buttonLockMaster =`
                                <button title="Lock" class="lockMasterModal btn btn-sm btn-danger rounded"data-id="${response.data[i]['id']}" data-status="1" data-shift="${response.data[i].shift}" data-toggle="modal" data-target="#lockMasterModal" data-ext ="${response.length[0].length}" data-die ="${response.length[1].length}" data-az="${response.length[2].length}"data-date="${response.data[i].date}">
                                                <i class="fas fa-lock"></i>     
                                            </button>   
                                `;
                            }
                                row+= `<tr class="table-light">
                                            <td style="text-align:center">${i + 1}</td>
                                            <td style="text-align:center">${response.data[i].machineNumber}</td>
                                            <td style="text-align:center">${response.data[i].machineName}</td>
                                            <td style="text-align:center">${response.data[i].officeName}</td>
                                            <td style="text-align:center">${response.data[i].shift}</td>
                                            <td style="text-align:center">
                                              ${buttonAddOeeDetail}
                                              ${buttonListDetail}
                                              ${buttonUpdateDetail}
                                              ${buttonSettingMaster}
                                              ${buttonReportExcell}
                                              ${buttonLockMaster}
                                            </td>

                                        </tr>`;
    
                        }
                        callback($(`
                          <table class="table_detail datatable-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align:center">No</th>
                                    <th style="text-align:center">No Mesin</th>
                                    <th style="text-align:center">Extruder</th>
                                    <th style="text-align:center">Kantor</th>
                                    <th style="text-align:center">Shift</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                          <tbody class="table-bordered">${row}</tbody>
                        </table>`)).show();
                     
                    }else{
                        toastr["error"]('Data tidak ada')
                        $('#loading').hide();
                    }
                },
                error : function(response) {
                    console.log('failed :' + response);
                    alert('Gagal Get Data, Tidak Ada Data / Mohon Coba Kembali Beberapa Saat Lagi');
                    $('#loading').hide();
                }
            });
    }
    function logTable(status,shift,id,date){
        
        $('#oeeAdapterZoneTable').DataTable().clear();
        $('#oeeAdapterZoneTable').DataTable().destroy();
        $('#oeeTempExtruderTable').DataTable().clear();
        $('#oeeTempExtruderTable').DataTable().destroy();
        $('#oeeDieHeatTable').DataTable().clear();
        $('#oeeDieHeatTable').DataTable().destroy();
        $('#logScrewSpeed').val('')
        $('#logDosingSpeed').val('')
        $('#logMainDrive').val('')
        $('#logVacumCylinder').val('')
        $('#logMeltTemp').val('')
        $('#logMeltPress').val('')
        $('#logVacumTank').val('')
        $('#logVacumTank2').val('')
        $('#logVacumTank3').val('')
        $('#logVacumTank4').val('')
        $('#logHaulOffSpeed').val('')
        $('#logWaterTemp').val('')
        $('#logWaterTemp2').val('')
        $('#logWaterPress').val('')
        $('#logProductWeight').val('')
        $('#logProductName').val('')
        $('#logOeeDetailDate').val('')
        $('#logOeeTime').val('')
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getOeeDetailProgress')}}",
            type: "get",
            dataType: 'json',
            async: true,
            data:{
                'status':status,
                'shift':shift,
                'id':id,
                'date':date,
            },
            beforeSend: function() {
                SwalLoading('Please wait ...');
            },
            success: function(response) {
                swal.close();
                var data=''
                var dataDie=''
                var dataAZ=''
                for(i = 0; i < response.dataExt.length; i++ )
                {
                    data += `<tr style="text-align: center;">
                                <td style="width:25%;text-align:center;">${response.dataExt[i]['zoneNumber']==null?'':response.dataExt[i]['zoneNumber']}</td>
                                <td style="width:25%;text-align:center;">${response.dataExt[i]['oeeDetailValue']==null?'':response.dataExt[i]['oeeDetailValue']}</td>
                            </tr>
                            `;
                }
                    $('#oeeTempExtruderTable > tbody:first').html(data);
                    $('#oeeTempExtruderTable').DataTable({
                        "destroy": true,
                        "autoWidth" : false,
                        "searching": false,
                        "aaSorting" : true,
                        "paging":   true,
                        "scrollX":true,
                        'scrollY':150,
                       "bInfo" : false
                    }).columns.adjust()

                    
                for(j = 0; j < response.dataDie.length; j++ )
                {
                    dataDie += `<tr style="text-align: center;">
                                <td style="width:25%;text-align:center;">${response.dataDie[j]['zoneNumber']==null?'':response.dataDie[j]['zoneNumber']}</td>
                                <td style="width:25%;text-align:center;">${response.dataDie[j]['oeeDetailValue']==null?'':response.dataDie[j]['oeeDetailValue']}</td>
                            </tr>
                            `;
                }
                    $('#oeeDieHeatTable > tbody:first').html(dataDie);
                    $('#oeeDieHeatTable').DataTable({
                        "destroy": true,
                        "autoWidth" : false,
                        "searching": false,
                        "aaSorting" : true,
                        "paging":   true,
                        "scrollX":true,
                        'scrollY':150,
                       "bInfo" : false
                    }).columns.adjust()


                for(k = 0; k < response.dataAZ.length; k++ )
                {
                    dataAZ += `<tr style="text-align: center;">
                                <td style="width:25%;text-align:center;">${response.dataAZ[k]['zoneNumber']==null?'':response.dataAZ[k]['zoneNumber']}</td>
                                <td style="width:25%;text-align:center;">${response.dataAZ[k]['oeeDetailValue']==null?'':response.dataAZ[k]['oeeDetailValue']}</td>
                            </tr>
                            `;
                }
                    $('#oeeAdapterZoneTable > tbody:first').html(dataAZ);
                    $('#oeeAdapterZoneTable').DataTable({
                        "destroy": true,
                        "autoWidth" : false,
                        "searching": false,
                        "aaSorting" : false,
                        "paging":   false,
                        "scrollX":true,
                       "bInfo" : false
                    }).columns.adjust()
                    if(response.detail == null){
                        toastr['error']('Data is empty');
                    }else{
                        $('#logScrewSpeed').val(response.detail.screwSpeed === null ?'':response.detail.screwSpeed )
                        $('#logDosingSpeed').val(response.detail.dosingSpeed == null ? '':response.detail.dosingSpeed)
                        $('#logMainDrive').val(response.detail.mainDrive == null ? '':response.detail.mainDrive)
                        $('#logVacumCylinder').val(response.detail.vacumCylinder == null ? '':response.detail.vacumCylinder)
                        $('#logMeltTemp').val(response.detail.meltTemperature == null ?'':response.detail.meltTemperature)
                        $('#logMeltPress').val(response.detail.meltPressure == null ? '': response.detail.meltPressure)
                        $('#logVacumTank').val(response.detail.vacumTank == null ? '': response.detail.vacumTank)
                        $('#logVacumTank2').val(response.detail.vacumTank2 == null ? '': response.detail.vacumTank2)
                        $('#logVacumTank3').val(response.detail.vacumTank3 == null ? '': response.detail.vacumTank3)
                        $('#logVacumTank4').val(response.detail.vacumTank4 == null ? '': response.detail.vacumTank4)
                        $('#logHaulOffSpeed').val(response.detail.haulOffSpeed == null ?'': response.detail.haulOffSpeed)
                        $('#logWaterTemp').val(response.detail.waterTempVacumTank == null ?'': response.detail.waterTempVacumTank)
                        $('#logWaterTemp2').val(response.detail.waterTempVacumTank2 == null ?'': response.detail.waterTempVacumTank2)
                        $('#logWaterPress').val(response.detail.waterPressure == null ?'': response.detail.waterPressure)
                        $('#logProductWeight').val(response.detail.weight ==null ?'':response.detail.weight)
                        $('#logProductName').val(response.detail.productName == null ?'': response.detail.productName)
                        $('#logOeeTime').val(response.detail.time == null ?'': response.detail.time)
                        $('#logOeeDetailDate').val(response.detail.date == null ?'': response.detail.date)
                      
                    }


            },
            error: function(xhr, status, error) {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        });
    }
      // irvan 20 januari 2023
      $('#oeeTable').on('click', '.getReportOee', function(e) {
        let id = $(this).data('machine')
        let date = $(this).data('date')
        e.preventDefault()
        $.ajax({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('getReportOee') }}",
            type: 'GET',
            dataType: 'json',
            async: true,
            data: {
                'id': id,
                'date': date,
            },
            success: (response) => {
                console.log(response.data['oeeMaster']['product']['productName'])
                // oee Master
                $('#ooeMasterId').val(id)
                $('#goodProductActualPcs').val(response.data['oeeMaster']['goodProductActualPcs'])
                $('#goodProductActualKg').val(response.data['oeeMaster']['goodProductActualKg'])
                $('#product').val(response.data.productName)
                $('#machine').val(response.data.machineName)
                $('#shift').val(response.data.shift)
                $('#status').val(response.data.status)
                // oee Detail
            },
            error: function(xhr, status, error) {
                toastr['error']('gagal mengambil data, silakan hubungi ICT Developer');
            }
        })
    })
    // get view modal data detail report by detail id
    $(document).on('click', '.getReportOeeDetail', function(e) {
        let oee_master_id = $(this).data('oee_master_id')
        alert(oee_master_id)
        e.preventDefault()
        $('#oeeMasterId').val(oee_master_id)
        select_active('getProductDiameterName','productDiameter','Diameter Produk')
        select_active('getProductLengthName','productLength','Panjang Produk')
        select_active('getProductVariantName','productVariant','Varian Produk')
    })
    $(document).on('click', '#btnExportOeeDetail', function() {
        var oeeMasterId = $('#oeeMasterId').val()
        var machineCapacityType = $('#machineCapacityType').val()
        var productDiameter = $('#productDiameter').val()
        var productLength = $('#productLength').val()
        var productVariant = $('#productVariant').val()
        // let data = {
        //     'oeeMasterId':document.getElementById("oeeMasterId").value
        // }    
        alert(machineCapacityType)
    })
function onChangeLogDetailOee(shift,id, status,date){
            $('#screwSpeedUpdate').val()
              $('#dosingSpeedUpdate').val()
              $('#mainDriveUpdate').val()
              $('#vacumCylinderUpdate').val()
              $('#meltTempUpdate').val()
              $('#meltPressUpdate').val()
              $('#vacumTankUpdate').val()
              $('#haulOffSpeedUpdate').val()
              $('#waterTempUpdate').val()
              $('#waterPressUpdate').val()
              $('#productWeightUpdate').val()
              $('#productNameUpdate').val()
              $('#productIdUpdate').val()
      var data ={
          'shift':shift,
          'id':id,
          'status':status,
          'date':date,
      }
      $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{route('getOeeDetailProgress')}}",
          type: "get",
          dataType: 'json',
          async: true,
          data:data,
          beforeSend: function() {
              SwalLoading('Please wait ...');
          },
          success: function(response) {
              swal.close();
           
              $('#screwSpeedUpdate').val(response.detail.screwSpeed == null ? '': response.detail.screwSpeed)
              $('#dosingSpeedUpdate').val(response.detail.dosingSpeed == null ? '': response.detail.dosingSpeed)
              $('#mainDriveUpdate').val(response.detail.mainDrive == null ? '': response.detail.mainDrive)
              $('#vacumCylinderUpdate').val(response.detail.vacumCylinder == null ? '': response.detail.vacumCylinder)
              $('#meltTempUpdate').val(response.detail.meltPressure == null ? '': response.detail.meltPressure)
              $('#meltPressUpdate').val(response.detail.meltTemperature == null ? '': response.detail.meltTemperature)
              $('#vacumTankUpdate').val(response.detail.vacumTank == null ? '': response.detail.vacumTank)
              $('#haulOffSpeedUpdate').val(response.detail.haulOffSpeed == null ? '': response.detail.haulOffSpeed)
              $('#waterTempUpdate').val(response.detail.waterTempVacumTank == null ? '': response.detail.waterTempVacumTank)
              $('#waterPressUpdate').val(response.detail.waterPressure == null ? '': response.detail.waterPressure)
              $('#productWeightUpdate').val(response.detail.weight == null ? '': response.detail.weight)
              $('#productNameUpdate').val(response.detail.productName == null ? '': response.detail.productName)
              $('#productIdUpdate').val(response.detail.productId == null ? '': response.detail.productId)
              $('#selectProductUpdate').empty()
              $('#selectProductUpdate').append('<option value="'+response.detail.productId+'">'+response.detail.productName+'</option>')
              $.each(response.product,function(i,data){
                      $('#selectProductUpdate').append('<option value="'+data.id+'">' + data.name +'</option>');
              });
           
              $.each(response.dataAZ,function(i,data){
                      $('#adapterZoneUpdate'+data.zoneNumber).val(data.oeeDetailValue == null ?'': data.oeeDetailValue);
              });
              $.each(response.dataExt,function(i,data){
                      $('#extZoneUpdate'+data.zoneNumber).val(data.oeeDetailValue == null ?'': data.oeeDetailValue);
              });
              $.each(response.dataDie,function(i,data){
                      $('#dieZoneUpdate'+data.zoneNumber).val(data.oeeDetailValue == null ?'': data.oeeDetailValue);
              });

          
          },
          error: function(xhr, status, error) {
              swal.close();
              toastr['error']('Failed to get data, please contact ICT Developer');
          }
      });
  }
    function getLogDetailOee(shift,id, status,date){
              $('#screwSpeedUpdate').val()
              $('#dosingSpeedUpdate').val()
              $('#mainDriveUpdate').val()
              $('#vacumCylinderUpdate').val()
              $('#meltTempUpdate').val()
              $('#meltPressUpdate').val()
              $('#vacumTankUpdate').val()
              $('#vacumTank2Update').val()
              $('#vacumTank3Update').val()
              $('#vacumTank4Update').val()
              $('#haulOffSpeedUpdate').val()
              $('#waterTempUpdate').val()
              $('#waterTemp2Update').val()
              $('#waterPressUpdate').val()
              $('#productWeightUpdate').val()
              $('#productNameUpdate').val()
              $('#productIdUpdate').val()
        var data ={
            'shift':shift,
            'id':id,
            'status':status,
            'date':date,
        }
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getOeeDetailProgress')}}",
            type: "get",
            dataType: 'json',
            async: true,
            data:data,
            beforeSend: function() {
                SwalLoading('Please wait ...');
            },
            success: function(response) {
                swal.close();
                
              $('#screwSpeedUpdate').val(response.detail.screwSpeed == null ? '': response.detail.screwSpeed)
              $('#dosingSpeedUpdate').val(response.detail.dosingSpeed == null ? '': response.detail.dosingSpeed)
              $('#mainDriveUpdate').val(response.detail.mainDrive == null ? '': response.detail.mainDrive)
              $('#vacumCylinderUpdate').val(response.detail.vacumCylinder == null ? '': response.detail.vacumCylinder)
              $('#meltTempUpdate').val(response.detail.meltPressure == null ? '': response.detail.meltPressure)
              $('#meltPressUpdate').val(response.detail.meltTemperature == null ? '': response.detail.meltTemperature)
              $('#vacumTankUpdate').val(response.detail.vacumTank == null ? '': response.detail.vacumTank)
              $('#vacumTank2Update').val(response.detail.vacumTank2 == null ? '': response.detail.vacumTank2)
              $('#vacumTank3Update').val(response.detail.vacumTank3 == null ? '': response.detail.vacumTank3)
              $('#vacumTank4Update').val(response.detail.vacumTank4 == null ? '': response.detail.vacumTank4)
              $('#haulOffSpeedUpdate').val(response.detail.haulOffSpeed == null ? '': response.detail.haulOffSpeed)
              $('#waterTempUpdate').val(response.detail.waterTempVacumTank == null ? '': response.detail.waterTempVacumTank)
              $('#waterTemp2Update').val(response.detail.waterTempVacumTank2 == null ? '': response.detail.waterTempVacumTank2)
              $('#waterPressUpdate').val(response.detail.waterPressure == null ? '': response.detail.waterPressure)
              $('#productWeightUpdate').val(response.detail.weight == null ? '': response.detail.weight)
              $('#productNameUpdate').val(response.detail.productName == null ? '': response.detail.productName)
              $('#productIdUpdate').val(response.detail.productId == null ? '': response.detail.productId)
                $('#selectProductUpdate').empty()
                $('#selectProductUpdate').append('<option value="'+response.detail.productId+'">'+response.detail.productName+'</option>')
                $.each(response.product,function(i,data){
                        $('#selectProductUpdate').append('<option value="'+data.id+'">' + data.name +'</option>');
                });
                $('#statusIdUpdate').val(status)
                $('#selectStatusUpdate').empty()
                $.each(response.master,function(i,data){
                    var statusNumber = i
                    var statusName ="Progress "+ statusNumber 
                    if(data.status == 1){
                        statusName ="Set"
                    }
                        $('#selectStatusUpdate').append('<option value="'+data.status+'">' + statusName +'</option>');
                });
                
                $.each(response.dataAZ,function(i,data){
                        $('#adapterZoneUpdate'+data.zoneNumber).val(data.oeeDetailValue == null ?'': data.oeeDetailValue);
                });
                $.each(response.dataExt,function(i,data){
                        $('#extZoneUpdate'+data.zoneNumber).val(data.oeeDetailValue == null ?'': data.oeeDetailValue);
                });
                $.each(response.dataDie,function(i,data){
                        $('#dieZoneUpdate'+data.zoneNumber).val(data.oeeDetailValue == null ?'': data.oeeDetailValue);
                });

            
            },
            error: function(xhr, status, error) {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        });
    }
</script>