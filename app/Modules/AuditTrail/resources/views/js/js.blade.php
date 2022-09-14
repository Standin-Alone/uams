<script>
    $(document).ready(function(){
 
      $("#load-datatable").DataTable({       
                responsive:true,        
                processing:true,    
                ajax: "{{route('get-trail')}}",
                dom: 'lBfrtip',
                paging: true,                
                serverSide:true,
                // columnDefs:[{
                //     targets: 2,
                //     render: $("#load-datatable").DataTable().render.datetime('MMMM Do YYYY, h:mm:ss a')
                // }],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "buttons": [
                        {
                            extend: 'collection',
                            text: 'Export',
                            buttons: [
                                {
                                    text: '<i class="fas fa-print"></i> PRINT',
                                    title: 'Report: List of Audit Trails',
                                    extend: 'print',
                                    footer: true,
                                    exportOptions: {
                                        ccolumns: [ 0,1,2 ]
    
                                    },
                                    customize: function ( doc ) {
                                        $(doc.document.body).find('h1').css('font-size', '15pt');
                                        $(doc.document.body)
                                            .prepend(
                                                '<img src="{{url('assets/img/logo/DA-Logo.png')}}" width="10%" height="5%" style="display: inline-block" class="mt-3 mb-3"/>'
                                        );
                                        $(doc.document.body).find('table tbody td').css('background-color', '#cccccc');
                                    },
                                }, 
                                {
                                    text: '<i class="far fa-file-excel"></i> EXCEL',
                                    title: 'List of Audit Trails',
                                    extend: 'excelHtml5',
                                    footer: true,
                                    exportOptions: {
                                        columns: [ 0,1,2 ]
                                    }
                                }, 
                                {
                                    text: '<i class="far fa-file-excel"></i> CSV',
                                    title: 'List of Audit Trails',
                                    extend: 'csvHtml5',
                                    footer: true,
                                    fieldSeparator: ';',
                                    exportOptions: {
                                             columns: [ 0,1,2 ]
                                    }
                                }, 
                                {
                                    text: '<i class="far fa-file-pdf"></i> PDF',
                                    title: 'List of Audit Trails',
                                    extend: 'pdfHtml5',
                                    footer: true,
                                    message: '',
                                    exportOptions: {
                                        columns: [ 0,1,2 ]
                                    },
                                }, 
                            ]
                            }
                ],
                columns:[                        
                        {data:'created_by_name',title:"Created By"},
                        {data:'trail_action',title:"Action"},
                        {data:'created_at',title:"Date Created"},  
                       
                ],
                "language": {
                processing: '<img src="assets/img/images/da-loading.gif" >'
            },
            order: [[2, 'desc']]
           
                           
            })
    });
</script>