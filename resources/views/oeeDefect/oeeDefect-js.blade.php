<script>
    // get all data oee defect
    getDataOeeDefect()

    // create data oee defect
    $('#btnAddOeeDefect').on('click', () => {
        let data = {
            'defectName':$('#defectName').val()
        }
        store('storeOeeDefect', data, 'oeeDefect')
    })

    // update data oee defect
    $('#btnEditOeeDefect').on('click', function() {
        let data = {
            'id':$('#defectId').val(),
            'updateDefectName':$('#updateDefectName').val()
        }
        store('updateOeeDefect', data, 'oeeDefect')
    })

    // get data for update
    $('#oeeDefectTable').on('click', '.editOeeDefect', function(e) {
        let id = $(this).data('id')
        e.preventDefault()
        $.ajax({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('editOeeDefect') }}",
            type: 'GET',
            dataType: 'json',
            async: true,
            data: {
                'id': id
            },
            success: (response) => {
                $('#defectId').val(id)
                $('#updateDefectName').val(response.data.defectName)
            },
            error: function(xhr, status, error) {
                toastr['error']('gagal mengambil data, silakan hubungi ICT Developer');
            }
        })
    })

    // delete data oee defect
    $('#oeeDefectTable').on('click', '.deleteOeeDefect', function(e) {
        let id = $(this).data('id')
        e.preventDefault()
        $.ajax({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('deleteOeeDefect') }}",
            type: 'GET',
            dataType: 'json',
            async: true,
            data: {
                'id': id
            },
            success: function(response) {
                if(response.meta.code == 200) {
                    toastr['success'](response.meta.message);
                    getDataOeeDefect()
                } else {
                    toastr['error'](response.meta.message);
                }
            },
            error: function(xhr, status, error) {
                toastr['error']('gagal mengambil data, silakan hubungi ICT Developer');
            }
        })
    })

    function getDataOeeDefect() {
        $('#oeeDefectTable').DataTable().clear();
        $('#oeeDefectTable').DataTable().destroy();

        $.ajax({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('getOeeDefect') }}",
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
                                ${response.data[index]['defectName'] == null ? '' : response.data[index]['defectName']}
                            </td>
                            <td style="width:25%;text-align:center">
                                <button title="Detail" class="editOeeDefect btn btn-primary rounded" data-id="${response.data[index]['id']}" data-toggle="modal" data-target="#editOeeDefect">
                                    <i class="fas fa-solid fa-eye"></i>
                                </button> 
                                <button title="Detail" class="deleteOeeDefect btn btn-danger rounded" data-id="${response.data[index]['id']}">
                                    <i class="fas fa-solid fa-trash"></i>
                                </button> 
                            </td>
                        </tr>
                    `;
                }
                $('#oeeDefectTable > tbody:first').html(data);
                $('#oeeDefectTable').DataTable({
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
</script>