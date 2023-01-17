<script>
    getProductClass()
    $('#addProductClass').on('click', function(){
        select_active('getProductType','selectProductType','Tipe Produk')
    })
    $('#selectProductType').on('change', function(){
        var selectProductType = $('#selectProductType').val()
        $('#productTypeId').val(selectProductType)
    })
    $('#selectProductTypeUpdate').on('change', function(){
        var selectProductTypeUpdate = $('#selectProductTypeUpdate').val()
        $('#productTypeIdUpdate').val(selectProductTypeUpdate)
    })
    $('#btnAddProductClass').on('click', function(){
        var data ={
            'productTypeId':$('#productTypeId').val(),
            'productClass':$('#productClass').val()
        }
        store('addProductClass',data,'productClass')
    })
    $('#btnUpdateProductClass').on('click', function(){
        var data ={
            'id':$('#productClassId').val(),
            'productTypeIdUpdate':$('#productTypeIdUpdate').val(),
            'productClassUpdate':$('#productClassUpdate').val()
        }
        store('updateProductClass',data,'productClass')
    })
    $('#productClassTable').on('click', '.editProductClass', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('detailProductClass')}}",
                type: "get",
                dataType: 'json',
                async: true,
                data: {
                    'id': id
                },
                success: function(response) {                   
                    $('#productClassId').val(id)
                    $('#productClassUpdate').val(response.detail.productClass)
                    $('#productTypeIdUpdate').val(response.detail.productTypeId)
                    $('#selectProductTypeUpdate').empty();
                    $('#selectProductTypeUpdate').append('<option value ="'+response.detail.productTypeId+'">'+response.detail.productType+'</option>');
                    $.each(response.productType,function(i,data){
                        $('#selectProductTypeUpdate').append('<option value="'+data.id+'">' + data.name +'</option>');
                    });
                    
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
    $('#productClassTable').on('click', '.deleteProductClass', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('deleteProductClass')}}",
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
                        getProductClass()
                    }else{
                        toastr['error'](response.message);
                    }
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
    function getProductClass()
   {
        $('#productClassTable').DataTable().clear();
        $('#productClassTable').DataTable().destroy();
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getProductClass')}}",
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
                                <td style="width:25%;text-align:center;">${response.data[i]['name']==null?'':response.data[i]['name']}</td>
                                <td style="width:25%;text-align:center;">${response.data[i]['productType']==null?'':response.data[i]['productType']}</td>
                                <td style="width:25%;text-align:center">
                                        <button title="Detail" class="editProductClass btn btn-primary rounded"data-id="${response.data[i]['id']}" data-toggle="modal" data-target="#editProductClassModal">
                                            <i class="fas fa-solid fa-eye"></i>
                                        </button> 
                                        <button title="Detail" class="deleteProductClass btn btn-danger rounded"data-id="${response.data[i]['id']}">
                                            <i class="fas fa-solid fa-trash"></i>
                                        </button> 
                                </td>
                            </tr>
                            `;
                }
                    $('#productClassTable > tbody:first').html(data);
                    $('#productClassTable').DataTable({
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