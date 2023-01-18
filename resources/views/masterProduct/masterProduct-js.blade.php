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

    $('#addProduct').on('click', function() {
        // get data master machine
        select_active('getMachineName', 'machineId', 'Mesin')
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
            'machineId': $('#machineId').val(),
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
            'productNameUpdate': $('#productNameUpdate').val(),
            'machineUpdateId': $('#machineUpdateId').val(),
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
            'productSocketUpdate': $('#productSocketUpdate').val(),
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
                $('#productNameUpdate').val(response.data.productName)
                $('#valueMachineUpdateId').val(response.data.machineId)
                $('#valueMachineUpdateId').val(response.data.productTypeId)
                $('#valueProductDiameterUpdateId').val(response.data.productDiameterId)
                $('#valueProductlengthUpdateId').val(response.data.productlengthId)
                $('#valueProductvariantUpdateId').val(response.data.productvariantId)
                $('#productTypeUpdateId').val()
                $('#productlengthUpdateId').val()
                $('#productvariantUpdateId').val()
                $('#productWeightStandardUpdate').val()
                $('#kgPerHourUpdate').val(response.data.kgPerHour)
                $('#pcsPerHourUpdate').val(response.data.pcsPerHour)
                $('#kgPerDayUpdate').val(response.data.kgPerDay)
                $('#pcsPerDayUpdate').val(response.data.pcsPerDay)
                $('#productionAccuracyTolerancePerPcsUpdate').val(response.data.productionAccuracyTolerancePerPcs)
                $('#productFormulaUpdate').val(response.data.productFormula)
                $('#productSocketUpdate').val(response.data.productSocket)
            },
            error: function(xhr, status, error) {
                toastr['error']('gagal mengambil data, silakan hubungi ICT Developer');
            }
        })
    })
</script>