<script>
    getOffice()
    $('#addOffice').on('click', function(){
        getProvince()
    })
    $('#selectOfficeType').on('change', function(){
        var selectOfficeType = $('#selectOfficeType').val()
        $('#officeTypeId').val(selectOfficeType)
    })
    $('#selectProvince').on('change', function(){
        var selectProvince = $('#selectProvince').val()
        $('#officeProvinceId').val(selectProvince)
        getRegency()
    })
    $('#selectRegency').on('change', function(){
        var selectRegency = $('#selectRegency').val()
        $('#officeCityId').val(selectRegency)
        getDistrict()
    })
    $('#selectDistrict').on('change', function(){
        var selectDistrict = $('#selectDistrict').val()
        $('#officeDistrictId').val(selectDistrict)
        getVillage()
    })
    $('#selectVillage').on('change', function(){
        var selectVillage = $('#selectVillage').val()
        $('#officeVillageId').val(selectVillage)
        getPostalCode()
    })
    $('#officeTable').on('change', '.is_checked', function(e) {
            $('.is_checked').prop('disabled',true)
            e.preventDefault();
            var officeName = $(this).data('officeName')
            var data ={
                    'id': $(this).data('id'),     
                    'activeFlag': $(this).data('officeName'),     
            }
            console.log(officeName)
            return false;
            
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('updateOfficeStatus')}}",
                type: "post",
                dataType: 'json',
                async: true,
                data: data,
               
                success: function(response) {
                    $('.is_checked').prop('disabled',false)
                    toastr['success'](response.message);
                    getOffice()
                },
                error: function(xhr, status, error) {
                   
                    toastr['error']('gagal mengambil data, silakan hubungi ITMAN');
                }
            });
          
           
    });
    function getOffice(){
        $('#officeTable').DataTable().clear();
        $('#officeTable').DataTable().destroy();
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getOffice')}}",
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
                    console.log(response.data[i].activeFlag)
                    data += `<tr style="text-align: center;">
                                <td style="text-align: center;"> <input type="checkbox" id="check" name="check" class="is_checked" style="border-radius: 5px !important;" value="${response.data[i]['id']}" data-officeName="${response.data[i].activeFlag}" data-id="${response.data[i]['id']}" ${response.data[i]['activeFlag'] == 'active' ?'checked':'' }></td>
                                <td style="text-align: center;">${response.data[i]['activeFlag']=='active'?'Active':'inactive'}</td>
                                <td style="width:25%;text-align:center;">${response.data[i]['officeName']==null?'':response.data[i]['officeName']}</td>
                                <td style="width:25%;text-align:left;">${response.data[i]['officeInitial']==null?'':response.data[i]['officeInitial']}</td>
                                <td style="width:25%;text-align:left;">${response.data[i]['cityName']==null?'':response.data[i]['cityName']}</td>
                                <td style="width:25%;text-align:center">
                                        <button title="Detail" class="editKantor btn btn-primary rounded"data-id="${response.data[i]['id']}" data-toggle="modal" data-target="#editMasterKantor">
                                            <i class="fas fa-solid fa-eye"></i>
                                        </button> 
                                </td>
                            </tr>
                            `;
                }
                    $('#officeTable > tbody:first').html(data);
                    $('#officeTable').DataTable({
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
    function getProvince(){
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('getProvince')}}",
                type: "get",
                dataType: 'json',
                async: true,
                beforeSend: function() {
                    SwalLoading('Please wait ...');
                },
                success: function(response) {
                    swal.close();
                    $('#selectProvince').empty();
                    $('#selectProvince').append('<option value ="">Pilih Provinsi</option>');
                    $('#selectRegency').empty();
                    $('#selectRegency').append('<option value ="">Pilih Provinsi terlebih dahulu</option>');
                    $('#selectDistrict').empty();
                    $('#selectDistrict').append('<option value ="">Pilih Kabupaten terlebih dahulu</option>');
                    $('#selectVillage').empty();
                    $('#selectVillage').append('<option value ="">Pilih Kecamatan terlebih dahulu</option>');
                    $('#postalCode').val('');
                    $('#officeProvinceId').val('');
                    $('#officeCityId').val('');
                    $('#officeDistrictId').val('');
                    $('#officeVillageId').val('');
                    $.each(response.getProvince,function(i,data){
                        $('#selectProvince').append('<option value="'+data.id+'">' + data.provinsi +'</option>');
                    });
                    
                },
                error: function(xhr, status, error) {
                    swal.close();
                    toastr['error']('Failed to get data, please contact ICT Developer');
                }
            });
    }
    function getRegency(){
    $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getRegency')}}",
            type: "get",
            data:{
                'officeProvinceId':$('#officeProvinceId').val()
            },
            dataType: 'json',
            async: true,
            beforeSend: function() {
                SwalLoading('Please wait ...');
            },
            success: function(response) {
                swal.close();
                $('#selectRegency').empty();
                $('#selectRegency').append('<option value ="">Pilih Kabupaten</option>');
                $.each(response.getRegency,function(i,data){
                    $('#selectRegency').append('<option value="'+data.id+'">' + data.kabupaten_kota +'</option>');
                });
                
            },
            error: function(xhr, status, error) {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        });
    }
    function getDistrict(){
    $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getDistrict')}}",
            type: "get",
            data:{
                'officeCityId':$('#officeCityId').val()
            },
            dataType: 'json',
            async: true,
            beforeSend: function() {
                SwalLoading('Please wait ...');
            },
            success: function(response) {
                swal.close();
                $('#selectDistrict').empty();
                $('#selectDistrict').append('<option value ="">Pilih Kecamatan</option>');
                $.each(response.getDistrict,function(i,data){
                    $('#selectDistrict').append('<option value="'+data.id+'">' + data.kecamatan+'</option>');
                });
                
            },
            error: function(xhr, status, error) {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        });
    }
    function getVillage(){
    $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getVillage')}}",
            type: "get",
            data:{
                'officeDistrictId':$('#officeDistrictId').val()
            },
            dataType: 'json',
            async: true,
            beforeSend: function() {
                SwalLoading('Please wait ...');
            },
            success: function(response) {
                swal.close();
                $('#selectVillage').empty();
                $('#selectVillage').append('<option value ="">Pilih Kelurahan</option>');
                $.each(response.getVillage,function(i,data){
                    $('#selectVillage').append('<option value="'+data.id+'">' + data.kelurahan+'</option>');
                });
                
            },
            error: function(xhr, status, error) {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        });
    }
    function getPostalCode(){
    $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('getPostalCode')}}",
            type: "get",
            data:{
                'officeVillageId':$('#officeVillageId').val()
            },
            dataType: 'json',
            async: true,
            beforeSend: function() {
                SwalLoading('Please wait ...');
            },
            success: function(response) {
                swal.close();
                $('#officePostalCode').val(response.getPostalCode.kd_pos)                
            },
            error: function(xhr, status, error) {
                swal.close();
                toastr['error']('Failed to get data, please contact ICT Developer');
            }
        });
    }
    function saveOffice(){
       data ={
        'officeName':$('#officeName').val(),
        'officeInitial':$('#officeInitial').val(),
        'officeTypeId':$('#officeTypeId').val(),
        'officeProvinceId':$('#officeProvinceId').val(),
        'officeCityId':$('#officeCityId').val(),
        'officeDistrictId':$('#officeDistrictId').val(),
        'officeVillageId':$('#officeVillageId').val(),
        'officePostalCode':$('#officePostalCode').val(),
        'officeAddress':$('#officeAddress').val(),
       } 
       $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('saveOffice')}}",
                type: "post",
                dataType: 'json',
                async: true,
                data: data,
                beforeSend: function() {
                    SwalLoading('Please wait ...');
                },
                success: function(response) {
                    swal.close();
                    $('.message_error').html('')
                  console.log(response)
                    toastr['success'](response.meta.message);
                    window.location = "{{route('masterOffice')}}";
                },
                error: function(response) {
                    $('.message_error').html('')
                    swal.close();
                    if(response.status === 422)
                    {
                        $.each(response.responseJSON.errors, (key, val) => 
                            {
                                console.log(key+ ' - '+ val)
                               $('span.'+key+'_error').text(val)
                            });
                    }else{
                        toastr['error']('Failed to get data, please contact ICT Developer');
                    }
                }
            });
    }
</script>