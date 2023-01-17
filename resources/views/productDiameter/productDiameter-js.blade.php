<script>
    // get all data diameter product 
    getDataProductDiameter()

    // create data diameter product
    $('#btnAddProductDiameter').on('click', function() {
        let data = {
            'productDiameter':$('#productDiameter').val(),
            'productDiameterUnit':$('#productDiameterUnit').val()
        }
        store('storeProductDiameter', data, 'productDiameter')
    })

    // update data diameter product
    $('#btnEditProductDiameter').on('click', function() {
        let data = {
            'id':$('#productDiameterId').val(),
            'updateProductDiameter':$('#updateProductDiameter').val(),
            'updateProductDiameterUnit':$('#updateProductDiameterUnit').val()
        }
        store('updateProductDiameter', data, 'productDiameter')
    })

    // get data for update
    $('#productDiameterTable').on('click', '.editProductDiameter', function(e) {
        let id = $(this).data('id')
        e.preventDefault()
        $.ajax({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('editProductDiameter') }}",
            type: "get",
            dataType: 'json',
            async: true,
            data: {
                'id': id
            },
            success: function(response) {
                $('#productDiameterId').val(id)
                $('#updateProductDiameter').val(response.data.productDiameter)
                $('#updateProductDiameterUnit').val(response.data.productDiameterUnit)
            },
            error: function(xhr, status, error) {
                
                toastr['error']('gagal mengambil data, silakan hubungi ICT Developer');
            }

        })
    })

    // delete data diameter product
    $('#productDiameterTable').on('click', '.deleteProductDiameter', function(e) {
        var id =$(this).data('id')
        e.preventDefault()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('deleteProductDiameter') }}",
            type: 'get',
            dataType: 'json',
            async:true,
            data: {
                'id': id
            },
            success: function(response) {
                if(response.meta.code == 200) {
                    toastr['success'](response.meta.message);
                    getDataProductDiameter()
                } else {
                    toastr['error'](response.meta.message);
                }
            },
            error: function(xhr, status, error) {
                toastr['error']('gagal mengambil data, silakan hubungi ICT Developer');
            }
        })
    })

    function getDataProductDiameter() {
        $('#productDiameterTable').DataTable().clear();
        $('#productDiameterTable').DataTable().destroy();

        $.ajax({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('getProductDiameter') }}",
            type: 'GET',
            dataType: 'json',
            async: true,
            beforeSend: () => {
                SwalLoading('Please wait ...');
            },
            success: (response) => {
                swal.close();

                var data = '';
                for (let index = 0; index < response.data.length; index++) {
                    // const element = array[index];
                    data += `
                        <tr style="text-align: center">
                            <td style="width:25%;text-align:center;">
                                ${response.data[index]['productDiameter'] == null ? '' : response.data[index]['productDiameter']}
                            </td>
                            <td style="width:25%;text-align:center;">
                                ${response.data[index]['productDiameterUnit'] == null ? '' : response.data[index]['productDiameterUnit']}
                            </td>
                            <td style="width:25%;text-align:center">
                                <button title="Detail" class="editProductDiameter btn btn-primary rounded" data-id="${response.data[index]['id']}" data-toggle="modal" data-target="#editProductDiameter">
                                    <i class="fas fa-solid fa-eye"></i>
                                </button> 
                                <button title="Detail" class="deleteProductDiameter btn btn-danger rounded" data-id="${response.data[index]['id']}">
                                    <i class="fas fa-solid fa-trash"></i>
                                </button> 
                            </td>
                        </tr>
                    `;
                }
                $('#productDiameterTable > tbody:first').html(data);
                $('#productDiameterTable').DataTable({
                    scrollX: true,
                    scrollY: 220,
                }).columns.adjust();
            },
            error: (xhr, status, error) => {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        });
    }
</script>