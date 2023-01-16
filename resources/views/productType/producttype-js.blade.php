<script>
    getProductType()
    $('#btnAddProductType').on('click', function(){
        var data ={
            'productType':$('#productType').val()
        } 
        store('addProductType',data,'productType')
    })
    $('#btnUpdateProductType').on('click', function(){
        var data ={
            'id':$('#productTypeId').val(),
            'productTypeUpdate':$('#productTypeUpdate').val()
        } 
        store('updateProductType',data,'productType')
    })
    $('#productTypeTable').on('click', '.editProductType', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('detailProductType')}}",
                type: "get",
                dataType: 'json',
                async: true,
                data: {
                    'id': id
                },
                success: function(response) {                   
                    $('#productTypeId').val(id)
                    $('#productTypeUpdate').val(response.detail.productType)
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
    $('#productTypeTable').on('click', '.deleteProductType', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('deleteProductType')}}",
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
                        getProductType()
                    }else{
                        toastr['error'](response.message);
                    }
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
   function getProductType()
   {
        $('#productTypeTable').DataTable().clear();
        $('#productTypeTable').DataTable().destroy();
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getProductType')}}",
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
                                <td style="width:25%;text-align:center;">${response.data[i]['productType']==null?'':response.data[i]['productType']}</td>
                                <td style="width:25%;text-align:center">
                                        <button title="Detail" class="editProductType btn btn-primary rounded"data-id="${response.data[i]['id']}" data-toggle="modal" data-target="#editProductType">
                                            <i class="fas fa-solid fa-eye"></i>
                                        </button> 
                                        <button title="Detail" class="deleteProductType btn btn-danger rounded"data-id="${response.data[i]['id']}">
                                            <i class="fas fa-solid fa-trash"></i>
                                        </button> 
                                </td>
                            </tr>
                            `;
                }
                    $('#productTypeTable > tbody:first').html(data);
                    $('#productTypeTable').DataTable({
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