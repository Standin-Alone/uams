<script type="text/javascript">
    $(function() {
        var table = $('#user-datatable').DataTable({
            destroy: true,
            processing: true,
            serverSide: false,
            responsive: true,
            paging: true,
            ajax: {
            url: "{{route('list-of-users.index')}}",
            error: function (jqXHR, textStatus, errorThrown) {
                alert('helo')
                }
            },
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            columns: [
                {data: 'fullname_column', name: 'fullname_column'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role'},
                {data: 'agency_shortname', name: 'agency_shortname'},
                {data: 'region', name: 'region'},
                
                
            ],
        });
        // seach filter select
        $('.filter-select').on('change', function(){
            table.column($(this).data('column')).search($(this).val()).draw();
        });
    });

    $(document).on('click', '#btn_data', function () {
        var uuid = $(this).data('id');
        interv_data(uuid);
        otp_status(uuid);
    });
</script>