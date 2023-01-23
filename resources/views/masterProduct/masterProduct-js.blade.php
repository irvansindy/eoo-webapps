<script>
    // get data master product
    getDataMasterProduct()
    function getDataMasterProduct() {
        $('#officeTable').DataTable().clear();
        $('#officeTable').DataTable().destroy();

        $.ajax({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('getMasterProduct') }}",
            type: 'GET',
            dataType: 'json',
            async: true,
            beforeSend: () => {
                SwalLoading('Please wait ...');
            },
            success: (response) => {
                swal.close()

                var data = '';

                for (let index = 0; index < response.data.length; index++) {
                    data += `
                        <tr style="text-align: center">
                            <td style="width:25%;text-align:center;">
                                ${response.data[index]['productName'] == null ? '' : response.data[index]['productName']}
                            </td>
                            <td style="width:25%;text-align:center;">
                                ${response.data[index]['kgPerHour'] == null ? '' : response.data[index]['kgPerHour']}
                            </td>
                            <td style="width:25%;text-align:center;">
                                ${response.data[index]['pcsPerHour'] == null ? '' : response.data[index]['pcsPerHour']}
                            </td>
                            <td style="width:25%;text-align:center;">
                                ${response.data[index]['kgPerDay'] == null ? '' : response.data[index]['kgPerDay']}
                            </td>
                            <td style="width:25%;text-align:center;">
                                ${response.data[index]['pcsPerDay'] == null ? '' : response.data[index]['pcsPerDay']}
                            </td>
                            <td style="width:25%;text-align:center;">
                                ${response.data[index]['productionAccuracyTolerancePerPcs'] == null ? '' : response.data[index]['productionAccuracyTolerancePerPcs']}
                            </td>
                            <td style="width:25%;text-align:center">
                                <button title="Detail" class="editMasterProduct btn btn-primary rounded" data-id="${response.data[index]['id']}" data-toggle="modal" data-target="#editMasterProduct">
                                    <i class="fas fa-solid fa-eye"></i>
                                </button> 
                                <button title="Detail" class="deleteMasterProduct btn btn-danger rounded" data-id="${response.data[index]['id']}">
                                    <i class="fas fa-solid fa-trash"></i>
                                </button> 
                            </td>
                        </tr>
                    `;
                }
                $('#officeTable > tbody:first').html(data);
                $('#officeTable').DataTable({
                    scrollX: true,
                    scrollY: 220,
                }).columns.adjust();
            },
            error: (xhr, status, error) => {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        })
    }

    // select 2 for create product
    $('#addProduct').on('click', function() {
        // get data master product type
        select_active('getProductType', 'productTypeId', 'Tipe Produk')
        // get data master product diameter
        select_active('getProductDiameterName', 'productDiameterId', 'Diameter Produk')
        // get data master product length
        select_active('getProductLengthName', 'productlengthId', 'Panjang Produk')
        // get data master product variant
        select_active('getProductVariantName', 'productvariantId', 'Varian Produk')
    })

    // create data master product
    $('#btnAddMasterProduct').on('click', function() {
        let data = {
            'productName': $('#productName').val(),
            // 'machineId': $('#machineId').val(),
            'productTypeId': $('#productTypeId').val(),
            'productDiameterId': $('#productDiameterId').val(),
            'productlengthId': $('#productlengthId').val(),
            'productvariantId': $('#productvariantId').val(),
            'productWeightStandard': $('#productWeightStandard').val(),
            'kgPerHour': $('#kgPerHour').val(),
            'pcsPerHour': $('#pcsPerHour').val(),
            'kgPerDay': $('#kgPerDay').val(),
            'pcsPerDay': $('#pcsPerDay').val(),
            'productionAccuracyTolerancePerPcs': $('#productionAccuracyTolerancePerPcs').val(),
            'productFormula': $('#productFormula').val(),
            'productSocket': $('#productSocket').val(),
        }

        store('storeProduct', data, 'products')
    })

    // update data master product
    $('#btnUpdateMasterProduct').on('click', function() {
        let data = {
            'id':$('#productId').val(),
            'productNameUpdate': $('#productNameUpdate').val(),
            'productTypeUpdateId': $('#productTypeUpdateId').val(),
            'productDiameterUpdateId': $('#productDiameterUpdateId').val(),
            'productlengthUpdateId': $('#productlengthUpdateId').val(),
            'productvariantUpdateId': $('#productvariantUpdateId').val(),
            'productWeightStandardUpdate': $('#productWeightStandardUpdate').val(),
            'kgPerHourUpdate': $('#kgPerHourUpdate').val(),
            'pcsPerHourUpdate': $('#pcsPerHourUpdate').val(),
            'kgPerDayUpdate': $('#kgPerDayUpdate').val(),
            'pcsPerDayUpdate': $('#pcsPerDayUpdate').val(),
            'productionAccuracyTolerancePerPcsUpdate': $('#productionAccuracyTolerancePerPcsUpdate').val(),
            'productFormulaUpdate': $('#productFormulaUpdate').val(),
            'productSocketUpdate': $('#productSocketUpdate').val()
        }
        store('updateProduct', data, 'products')
    })

    // get data product for update
    $('#officeTable').on('click', '.editMasterProduct', function(e) {
        let id = $(this).data('id')
        e.preventDefault()

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('editProduct') }}",
            type: "get",
            dataType: 'json',
            async: true,
            data: {
                'id': id
            },
            success: function(response) {
                $('#productId').val(id)
                $('#productNameUpdate').val(response.data[0]['productName'])
                
                $('#valueProductTypeUpdateId').val(response.data[0]['productTypeId'])
                $('#productTypeUpdateId').empty()
                $('#productTypeUpdateId').append('<option value="'+response.data[0]['productTypeId']+'">'+response.data[0]['productType']+'</option>')
                $.each(response.data[2], function(i, data) {
                    $('#productTypeUpdateId').append('<option value="'+data.id+'">'+data.productType+'</option>')
                })

                $('#valueProductDiameterUpdateId').val(response.data[0]['productDiameterId'])
                $('#productDiameterUpdateId').empty()
                $('#productDiameterUpdateId').append('<option value="'+response.data[0]['productDiameterId']+'">'+response.data[0]['productDiameter']+'</option>')
                $.each(response.data[3], function(i, data) {
                    $('#productDiameterUpdateId').append('<option value="'+data.id+'">'+data.productDiameter+'</option>')
                })
                
                $('#valueProductlengthUpdateId').val(response.data[0]['productlengthId'])
                $('#productlengthUpdateId').empty()
                $('#productlengthUpdateId').append('<option value="'+response.data[0]['productlengthId']+'">'+response.data[0]['productLength']+'</option>')
                $.each(response.data[4], function(i, data) {
                    $('#productlengthUpdateId').append('<option value="'+data.id+'">'+data.productLength+'</option>')
                })
                
                $('#valueProductvariantUpdateId').val(response.data[0]['productvariantId'])
                $('#productvariantUpdateId').empty()
                $('#productvariantUpdateId').append('<option value="'+response.data[0]['productvariantId']+'">'+response.data[0]['productVariant']+'</option>')
                $.each(response.data[5], function(i, data) {
                    $('#productvariantUpdateId').append('<option value="'+data.id+'">'+data.productVariant+'</option>')
                })

                $('#productWeightStandardUpdate').val(response.data[0]['productWeightStandard'])
                $('#kgPerHourUpdate').val(response.data[0]['kgPerHour'])
                $('#pcsPerHourUpdate').val(response.data[0]['pcsPerHour'])
                $('#kgPerDayUpdate').val(response.data[0]['kgPerDay'])
                $('#pcsPerDayUpdate').val(response.data[0]['pcsPerDay'])
                $('#productionAccuracyTolerancePerPcsUpdate').val(response.data[0]['productionAccuracyTolerancePerPcs'])
                $('#productFormulaUpdate').val(response.data[0]['productFormula'])
                $('#productSocketUpdate').val(response.data[0]['productSocket'])
            },
            error: function(xhr, status, error) {
                toastr['error']('gagal mengambil data, silakan hubungi ICT Developer');
            }
        })
    })

    // delete data product
    $('#officeTable').on('click', '.deleteMasterProduct', function(e) {
        let id = $(this).data('id')
        e.preventDefault()
        $.ajax({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('deleteProduct') }}",
            type: 'GET',
            dataType: 'json',
            async: true,
            data: {
                'id': id
            },
            success: function(response) {
                if(response.meta.code == 200) {
                    toastr['success'](response.meta.message);
                    getDataMasterProduct()
                } else {
                    toastr['error'](response.meta.message);
                }
            },
            error: function(xhr, status, error) {
                toastr['error']('gagal menghapus data, silakan hubungi ICT Developer');
            }
        })
    })
</script>