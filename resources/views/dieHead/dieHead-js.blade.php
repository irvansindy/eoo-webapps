<script>
    getDieHead()
    $('#addDieHead').on('click', function(){
        select_active('getMachineName','selectMachine','Mesin')
    })
    $('#selectMachine').on('change', function(){
        var selectMachine = $('#selectMachine').val()
        $('#machineId').val(selectMachine)
    })
    $('#selectMachineUpdate').on('change', function(){
        var selectMachineUpdate = $('#selectMachineUpdate').val()
        $('#machineIdUpdate').val(selectMachineUpdate)
    })
    $('#btnAddDieHead').on('click', function(){
        var data ={
            'machineId':$('#machineId').val(),
            'dieHeadName':$('#dieHeadName').val(),
        }
        store('addDieHead',data,'dieHead')
    })
    $('#btnUpdateDieHead').on('click', function(){
        var data ={
            'machineIdUpdate':$('#machineIdUpdate').val(),
            'dieHeadNameUpdate':$('#dieHeadNameUpdate').val(),
            'id':$('#dieHeadId').val()
        }
        store('updateDieHead',data,'dieHead')
    })
    $('#dieHeadTable').on('click', '.editDieHead', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('detailDieHead')}}",
                type: "get",
                dataType: 'json',
                async: true,
                data: {
                    'id': id
                },
                success: function(response) {
                    $('.message_error').html('')               
                    $('#dieHeadId').val(id)
                    $('#dieHeadNameUpdate').val(response.detail.name)
                    $('#machineIdUpdate').val(response.detail.machineId)
                    $('#selectMachineUpdate').empty();
                    $('#selectMachineUpdate').append('<option value ="'+response.detail.machineId+'">'+response.detail.machineName+'</option>');
                    $.each(response.data,function(i,data){
                        $('#selectMachineUpdate').append('<option value="'+data.id+'">' + data.name +'</option>');
                    });
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
    $('#dieHeadTable').on('click', '.deleteDieHead', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('deleteDieHead')}}",
                type: "get",
                dataType: 'json',
                async: true,
                data: {
                    'id': id
                },
                success: function(response) {                   
                    if(response.status==200)
                    {
                        toastr['success'](response.message);
                        getDieHead()
                    }else{
                        toastr['error'](response.message);
                    }
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
    function getDieHead(){
        $('#dieHeadTable').DataTable().clear();
        $('#dieHeadTable').DataTable().destroy();
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getDieHead')}}",
            type: "get",
            dataType: 'json',
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
                                <td style="width:25%;text-align:left;">${response.data[i]['name']==null?'':response.data[i]['name']}</td>
                                <td style="width:25%;text-align:center;">${response.data[i]['machineName']==null?'':response.data[i]['machineName']}</td>
                                <td style="width:25%;text-align:center">
                                        <button title="Detail" class="editDieHead btn btn-primary rounded"data-id="${response.data[i]['id']}" data-toggle="modal" data-target="#editDieHead">
                                            <i class="fas fa-solid fa-eye"></i>
                                        </button> 
                                        <button title="Detail" class="deleteDieHead btn btn-danger rounded"data-id="${response.data[i]['id']}">
                                            <i class="fas fa-solid fa-trash"></i>
                                        </button> 
                                </td>
                            </tr>
                            `;
                }
                    $('#dieHeadTable > tbody:first').html(data);
                    $('#dieHeadTable').DataTable({
                        scrollX  : true,
                        scrollY  :220
                    }).columns.adjust()
            },
            error: function(xhr, status, error) {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        });
    }
</script>