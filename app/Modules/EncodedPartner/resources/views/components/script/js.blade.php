<script>
$(document).ready(function(){
    viewList();
    // viewSiteList();
    function viewList(){
        var table = $('#list-datatable').DataTable({ 
            destroy: true, processing: true, serverside: true, responsive: true,
            ajax: "{{ route('get.list-encodedpartner') }}",            
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            columns:[
                {data:'partner_name', name:'partner_name', title:'PARTNER NAME'},
                {data:'contact_person', name:'contact_person', title:'CONTACT PERSON'},
                {data:'contact_no', name:'contact_no', title:'CONTACT NUMBER'},
                {data:'reg_name', name:'reg_name', title:'REGION'},
                {data:'prov_name', name:'prov_name', title:'PROVINCE'},
                {data:'mun_name', name:'mun_name', title:'MUNICIPALITY'},
                {data:'bgy_name', name:'bgy_name', title:'BARANGAY'},
                {data:'status_verified', name:'status_verified', title:'STATUS'},
                {data: 'partner_id', name: 'partner_id',  title:'ACTION',
                    render: function(data, type, row) {
                        return `
                        ${row.status == 1 ?
                        `<button type='button' class='btn updatepartner-btn btn-outline-danger btn-block' 
                            data-partner-id="${data}"
                            data-status="${row.status}"
                            >
                            <i class='fa fa-remove'></i> Disable
                        </button>`                     
                        :
                        `<button type='button' class='btn updatepartner-btn btn-outline-success btn-block' 
                            data-partner-id="${data}"
                            data-status="${row.status}"
                            >
                            <i class='fa fa-remove'></i> Verify
                        </button>`  
                        }
                        `
                    }
                },
                {data: 'partner_id', name: 'partner_id',  title:'SITE',
                    render: function(data, type, row) {
                        return `
                        <button type='button' class='btn view-btn btn-outline-primary btn-block' 
                            data-partner-id="${data}"
                            data-status="${row.status}"
                            >
                            <i class='fa fa-remove'></i> View Site
                        </button>`
                        ;
                    }
                },
            ],
            "language": {
                "emptyTable": '<img class="result-image" src="assets/img/images/no_records_1.png" height="auto" width="10%"/>',
                "zeroRecords": '<img class="result-image" src="assets/img/images/no_records_1.png" height="auto" width="10%"/>',
                "infoEmpty": ''
            },
                footerCallback: function (row, data, start, end, display) { 
            }

        });
        
        $('.filter-select').on('change', function(){
            table.column($(this).data('column')).search($(this).val()).draw();
        });
        $('.buttons-excel, .buttons-print, .buttons-copy, .buttons-pdf, .buttons-colvis').each(function() {
            $(this).removeClass('btn-default').addClass('btn btn-primary')
        })
    }

    
    // Verify / Disable Partner
    $("#list-datatable").on('click', '.updatepartner-btn', function(){
        var partner_id = $(this).data('partner-id');
        var status = $(this).data('status');
        var payload = {
            partner_id : partner_id,
            status : status,
            _token : '{{ csrf_token() }}'
        }

        Swal.fire({
            title: (payload.status == 1  ? 'Disabling...' : 'Enabling...') ,
            didOpen: function () {
                Swal.showLoading()
                $.ajax({
                    url:"{{route('set-status-partner')}}",
                    type:'post',
                    data:payload,
                    success:function(response){    
                        Swal.fire(
                        'Message',
                        response.message,
                        response.result == true ? 'success' : 'error'
                        ).then(()=>{
                            $("#list-datatable").DataTable().ajax.reload();
                            Swal.close()
                        })                                       
                    }                                                
                });
            }                           
        })
    })
    
    function viewSiteList(partner_id, partner_status){
        var table = $('#site-list-datatable').DataTable({ 
            destroy: true, processing: true, serverside: true, responsive: true,
            ajax: "{{ route('get.list-encodedsite') }}" + "?partner_id=" + partner_id,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            columns:[
                 {data: 'site_id', name: 'site_id',  title:'ACTION',
                    render: function(data, type, row) {
                        return `
                        ${row.status == 1 ?
                        `<button type='button' class='btn update-btn btn-outline-danger btn-block' 
                            data-site-id="${data}"
                            data-status="${row.status}" `+( partner_status == '0' ? 'disabled' : '')+`
                            >
                            <i class='fa fa-remove'></i> Disable
                        </button>`                     
                        :
                        `<button type='button' class='btn update-btn btn-outline-success btn-block' 
                            data-site-id="${data}"
                            data-status="${row.status}" `+( partner_status == '0' ? 'disabled' : '')+`
                            >
                            <i class='fa fa-remove'></i> Verify
                        </button>`  
                        }
                        `
                    }
                },
                {data:'site_name', name:'site_name', title:'SITE NAME'},
                {data:'land_area', name:'land_area', title:'CONTACT PERSON'},
                {data:'no_of_manpower', name:'no_of_manpower', title:'CONTACT NUMBER'},
                {data:'no_of_year', name:'no_of_year', title:'REGION'},
                {data:'site_own', name:'site_own', title:'SITE OWN'},
                {data:'site_complete_address', name:'site_complete_address', title:'ADDRESS'},
                // {data:'bgy_name', name:'bgy_name', title:'BARANGAY'},
                               
            ],
            
            "language": {
                "emptyTable": '<img class="result-image" src="assets/img/images/no_records_1.png" height="auto" width="10%"/>',
                "zeroRecords": '<img class="result-image" src="assets/img/images/no_records_1.png" height="auto" width="10%"/>',
                "infoEmpty": ''
            },
                footerCallback: function (row, data, start, end, display) { 
            }

        });        
    }

    //View Partner Site
    $("#list-datatable").on('click', '.view-btn', function(){
        var partner_id = $(this).data('partner-id');
        var partner_status = $(this).data('status');
        var payload = {
            partner_id : partner_id,
            status : status,
            _token : '{{ csrf_token() }}'
        }
        viewSiteList(partner_id, partner_status);
        $('#UpdateModal').modal('show');
    });
    
    // Verify / Disable Partner Site
    $("#site-list-datatable").on('click', '.update-btn', function(){
        var site_id = $(this).data('site-id');
        var status = $(this).data('status');
        var payload = {
            site_id : site_id,
            status : status,
            _token : '{{ csrf_token() }}'
        }

        Swal.fire({
            title: (payload.status == 1  ? 'Disabling...' : 'Enabling...') ,
            didOpen: function () {
                Swal.showLoading()
                $.ajax({
                    url:"{{route('set-status-site')}}",
                    type:'post',
                    data:payload,
                    success:function(response){    
                        Swal.fire(
                        'Message',
                        response.message,
                        response.result == true ? 'success' : 'error'
                        ).then(()=>{
                            $("#site-list-datatable").DataTable().ajax.reload();
                            $("#list-datatable").DataTable().ajax.reload();
                            Swal.close()
                        })                                       
                    }                                                
                });
            }                           
        })
    })

})
</script>