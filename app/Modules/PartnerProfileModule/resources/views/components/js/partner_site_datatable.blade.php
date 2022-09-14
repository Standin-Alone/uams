<script> var get_partner_profile = {!! json_encode($get_partner_profile) !!};</script>
<script type="text/javascript">

    $(function() {
        var partner_id_storage = [];
        get_partner_profile.map((item, index)=>{
            partner_id_storage.push(item.partner_id);
        });
        var table = $('#partner-site-datatable').DataTable({
            destroy: true,
            processing: true,
            serverSide: false,
            responsive: true,
            paging: true,
            ajax: "{{route('partner_profile.index',['uuid'=>':id'])}}".replace(':id', partner_id_storage),
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            columns: [
                {data: 'site_name', name: 'site_name', orderable: true, searchable: true},
                {data: 'land_area', name: 'land_area', orderable: true, searchable: true},
                {data: 'mun_name', name: 'mun_name', orderable: true, searchable: true},
                {data: 'site_address', name: 'site_address', orderable: true, searchable: true},
                {data: 'lat', name: 'lat', orderable: true, searchable: true},
                {data: 'long', name: 'long', orderable: true, searchable: true},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            // "order": [[ 6, "desc" ]],
            responsive: {
                details: {
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                        tableClass: 'table'
                    } )
                }
            },
        });
    });
</script>

