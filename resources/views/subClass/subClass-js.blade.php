<script>
    getSubClass()
    $('#selectProductClass').on('change', function(){
        var selectProductClass = $('#selectProductClass').val()
        $('#productClassId').val(selectProductClass)
    })
    $('#selectProductClassUpdate').on('change', function(){
        var selectProductClassUpdate = $('#selectProductClassUpdate').val()
        $('#productClassIdUpdate').val(selectProductClassUpdate)
    })
    $('#addSubClass').on('click', function(){
        select_active('getProductClass','selectProductClass','Product Class')
    })
    $('#btnAddSubClass').on('click', function(){
        var data ={
            'subClassName':$('#subClassName').val(),
            'productClassId':$('#productClassId').val()
        }
        store('addSubClass',data,'subClass')
    })
    $('#btnUpdateSubClass').on('click', function(){
        var data = {
            'id' : $('#subClassId').val(),
            'subClassNameUpdate':$('#subClassNameUpdate').val(),
            'productClassIdUpdate':$('#productClassIdUpdate').val(),
        }
        store('updateSubClass',data,'subClass')
    })
    $('#subClassTable').on('click', '.editSubClass', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('detailSubClass')}}",
                type: "get",
                dataType: 'json',
                async: true,
                data: {
                    'id': id
                },
                success: function(response) {                   
                    $('#subClassId').val(id)
                    $('#subClassNameUpdate').val(response.detail.subClassName)
                    $('#productClassIdUpdate').val(response.detail.productClassId)
                    $('#selectProductClassUpdate').empty();
                    $('#selectProductClassUpdate').append('<option value ="'+response.detail.productClassId+'">'+response.detail.productClassName+'</option>');
                    $.each(response.productType,function(i,data){
                        $('#selectProductClassUpdate').append('<option value="'+data.id+'">' + data.name +'</option>');
                    });
                    
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
    $('#subClassTable').on('click', '.deleteSubClass', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('deleteSubClass')}}",
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
                        getSubClass()
                    }else{
                        toastr['error'](response.message);
                    }
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
     function getSubClass()
   {
        $('#subClassTable').DataTable().clear();
        $('#subClassTable').DataTable().destroy();
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getSubClass')}}",
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
                                <td style="width:25%;text-align:left;">${response.data[i]['subClassName']==null?'':response.data[i]['subClassName']}</td>
                                <td style="width:25%;text-align:center;">${response.data[i]['productClassName']==null?'':response.data[i]['productClassName']}</td>
                                <td style="width:25%;text-align:center">
                                        <button title="Detail" class="editSubClass btn btn-primary rounded"data-id="${response.data[i]['id']}" data-toggle="modal" data-target="#editSubClass">
                                            <i class="fas fa-solid fa-eye"></i>
                                        </button> 
                                        <button title="Detail" class="deleteSubClass btn btn-danger rounded"data-id="${response.data[i]['id']}">
                                            <i class="fas fa-solid fa-trash"></i>
                                        </button> 
                                </td>
                            </tr>
                            `;
                }
                    $('#subClassTable > tbody:first').html(data);
                    $('#subClassTable').DataTable({
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