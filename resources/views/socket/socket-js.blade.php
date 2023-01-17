<script>
    getSocket()
    $('#btnAddSocket').on('click', function(){
        var data ={
            'socketName':$('#socketName').val()
        }
        store('addSocket', data, 'socket')
    })
    $('#btnUpdateSocket').on('click', function(){
        var data ={
            'id':$('#socketId').val(),
            'socketNameUpdate':$('#socketNameUpdate').val(),
        }
        store('updateSocket',data,'socket')
    })
    $('#socketTable').on('click', '.editSocket', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('detailSocket')}}",
                type: "get",
                dataType: 'json',
                async: true,
                data: {
                    'id': id
                },
                success: function(response) {                   
                    $('#socketId').val(id)
                    $('#socketNameUpdate').val(response.detail.socketName)
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
    $('#socketTable').on('click', '.deleteSocket', function(e) {
            var id =$(this).data('id')
            e.preventDefault()       
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('deleteSocket')}}",
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
                        getSocket()
                    }else{
                        toastr['error'](response.message);
                    }
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
    function getSocket()
   {
        $('#socketTable').DataTable().clear();
        $('#socketTable').DataTable().destroy();
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getSocket')}}",
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
                                <td style="width:25%;text-align:center">
                                        <button title="Detail" class="editSocket btn btn-primary rounded"data-id="${response.data[i]['id']}" data-toggle="modal" data-target="#editSocket">
                                            <i class="fas fa-solid fa-eye"></i>
                                        </button> 
                                        <button title="Detail" class="deleteSocket btn btn-danger rounded"data-id="${response.data[i]['id']}">
                                            <i class="fas fa-solid fa-trash"></i>
                                        </button> 
                                </td>
                            </tr>
                            `;
                }
                    $('#socketTable > tbody:first').html(data);
                    $('#socketTable').DataTable({
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