<script>
    getProductLength()
    $('#btnAddProductLength').on('click', function(){
        var data ={
            'productLength':$('#productLength').val(),
            'productLengthUnit':$('#productLengthUnit').val(),
        }
        store('addProductLength',data,'productLength')
    })
    $('#btnUpdateProductLength').on('click', function(){
        var data ={
            'id':$('#productLengthId').val(),
            'productLengthUpdate':$('#productLengthUpdate').val(),
            'productLengthUnitUpdate':$('#productLengthUnitUpdate').val(),
        }
        store('updateProductLength',data,'productLength')
    })
    $('#productLengthTable').on('click', '.editProductLength', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('detailProductLength')}}",
                type: "get",
                dataType: 'json',
                async: true,
                data: {
                    'id': id
                },
                success: function(response) {                   
                    $('#productLengthId').val(id)
                    $('#productLengthUpdate').val(response.detail.productLength)
                    $('#productLengthUnitUpdate').val(response.detail.productLengthUnit)
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
    $('#productLengthTable').on('click', '.deleteProductLength', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('deleteProductLength')}}",
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
                        getProductLength()
                    }else{
                        toastr['error'](response.message);
                    }
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
   function getProductLength()
   {
        $('#productLengthTable').DataTable().clear();
        $('#productLengthTable').DataTable().destroy();
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getProductLength')}}",
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
                                <td style="width:25%;text-align:left;">${response.data[i]['productLength']==null?'':response.data[i]['productLength']}</td>
                                <td style="width:25%;text-align:center;">${response.data[i]['productLengthUnit']==null?'':response.data[i]['productLengthUnit']}</td>
                                <td style="width:25%;text-align:center">
                                        <button title="Detail" class="editProductLength btn btn-primary rounded"data-id="${response.data[i]['id']}" data-toggle="modal" data-target="#editProductLength">
                                            <i class="fas fa-solid fa-eye"></i>
                                        </button> 
                                        <button title="Detail" class="deleteProductLength btn btn-danger rounded"data-id="${response.data[i]['id']}">
                                            <i class="fas fa-solid fa-trash"></i>
                                        </button> 
                                </td>
                            </tr>
                            `;
                }
                    $('#productLengthTable > tbody:first').html(data);
                    $('#productLengthTable').DataTable({
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