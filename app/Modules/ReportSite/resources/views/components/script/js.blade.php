<script>
$(document).ready(function(){
    viewList();
    function viewList(){
        var table = $('#list-datatable').DataTable({ 
            destroy: true, processing: true, serverside: true, responsive: true,
            ajax: "{{ route('get.list-site') }}",            
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            columns:[
                {data:'partner_name', name:'partner_name', title:'PARTNER NAME'},
                {data:'site_name', name:'site_name', title:'SITE NAME'},
                {data:'land_area', name:'land_area', title:'LAND AREA'},
                {data:'no_of_manpower', name:'no_of_manpower', title:'MANPOWER'},
                {data:'no_of_year', name:'no_of_year', title:'YEAR'},
                {data:'lat', name:'lat', title:'LATITUDE'},
                {data:'long', name:'long', title:'LONGITUDE'},
                {data:'reg_name', name:'reg_name', title:'REGION'},
                {data:'prov_name', name:'prov_name', title:'PROVINCE'},
                {data:'mun_name', name:'mun_name', title:'MUNICIPALITY'},
                {data:'bgy_name', name:'bgy_name', title:'BARANGAY'},
                {data:'site_own', name:'site_own', title:'SITE OWN'},
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
})
</script>