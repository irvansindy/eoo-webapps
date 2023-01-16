<script>
    $('#addMachine').on('click', function(){
        select_active('getOfficeName','selectMachineOffice','Kantor')
    })
    $('#selectMachineOffice').on('change', function(){
        var selectMachineOffice= $('#selectMachineOffice').val()
        $('#machineOfficeId').val(selectMachineOffice)
    })
    $('#selectTypeMachine').on('change', function(){
        var selectTypeMachine= $('#selectTypeMachine').val()
        $('#machineType').val(selectTypeMachine)
    })
    $('#selectMachineOfficeUpdate').on('change', function(){
        var selectMachineOfficeUpdate= $('#selectMachineOfficeUpdate').val()
        $('#machineOfficeIdUpdate').val(selectMachineOfficeUpdate)
    })
    $('#selectTypeMachineUpdate').on('change', function(){
        var selectTypeMachineUpdate= $('#selectTypeMachineUpdate').val()
        $('#machineTypeUpdate').val(selectTypeMachineUpdate)
    })
    $('#btnAddMachine').on('click', function(){
        var data ={
            'machineName':$('#machineName').val(),
            'machineType':$('#machineType').val(),
            'machineOfficeId':$('#machineOfficeId').val(),
            'machineSmall':$('#machineSmall').val(),
            'machineMedium':$('#machineMedium').val(),
            'machineLarge':$('#machineLarge').val(),
        }
        store('addMachine',data,'masterMachine')
    })
    $('#btnUpdateMachine').on('click', function(){
        var data ={
            'machineNameUpdate':$('#machineNameUpdate').val(),
            'machineTypeUpdate':$('#machineTypeUpdate').val(),
            'machineOfficeIdUpdate':$('#machineOfficeIdUpdate').val(),
            'machineSmallUpdate':$('#machineSmallUpdate').val(),
            'machineMediumUpdate':$('#machineMediumUpdate').val(),
            'machineLargeUpdate':$('#machineLargeUpdate').val(),
            'id':$('#machineId').val(),
        }
        store('updateMachine',data,'masterMachine')
    })
    $('#machineTable').on('click', '.deleteMachine', function(e) {
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var id =$(this).data('id')
                e.preventDefault()       
                    $.ajax({
                        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('deleteMachine')}}",
                    type: "get",
                    dataType: 'json',
                    async: true,
                    data: {
                        'id': id
                    },
                    success: function(response) { 
                        if(response.status==200){
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                            getMachine()
                        }else{
                            toastr['error'](response.meta.message);
                        }   
                    },
                    error: function(xhr, status, error) {
                    
                        toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                    }
                });
            }
        })  
    });
    $('#machineTable').on('click', '.editMachine', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('detailMachine')}}",
                type: "get",
                dataType: 'json',
                async: true,
                data: {
                    'id': id
                },
                success: function(response) {                   
                    $('#machineId').val(id),
                    $('#machineNameUpdate').val(response.detail.machineName)
                    $('#machineTypeUpdate').val(response.detail.machineTypeId)
                    $('#selectTypeMachineUpdate').empty()
                    $('#selectTypeMachineUpdate').append('<option>'+response.detail.typeName+'</option>')
                    $.each(response.type,function(i,data){
                        $('#selectTypeMachineUpdate').append('<option value="'+data.id+'">' + data.name +'</option>');
                    });
                    $('#machineOfficeIdUpdate').val(response.detail.officeId),
                    $('#selectMachineOfficeUpdate').empty()
                    $('#selectMachineOfficeUpdate').append('<option>'+response.detail.officeName+'</option>')
                    $.each(response.office,function(i,data){
                        $('#selectMachineOfficeUpdate').append('<option value="'+data.id+'">' + data.officeName +'</option>');
                    });
                    $('#machineSmallUpdate').val(response.capacity.small)
                    $('#machineMediumUpdate').val(response.capacity.medium)
                    $('#machineLargeUpdate').val(response.capacity.large)
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });

    getMachine()
     function getMachine(){
        $('#machineTable').DataTable().clear();
        $('#machineTable').DataTable().destroy();
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getMachine')}}",
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
                                <td style="width:25%;text-align:center;">${response.data[i]['machineNumber']==null?'':response.data[i]['machineNumber']}</td>
                                <td style="width:25%;text-align:center;">${response.data[i]['machineName']==null?'':response.data[i]['machineName']}</td>
                                <td style="width:25%;text-align:center;">${response.data[i]['typeName']==null?'':response.data[i]['typeName']}</td>
                                <td style="width:25%;text-align:left;">${response.data[i]['officeName']==null?'':response.data[i]['officeName']}</td>
                                <td style="width:25%;text-align:center">
                                        <button title="Detail" class="editMachine btn btn-primary rounded"data-id="${response.data[i]['id']}" data-toggle="modal"        data-target="#editMachine">
                                            <i class="fas fa-solid fa-eye"></i>
                                        </button> 
                                        <button title="Detail" class="deleteMachine btn btn-danger rounded"data-id="${response.data[i]['id']}">
                                            <i class="fas fa-solid fa-trash"></i>
                                        </button> 
                                </td>
                            </tr>
                            `;
                }
                    $('#machineTable > tbody:first').html(data);
                    $('#machineTable').DataTable({
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