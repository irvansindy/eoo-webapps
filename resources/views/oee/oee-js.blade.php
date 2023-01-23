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
        alert(die)
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
    getOee()
    select_active('getOfficeName','officeFilter','Lokasi Kantor')
    $(document).on("click", ".addOeeDetailModal", function(){
        var die = $(this).data('die')
        var ext = $(this).data('ext')
        var id = $(this).data('id')
        $('#dieLength').val(die)
        $('#extLength').val(ext)
        $('#oeeDetailId').val(id)
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
                            <input type="text" class="form-control adapterZone" name ="adapterZone" id="adapterZone${k + 1}">
                            <span  style="color:red;" class="message_error text-red block adapterZone${k + 1}_error"></span>
                        </div>
                            `
        }
        $('#adapterZone_container').html(renderHTMLAdapterZone);

    })
    $(document).on("click", ".oeeDetailLogModal", function(){
        var id = $(this).data('id')
        var shift = $(this).data('shift')
        var status = $(this).data('status')
        logTable(status,shift,id)
        $('#logOeeMasterId').val(id)
        $('#logOeeShift').val(shift)

    })
    $(document).on("click", ".tabView", function(e){
        e.preventDefault();
        var id =  $('#logOeeMasterId').val()
        var shift =  $('#logOeeShift').val()
        var status = $(this).data('status')
        logTable(status,shift,id)
      
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
    function detail_log( callback, data){
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
                                row+= `<tr class="table-light">
                                            <td style="text-align:center">${i + 1}</td>
                                            <td style="text-align:center">${response.data[i].machineNumber}</td>
                                            <td style="text-align:center">${response.data[i].machineName}</td>
                                            <td style="text-align:center">${response.data[i].officeName}</td>
                                            <td style="text-align:center">${response.data[i].shift}</td>
                                            <td style="text-align:center">
                                            <button title="Detail" id="oeeDetail" class="addOeeDetailModal btn btn-sm btn-success rounded"data-id="${response.data[i]['id']}" data-ext ="${response.length[0].length}" data-die ="${response.length[1].length}"  data-toggle="modal" data-target="#addOeeDetailModal">
                                                <i class="fas fa-plus-circle"></i>          
                                            </button>    
                                            <button title="Detail" class="oeeDetailLogModal btn btn-sm btn-warning rounded"data-id="${response.data[i]['id']}" data-status="${response.data[i]['status']}" data-shift="1" data-toggle="modal" data-target="#oeeDetailLogModal">
                                                <i class="fas fa-list"></i>     
                                            </button>    
                                            <button class="btn btn-sm btn-success getReportOeeDetail" title="Export to Excell" data-date="${response.data[i].date}" data-machine="${response.data[i].machineId}" data-oee_master_id="${response.data[i].id}" data-toggle="modal" data-target="#getReportOeeDetail">
                                                <i class="fas fa-file"></i>
                                            </button>   
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
    function logTable(status,shift,id){
        
        $('#oeeAdapterZoneTable').DataTable().clear();
        $('#oeeAdapterZoneTable').DataTable().destroy();
        $('#oeeTempExtruderTable').DataTable().clear();
        $('#oeeTempExtruderTable').DataTable().destroy();
        $('#oeeDieHeatTable').DataTable().clear();
        $('#oeeDieHeatTable').DataTable().destroy();
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
                        "aaSorting" : false,
                        "paging":   false,
                        "scrollX":true
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
                        "aaSorting" : false,
                        "paging":   false,
                        "scrollX":true
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
                        "scrollX":true
                    }).columns.adjust()
                    if(response.detail == null){
                    $('#logScrewSpeed').val( )
                    $('#logDosingSpeed').val()
                    $('#logMainDrive').val()
                    $('#logVacumCylinder').val()
                    $('#logMeltTemp').val()
                    $('#logMeltPress').val()
                    $('#logVacumTank').val()
                    $('#logHaulOffSpeed').val()
                    $('#logWaterTemp').val()
                    $('#logWaterPress').val()
                    $('#logProductWeight').val()
                    $('#logProductName').val()
                    }
                    $('#logScrewSpeed').val(response.detail.screwSpeed === null ?'':response.detail.screwSpeed )
                    $('#logDosingSpeed').val(response.detail.dosingSpeed == null ? '':response.detail.dosingSpeed)
                    $('#logMainDrive').val(response.detail.mainDrive == null ? '':response.detail.mainDrive)
                    $('#logVacumCylinder').val(response.detail.vacumCylinder == null ? '':response.detail.vacumCylinder)
                    $('#logMeltTemp').val(response.detail.meltTemp == null ?'':response.detail.meltTemp)
                    $('#logMeltPress').val(response.detail.meltPress == null ? '': response.detail.meltPress)
                    $('#logVacumTank').val(response.detail.vacumTank == null ? '': response.detail.vacumTank)
                    $('#logHaulOffSpeed').val(response.detail.haulOffSpeed == null ?'': response.detail.haulOffSpeed)
                    $('#logWaterTemp').val(response.detail.waterTemperature == null ?'': response.detail.waterTemperature)
                    $('#logWaterPress').val(response.detail.waterPressure == null ?'': response.detail.waterPressure)
                    $('#logProductWeight').val(response.detail.weight ==null ?'':response.detail.weight)
                    $('#logProductName').val(response.detail.productName == null ?'': response.detail.productName)


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
                'id': id
            },
            success: (response) => {
                // console.log(response.data['oeeMaster']['goodProductActualPcs'])
                // console.log(response.data['oeeMaster']['goodProductActualKg'])
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
                // $.each(response.data['oeeDetail'], function(i, data) {})
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
</script>