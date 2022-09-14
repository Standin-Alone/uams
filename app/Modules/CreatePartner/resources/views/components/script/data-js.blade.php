<script>
$(document).ready(function() {
    // alert('cute tere');

    function view_technology(){       
        var table = $('#list-datatable').DataTable({ 
            destroy: true, processing: true, serverside: true, responsive: true,
            ajax: "{{ route('partnersite.data') }}",            
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            columns:[
                {data:'tech_desc', name:'tech_desc', title:'TECHNOLOGY'},
                {data: 'harvest_id', name: 'harvest_id',  title:'ACTION',
                    render: function(data, type, row) {
                        return `<button type='button' class='btn btn-outline-danger set-status-btn btn_delete_tech'
                            id="btn_delete_tech" name="btn_delete_tech"
                            data-selectedid="${data}"
                            data-status="${row.status}"
                            >
                            <i class='fa fa-remove'></i> Delete
                        </button>
                        `
                    }
                }
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
    
    /** Delete Function **/
    $("#btn_delete_tech").click(function(){
        var id = $(this).data('selectedid');            
        $.ajax({
            url     : "{{ route('partner.delete-technology') }}" + "?id="+id,
            method  : "POST",
            dataType: "json",
            data    : {
                "_token" : "{{ csrf_token() }}"
            },
            success : function(response)
            {
                Swal.fire(
                    'Message',
                    response.message,
                    response.success == true ? 'success' : 'error'
                ).then(()=>{
                    // $("#technology-datatable").DataTable().ajax.reload();
                    Swal.close()
                })
            }
        })
    });
    
    $("#btn_delete_training").click(function(){
        var id = $(this).data('selectedid');
        alert(id)
        $.ajax({
            url     : "{{ route('partner.delete-training') }}" + "?id="+id,
            method  : "POST",
            dataType: "json",
            data    : {
                "_token" : "{{ csrf_token() }}"
            },
            success : function(response)
            {
                Swal.fire(
                    'Message', response.message,
                    response.success == true ? 'success' : 'error'
                ).then(()=>{
                    // $("#technology-datatable").DataTable().ajax.reload();
                    Swal.close()
                })
            }
        })
    });

});
</script>