<script>
    getProductVariant()
    $('#btnAddProductVariant').on('click', function(){
        var data ={
            'productVariant':$('#productVariant').val()
        } 
        store('addProductVariant',data,'productVariant')
    })
    $('#btnUpdateProductVariant').on('click', function(){
        var data ={
            'id':$('#productVariantId').val(),
            'productVariantUpdate':$('#productVariantUpdate').val()
        } 
        store('updateProductVariant',data,'productVariant')
    })
    $('#productVariantTable').on('click', '.editProductVariant', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('detailProductVariant')}}",
                type: "get",
                dataType: 'json',
                async: true,
                data: {
                    'id': id
                },
                success: function(response) {                   
                    $('#productVariantId').val(id)
                    $('#productVariantUpdate').val(response.detail.productVariant)
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
    $('#productVariantTable').on('click', '.deleteProductVariant', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('deleteProductVariant')}}",
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
                        getProductVariant()
                    }else{
                        toastr['error'](response.message);
                    }
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
   function getProductVariant()
   {
        $('#productVariantTable').DataTable().clear();
        $('#productVariantTable').DataTable().destroy();
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getProductVariant')}}",
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
                                <td style="width:25%;text-align:center;">${response.data[i]['productVariant']==null?'':response.data[i]['productVariant']}</td>
                                <td style="width:25%;text-align:center">
                                        <button title="Detail" class="editProductVariant btn btn-primary rounded"data-id="${response.data[i]['id']}" data-toggle="modal" data-target="#editProductVariant">
                                            <i class="fas fa-solid fa-eye"></i>
                                        </button> 
                                        <button title="Detail" class="deleteProductVariant btn btn-danger rounded"data-id="${response.data[i]['id']}">
                                            <i class="fas fa-solid fa-trash"></i>
                                        </button> 
                                </td>
                            </tr>
                            `;
                }
                    $('#productVariantTable > tbody:first').html(data);
                    $('#productVariantTable').DataTable({
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