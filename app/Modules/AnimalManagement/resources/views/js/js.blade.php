
    <script>

        @include('AnimalManagement::js.validation');


        $(document).ready(function(){

            
          
            load_datatable = $("#load-datatable").DataTable({       
                responsive:true,        
                processing:true,    
                ajax: "{{route('get-animals')}}",
                dom: 'lBfrtip',
                paging: true,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "buttons": [
                        {
                            extend: 'collection',
                            text: 'Export',
                            buttons: [
                                {
                                    text: '<i class="fas fa-print"></i> PRINT',
                                    title: 'Report: List of Animals',
                                    extend: 'print',
                                    footer: true,
                                    exportOptions: {
                                        ccolumns: [ 0,1,2,3,4,6,7 ]
    
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
                                    title: 'List of Animals',
                                    extend: 'excelHtml5',
                                    footer: true,
                                    exportOptions: {
                                        columns: [ 0,1,2,3,4,6,7 ]
                                    }
                                }, 
                                {
                                    text: '<i class="far fa-file-excel"></i> CSV',
                                    title: 'List of Animals',
                                    extend: 'csvHtml5',
                                    footer: true,
                                    fieldSeparator: ';',
                                    exportOptions: {
                                             columns: [ 0,1,2,3,4,6,7 ]
                                    }
                                }, 
                                {
                                    text: '<i class="far fa-file-pdf"></i> PDF',
                                    title: 'List of Animals',
                                    extend: 'pdfHtml5',
                                    footer: true,
                                    message: '',
                                    exportOptions: {
                                        columns: [ 0,1,2,3,4,6,7 ]
                                    },
                                }, 
                            ]
                            }
                ],
                columns:[                        
                        {data:'animal_name',title:"Animal Name",render:(data,type,row)=>{
                            return(`<strong>${data}</strong>`)
                        }},
                        {data:'created_at',title:"Date Created"},  
                        {data:'animal_id',
                            title:"Actions",
                            render: function(data,type,row){       
                                                                                        
                                return  `<button type='button' class='btn view-modal-btn btn-outline-warning btn-block' 
                                             data-toggle='modal' data-target='#UpdateModal'
                                             data-animal-id="${data}"
                                             data-animal-name="${row.animal_name}"
                              
                                            >
                                            <i class='fa fa-edit'></i> Edit
                                        </button>

                                        ${row.status == 1 ? 
                                            `   <button type='button' class='btn remove-btn btn-outline-danger btn-block' 
                                         
                                                    data-animal-id="${data}"
                                                    data-animal-name="${row.animal_name}"
                                                    data-status="${row.status}"
                                                    >
                                                    <i class='fa fa-remove'></i> Disable
                                                </button>`

                                            :
                                           ` <button tton type='button' class='btn remove-btn btn-outline-success btn-block'                                          
                                                    data-animal-id="${data}"
                                                    data-animal-name="${row.animal_name}"
                                                    data-status="${row.status}"
                                            >
                                                <i class='fa fa-redo'></i> Enable
                                            </button>`
                                            }
                                       
                                        `
                                                                          
                            }
                        }
                ],
                "language": {
                processing: '<img src="assets/img/images/da-loading.gif" >'
                },  
                order:[[1,'desc']]
                           
            })

            $("#load-datatable").on('click','.view-modal-btn',function(){

                let animalId = $(this).data('animal-id');

                let animalName = $(this).data('animal-name');
       

                
                $("input[name=animal_id]").val(animalId);
                $("#animal_name").val(animalName);                
    

            })

            
            // enable disable
            $("#load-datatable").on('click','.remove-btn',function(){

                let animalId = $(this).data('animal-id');
                let status = $(this).data('status');              

                let payload = {
                    animal_id:animalId,
                    status:status,
                    _token:'{{ csrf_token() }}'
                }
                Swal.fire({
                                title: (payload.status == 1 ? 'Are you sure you want to disable this record?' : 'Are you sure you want to enable this record?'),                           
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes!'
                    })
                    .then((result) => {
                    
                        if(result.isConfirmed){                                                                                                        
                        
                        

                        Swal.fire({
                            title: (payload.status == 1  ? 'Disabling...' : 'Enabling...') ,
                            didOpen: function () {
                                Swal.showLoading()
                         
                                $.ajax({
                                    url:"{{route('set-status-animal')}}",
                                    type:'post',
                                    data:payload,
                                    success:function(response){       
                                        


                                        
                                        
                                        Swal.fire(
                                        'Message',
                                        response.message,
                                       response.result == true ? 'success' : 'error'
                                        ).then(()=>{
                                            $("#load-datatable").DataTable().ajax.reload();
                                            Swal.close()
                                        })

                                        
                                    }                                                
                                });
                                                          
                            }
                            })
                     
                    }
                
                                
                });

            })



            // ADD FORM
            $("#AddForm").validate({
                rules:{
                    animal_name:{
                            required:true,
                                                                 
                        },
             
                                             
                },
                messages:{
                    animal_name:{
                            required:'<div class="text-danger"> Please enter this required field.</div>',
                                                                 
                        },
             
                                             
                },
           
                submitHandler:()=>{
                  
                     Swal.fire({
                                title: 'Are you sure you want to add this record?',                           
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes!'
                    })
                    .then((result) => {
                    
                        if(result.isConfirmed){                                                                                                        
                        
                        

                        Swal.fire({
                            title: 'Adding...',
                            didOpen: function () {
                                Swal.showLoading()
                                $('.add-btn').prop('disabled',true)
                                $('.add-btn').html('<i class="fas fa-spinner fa-spin"/> Adding...')
                                $.ajax({
                                    url:"{{route('add-animal')}}",
                                    type:'post',
                                    data:$("#AddForm").serialize(),
                                    success:function(response){       
                                        


                                        
                                        
                                        Swal.fire(
                                        'Message',
                                        response.message,
                                       response.result == true ? 'success' : 'error'
                                        ).then(()=>{
                                            $("#load-datatable").DataTable().ajax.reload();
                                            Swal.close()
                                        })

                                        $("#AddForm")[0].reset();                                        
                                        $('.add-btn').prop('disabled',false)
                                        $('.add-btn').html('Add')
                                        
                                    }                                                
                                });
                                                          
                            }
                            })
                     
                    }
                   

                                


                                
                });

                }
                });



                // UPDATE FORM
                $("#UpdateForm").validate({
                rules:{
                    animal_name:{
                            required:true,
                                                                 
                        },
             
                                          
                },
                messages:{
                    animal_name:{
                            required:'<div class="text-danger"> Please enter this required field.</div>',
                                                                 
                        },
                                         
                },
           
                submitHandler:()=>{
                     // upload file here
                     Swal.fire({
                                title: 'Are you sure you want to update this record?',                           
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes!'
                    })
                    .then((result) => {
                    
                        if(result.isConfirmed){                                                                                                        
                        
                        

                        Swal.fire({
                            title: 'Updating...',
                            didOpen: function () {
                                Swal.showLoading()
                                $('.update-btn').prop('disabled',true)
                                $('.update-btn').html('<i class="fas fa-spinner fa-spin"/> Updating...')
                                $.ajax({
                                    url:"{{route('update-animal')}}",
                                    type:'post',
                                    data:$("#UpdateForm").serialize(),
                                    success:function(response){       
                                        


                                        
                                        
                                        Swal.fire(
                                        'Message',
                                        response.message,
                                       response.result == true ? 'success' : 'error'
                                        ).then(()=>{
                                            $("#load-datatable").DataTable().ajax.reload();
                                            Swal.close()
                                        })
                                        
                                        $('.update-btn').prop('disabled',false)
                                        $('.update-btn').html('Save')
                                        
                                    }                                                
                                });
                                                          
                            }
                            })
                     
                    }
                   

                                


                                
                });

                }
                });
    
    
        });
    
        </script>