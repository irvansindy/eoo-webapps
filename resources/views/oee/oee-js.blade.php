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
        var data =[];
        for(i = 0; i < ext; i++ ){
           var  arr_extZone = extZone[i].value;
           var extId = 'extZone'+ i+1
           var extObj ={
            [`extZone${i+1}`] : arr_extZone
           }
           data.push(extObj) 
        }
        for(j = 0; j < die; j++ ){
           var  arr_dieZone = dieZone[j].value;
         
           var dieObj ={
            [`dieZone${j+1}`] : arr_dieZone
           }
           data.push(dieObj) 
        }
        
        var obj={
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
        }
        data.push(obj)
    })
    getOee()
      
    $(document).on("click", ".addOeeDetailModal", function(){
        var die = $(this).data('die')
        var ext = $(this).data('ext')
        $('#dieLength').val(die)
        $('#extLength').val(ext)
        var  renderHTMLExt =''
        var  renderHTMLDie =''
        select_active('getProductName','selectProduct','Produk')
        for(i = 0; i < ext; i++){
            renderHTMLExt +=`<div class="col-md-1 mt-2">
                                <label>Zone ${i + 1}</label>
                            </div>
                            <div class="col-md-2">
                            <input type="text" class="form-control extZone" name="extZone" id="extZone${i + 1}">
                            <span  style="color:red;" class="message_error text-red block extZone${i + 1}_error"></span>
                        </div>
                            `
        }
        $('#ext_container').html(renderHTMLExt);
        for(j = 0; j < die; j++){
            renderHTMLDie +=`<div class="col-md-1 mt-2">
                                <label>Zone ${j + 1}</label>
                            </div>
                            <div class="col-md-2">
                            <input type="text" class="form-control dieZone" name ="dieZone" id="dieZone${j + 1}">
                            <span  style="color:red;" class="message_error text-red block dieZone${j + 1}_error"></span>
                        </div>
                            `
        }
        $('#die_container').html(renderHTMLDie);

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
                                        <button title="Detail" id="oeeDetail" class="addOeeDetailModal btn btn-sm btn-primary rounded"data-id="${response.data[i]['id']}" data-ext ="${response.length[0].length}" data-die ="${response.length[1].length}"  data-toggle="modal" data-target="#addOeeDetailModal">
                                                <ion-icon name="eye"></ion-icon>        
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
</script>