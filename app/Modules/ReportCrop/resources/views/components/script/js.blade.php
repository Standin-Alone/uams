<script>
$(document).ready(function(){
    viewList();
    function viewList(){
        var table = $('#list-datatable').DataTable({ 
            destroy: true, processing: true, serverside: true, responsive: true,
            ajax: "{{ route('get.list-crop') }}",            
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            columns:[
                {data:'partner_name', name:'partner_name', title:'PARTNER NAME'},
                {data:'site_name', name:'site_name', title:'SITE NAME'},
                {data:'crop', name:'crop', title:'CROP'},
                {data:'harvest_from', name:'harvest_from', title:'HARVEST'},
                {data:'harvest_to', name:'harvest_to', title:'HARVEST'},
                {data:'volume_harvest_from', name:'volume_harvest_from', title:'VOLUME'},
                {data:'volume_harvest_to', name:'volume_harvest_to', title:'VOLUME'},
                {data:'reg_name', name:'reg_name', title:'REGION'},
                {data:'prov_name', name:'prov_name', title:'PROVINCE'},
                {data:'mun_name', name:'mun_name', title:'MUNICIPALITY'},
                {data:'bgy_name', name:'bgy_name', title:'BARANGAY'},
                {data:'status', name:'status', title:'status'},
                // {data: 'partner_id', name: 'partner_id',  title:'ACTION',
                //     render: function(data, type, row) {
                //         return  '<a href="javascript:;" data-selectedid="'+row.partner_id+'" class="btn btn-outline-warning update-modal-btn btn_viewdetails" data-toggle="tooltip" data-placement="top" title="Edit Information">' +
                //             '<i class="fas fa-spinner fa-spin '+row.partner_id+' pull-left m-r-10" style="display: none;"></i><span class="fa fa-eye"></span> View </a>&nbsp;&nbsp;&nbsp;'+
                        
                //             '<a href="javascript:;" data-selectedid="'+row.partner_id+'" class="btn btn-outline-success set-status-btn btn_export" data-toggle="tooltip" data-placement="top" title="Remove Setup">' + 
                //             '<i class="fas fa-spinner fa-spin '+row.partner_id+' pull-left m-r-10" style="display: none;"></i><span class="fa fa-download"> Export </span></a>';
                //     }
                // },
            ],
            
            dom         : 'lBfrtip',
            buttons     : [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
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

    $(document).on('click', '.btn_viewdetails', function(event) {
        alert('view details')
    });

    $(document).on('click', '.btn_export', function(event) {        
        var partner_id = $(this).data('selectedid');
        var csrf        = "{{ csrf_token() }}";
        event.preventDefault();

        var URL = "{{ route('export.crop') }}" + "?_token=" + csrf +
                        "&partner_id=" + partner_id;

        window.open(URL, '_blank');

    });
})
</script>