@extends('global.base')
@section('title', "User Management")




{{--  import in this section your css files--}}
@section('page-css')
    <link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />

    



    <style>
        
        dd{
            font-size: 20
        }
        td { font-size: 17px; font-weight: 500 }
        

        #load-datatable > thead > tr > th {
            color:#ffffff;
            font-size: 16px;                        
            font-weight: 500;
            background: #008a8a !important;
            
        }
        #load-datatable> thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
            padding: 5px !important;
        }  
        div.dataTables_wrapper div.dataTables_processing {
          background-color: rgba(0, 0, 0, 0.5);
          backdrop-filter: blur(6px);
        }

        /* MODIFY DATATABLE WRAPPER/MOBILE VIEW NAVAGATE ROW ICON */
        .dataTables_wrapper table.dataTable.dtr-inline.collapsed > tbody > tr > td:first-child::before{
            /* background: #008a8a !important; */
            background: #008a8a !important;
            border-radius: 10px !important;
            border: none !important;
            top: 18px !important;
            left: 5px !important;
            line-height: 16px !important;
            box-shadow: none !important;
            color: #fff !important;
            font-weight: 700 !important;
            height: 16px !important;
            width: 16px !important;
            text-align: center !important;
            text-indent: 0 !important;
            font-size: 14px !important;
        }
        
        .dataTables_wrapper table.dataTable.dtr-inline.collapsed>tbody>tr.parent>td:first-child:before, 
        .dataTables_wrapper table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th:first-child:before{
            /* background: #008a8a !important; */
            background: #b31515 !important;
            border-radius: 10px !important;
            border: none !important;
            top: 18px !important;
            left: 5px !important;
            line-height: 16px !important;
            box-shadow: none !important;
            color: #fff !important;
            font-weight: 700 !important;
            height: 16px !important;
            width: 16px !important;
            text-align: center !important;
            text-indent: 0 !important;
            font-size: 14px !important;
        }


        .dt-button{
            background-color: #00c3ff !important;
            color: #fff !important;
            font-size: 14px !important;
            border-radius: 5px !important;
            padding-top: 5px !important;
            padding-bottom: 5px !important;
            padding-left: 20px !important;
            padding-right: 20px !important;
            width: 107px;
            height: 32px;
        }

        .buttons-print{
            background-color: #12abda !important;
            color: #fff !important;
        }
        .buttons-excel{
            background-color: #0cb458 !important;
            color: #fff !important;
        }
        .buttons-csv{
            background-color: #0cb458 !important;
            color: #fff !important;
        }
        .buttons-pdf{
            background-color: #e42535 !important;
            color: #fff !important;
        }
    </style>
@endsection




{{--  import in this section your javascript files  --}}
@section('page-js')
    <script src="assets/plugins/gritter/js/jquery.gritter.js"></script>
    <script src="assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
    <script src="assets/js/demo/ui-modal-notification.demo.min.js"></script>
    <script src="assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
    <script src="assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/js/demo/table-manage-default.demo.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>

        
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>


    $(document).ready(function(){
        // load_datatable = $("#load-datatable").DataTable({       
        //     responsive:true,        
        //     processing:true,    
        //     ajax: "{{route('user.show')}}",
        //     dom: 'lBfrtip',
        //     paging: true,
        //     "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
        //     "buttons": [
        //             {
        //                 extend: 'collection',
        //                 text: 'Export',
        //                 buttons: [
        //                     {
        //                         text: '<i class="fas fa-print"></i> PRINT',
        //                         title: 'Report: List of User Accounts',
        //                         extend: 'print',
        //                         footer: true,
        //                         exportOptions: {
        //                             ccolumns: [ 0,1,2,3,4,6,7 ]

        //                         },
        //                         customize: function ( doc ) {
        //                             $(doc.document.body).find('h1').css('font-size', '15pt');
        //                             $(doc.document.body)
        //                                 .prepend(
        //                                     '<img src="{{url('assets/img/logo/DA-Logo.png')}}" width="10%" height="5%" style="display: inline-block" class="mt-3 mb-3"/>'
        //                             );
        //                             $(doc.document.body).find('table tbody td').css('background-color', '#cccccc');
        //                         },
        //                     }, 
        //                     {
        //                         text: '<i class="far fa-file-excel"></i> EXCEL',
        //                         title: 'List of User Accounts',
        //                         extend: 'excelHtml5',
        //                         footer: true,
        //                         exportOptions: {
        //                             columns: [ 0,1,2,3,4,6,7 ]
        //                         }
        //                     }, 
        //                     {
        //                         text: '<i class="far fa-file-excel"></i> CSV',
        //                         title: 'List of User Accounts',
        //                         extend: 'csvHtml5',
        //                         footer: true,
        //                         fieldSeparator: ';',
        //                         exportOptions: {
        //                                  columns: [ 0,1,2,3,4,6,7 ]
        //                         }
        //                     }, 
        //                     {
        //                         text: '<i class="far fa-file-pdf"></i> PDF',
        //                         title: 'List of User Accounts',
        //                         extend: 'pdfHtml5',
        //                         footer: true,
        //                         message: '',
        //                         exportOptions: {
        //                             columns: [ 0,1,2,3,4,6,7 ]
        //                         },
        //                     }, 
        //                 ]
        //                 }
        //     ],
        //     columns:[
        //             {data:'full_name',title:'Name'},
        //             {data:'role',title:"Role"},                                        
        //             {data:'email',title:"Email"},
        //             {data:'contact_no',title:"contact_no",visible:false},
        //             {data:'reg_name',title:"Region"},
        //             {data:'date_created',title:"Date Created"},
        //             {data:'prov_name',title:"prov_name",visible:false},
        //             {data:'mun_name',title:"mun_name",visible:false},
        //             {data:'bgy_name',title:"bgy_name",visible:false},
                    
                   
        //             {data:'id',
        //                 title:"Actions",
        //                 render: function(data,type,row){       
                        
                        
                            
        //                     return  (row['is_created'] == 1  ? ("<button type='button' class='btn view-modal-btn btn-outline-warning btn-block' user_id="+row['user_id']+" role_id="+row['role_id']+" reg="+row['reg']+" prov="+row['prov']+"  mun="+row['mun']+"  bgy="+row['bgy']+"   data-toggle='modal' data-target='#ViewModal'>"+
        //                                 "<i class='fa fa-edit'></i> Edit"+
        //                             "</button>   "+(
        //                             row['status'] == 1 ?
        //                             "<button type='button' class='btn btn-outline-danger set-status-btn  btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
        //                                 "<i class='fa fa-trash'></i> Disable"+
        //                             "</button>  " :
        //                             "<button type='button' class='btn btn-outline-success set-status-btn btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
        //                                 "<i class='fa fa-undo'></i> Enable"+
        //                             "</button> ")+(
        //                             row['status'] == 2 ?
        //                             "<button type='button' class='btn btn-outline-success set-block-btn  btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
        //                                 "<i class='fa fa-trash'></i> Unblock"+
        //                             "</button>  " :
        //                             "<button type='button' class='btn btn-outline-primary set-block-btn btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
        //                                 "<i class='fa fa-ban'></i> Block"+
        //                             "</button> ")
        //                             ) :
        //                                 ""
        //                             )
        //                             +
        //                             (row['is_created'] === 0 ?
        //                             "<button type='button' class='btn send-recovery-link-button btn-outline-info btn-block' user_id="+row['user_id']+" role_id="+row['role_id']+" email="+row['email']+"   agency_name="+row['agency_name']+" agency_loc="+row['agency_loc']+" agency_id="+row['agency_id']+" reg="+row['reg']+" prov="+row['prov']+"  mun="+row['mun']+"  bgy="+row['bgy']+"  >"+
        //                                 "<i class='fa fa-envelope'></i> Send Account Creation Email"+
        //                             "</button>   "  
        //                             : ''
        //                             )
                              
        //                 }
        //             }
        //     ],
        //     "language": {
        //     processing: '<img src="assets/img/images/da-loading.gif" >'
        // },

        // order:[['5','desc']]


           

        // })


        $("#load-datatable").on('click','.send-recovery-link-button',function(){
            let user_id = $(this).attr('user_id');
            let email = $(this).attr('email');

            let payload = {
                _token:'{{ csrf_token() }}',
                user_id: user_id,
                email:email
            };  

            
            Swal.fire({
                title: 'Sending...',
                didOpen: function () {
                    Swal.showLoading()

                    $.ajax({
                        url:'{{route("send-recovery-link")}}',
                        type:'post',
                        data:payload,
                        success:function(data){      
                        
                            Swal.fire(
                                'Message',
                                `Successfully resend recovery link to email ${email}.`,
                                data.result
                            ).then(()=>{
                                            
                                    Swal.close()
                            })
                        }                
                    });
                }
            });



        });

        $("#load-datatable").on('click','.view-modal-btn',function(){
            
            let currentRow = $(this).closest('tr');
            let id =  $(this).attr('user_id');
            let full_name = $("#load-datatable").DataTable().row(currentRow).data()['full_name'];
            let email = $("#load-datatable").DataTable().row(currentRow).data()['email'];
            let contact = $("#load-datatable").DataTable().row(currentRow).data()['contact_no'];
            let program = $("#load-datatable").DataTable().row(currentRow).data()['shortname'];
            let agency = $("#load-datatable").DataTable().row(currentRow).data()['agency'];
            let reg_name = $("#load-datatable").DataTable().row(currentRow).data()['reg_name'];
            let mun_name = $("#load-datatable").DataTable().row(currentRow).data()['mun_name'];
            let prov_name = $("#load-datatable").DataTable().row(currentRow).data()['prov_name'];
            let bgy_name = $("#load-datatable").DataTable().row(currentRow).data()['bgy_name'];



            
            let reg = $(this).attr('reg');
            let mun = $(this).attr('mun');
            let prov = $(this).attr('prov');            
            let bgy = $(this).attr('bgy');
            


            let role =  $("#load-datatable").DataTable().row(currentRow).data()['role'];
            let role_id = $(this).attr('role_id');
            
            
            
            let agency_loc = $(this).attr('agency_loc');
            
            let agency_id = $(this).attr('agency_id');


     
            



            // put values in update form
            $("#user_id").val(id);                         
            $("#edit_email").val(email);
            $("#edit_contact").val(contact);                        
            $("#edit_reg_name").text(reg_name);
            $("#edit_mun_name").text(mun_name);
            $("#edit_prov_name").text(prov_name);
            $("#edit_role_id").val(role_id).change();            
            $("#bgy_name").text(bgy_name);            
            $("#edit_region").val(reg).change();

           
            $.ajax({
                    url:'{{route("filter-province",["region_code" => ":id"])}}'.replace(':id',reg),
                    type:'get',
                    success:function(data){
                        let convertToJson = JSON.parse(data);
                        $("#edit_province").prop('disabled',false);
                        $("#edit_province option").remove();
                        $("#edit_province").append('<option value="" selected disabled>Select Province</option>')
                        convertToJson.map(item => {
                            $("#edit_province").append('<option value="'+item.prov_code+'">'+item.prov_name+'</option>')
                        })

                        $("#edit_province").val(prov)



                        $.ajax({
                            url:'{{route("filter-municipality",["region_code" => ":region_code","province_code" => ":id"])}}'.replace(':id',prov).replace(':region_code',reg),
                            type:'get',
                            success:function(data){
                                let convertToJson = JSON.parse(data);
                                $("#edit_municipality").prop('disabled',false);
                                $("#edit_municipality option").remove();
                                $("#edit_municipality").append('<option value="" selected disabled>Select Municipality</option>')
                                convertToJson.map(item => {
                                    $("#edit_municipality").append('<option value="'+item.mun_code+'">'+item.mun_name+'</option>')
                                })
                    
                                $("#edit_municipality").val(mun)


                                
      

                                $.ajax({
                                    url:'{{route("filter-barangay",["region_code" => ":id_region_code","province_code" => ":id_province_code","municipality_code" => ":id"])}}'.replace(':id_region_code',reg).replace(':id_province_code',prov).replace(':id',mun),                
                                    type:'get',
                                    success:function(data){
                                        let convertToJson = JSON.parse(data);
                                        $("#edit_barangay").prop('disabled',false);
                                        $("#edit_barangay option").remove();
                                        $("#edit_barangay").append('<option value="" selected disabled>Select Barangay</option>')
                                        convertToJson.map(item => {
                                        
                                            $("#edit_barangay").append('<option value="'+item.bgy_code+'">'+item.bgy_name+'</option>')
                                        })

                                    
                                        
                                        $("#edit_barangay").val(bgy);
                                    }                
                                });
                            }                
                        });
                    }                
                });

                
                


   
           

                        
               
            $("#name").text(full_name);
            $("#role_view").text(role);
            $("#update-role").val(role);
            

            
      
            
        });

         // set status btn
         $("#load-datatable").on('click','.set-status-btn',function(){
            id = $(this).attr('id');
            status = $(this).attr('status');

            Swal.fire({
                            title: "Are you sure you want to "+ (status == 1 ? 'disable' : 'enable')+" this user?",
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes'
                })
                .then((result) => {
                    $('#add-btn').prop('disabled','true');
                    // check if confirm
                    if (result.isConfirmed) {                       
                        $.ajax({
                            url:'{{route("user.destroy",["id"=>":id"])}}'.replace(':id',id),
                            type:'get',
                            data:{'_token':'{{csrf_token()}}','status':status},
                            success:function(response){             
                                //    
                                                              

                                Swal.fire(
                                        'Message',
                                        "Successfully "+(status == 1 ? 'disable' : 'enable')+" the user.",
                                        'success'
                                ).then(()=>{
                                    $(".search-btn").trigger('click');
                                })
                            },
                            error:function(response){

                            }
                        })
                        
                    } else {                        

                        Swal.fire(
                            'Message',
                            "Operation Cancelled.",
                            'error'
                            )
                    }
                });
        }); 


        // set block btn
        $("#load-datatable").on('click','.set-block-btn',function(){
            id = $(this).attr('id');
            status = $(this).attr('status');
                                    
            
            Swal.fire({
                        title: "Are you sure you want to "+ (status == 1 ? 'unblocked' : 'blocked')+" this user?",
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
            })
                .then((result) => {
                    $('#add-btn').prop('disabled','true');
                    // check if confirm
                    if (result.isConfirmed) {                       
                        $.ajax({
                            url:'{{route("user.block",["id"=>":id"])}}'.replace(':id',id),
                            type:'get',
                            data:{'_token':'{{csrf_token()}}','status':status},
                            success:function(response){             
                                //    
                                
                                

                                Swal.fire(
                                        'Message',
                                        "Successfully "+(status == 2 ? 'unblocked' : 'blocked')+" the user.",
                                        'success'
                                ).then(()=>{
                                    $(".search-btn").trigger('click');                                         
                                })
                            },
                            error:function(response){

                            }
                        })
                        
                    } else {
                        Swal.fire(
                            'Message',
                            "Operation Cancelled.",
                            'error'
                            )
                    }
                });
        }); 



        // filter province
        $("#region").change(function(){
            let value = $("option:selected", this).val();
               
            $.ajax({
                url:'{{route("filter-province",["region_code" => ":id"])}}'.replace(':id',value),
                type:'get',
                success:function(data){
                    let convertToJson = JSON.parse(data);
                    $("#province").prop('disabled',false);
                    $("#province option").remove();
                    $("#province").append('<option value="" selected disabled>Select Province</option>')
                    convertToJson.map(item => {
                        $("#province").append('<option value="'+item.prov_code+'">'+item.prov_name+'</option>')
                    })
                }                
            });
        })

        // check agency of CO or RFO
        check_agency = $("input[name='agency_loc']:checked").val();
        if(check_agency == 'CO'){
            $("#region").val(13).change();
            $("#region option").filter(function(){
                return this.value != 13;
            }).hide()
        }


        
        
        // filter municipality
        $("#province").change(function(){
            let value = $("option:selected", this).val();
            region_code = $("#region option:selected").val();
            $.ajax({
                url:'{{route("filter-municipality",["province_code" => ":id","region_code" => ":region_code"])}}'.replace(':id',value).replace(':region_code',region_code),
                type:'get',
                success:function(data){
                    let convertToJson = JSON.parse(data);
                    $("#municipality").prop('disabled',false);
                    $("#municipality option").remove();
                    $("#municipality").append('<option value="" selected disabled>Select Municipality</option>')
                    convertToJson.map(item => {
                        $("#municipality").append('<option value="'+item.mun_code+'">'+item.mun_name+'</option>')
                    })
                }                
            });
        })



        // filter barangay
        $("#municipality").change(function(){
            
            let region = $("#region option:selected").val();
            let province = $("#province option:selected").val();
            let value = $("option:selected",this).val();
                              
            $.ajax({
                url:'{{route("filter-barangay",["region_code" => ":id_region_code","province_code" => ":id_province_code","municipality_code" => ":id"])}}'.replace(':id_region_code',region).replace(':id_province_code',province).replace(':id',value),                
                type:'get',
                success:function(data){
                    let convertToJson = JSON.parse(data);
                    $("#barangay").prop('disabled',false);
                    $("#barangay option").remove();
                    $("#barangay").append('<option value="" selected disabled>Select Barangay</option>')
                    convertToJson.map(item => {
                        $("#barangay").append('<option value="'+item.bgy_code+'">'+item.bgy_name+'</option>')
                    })
                }                
            });
        })

        





    


        $("#role").change(function(){

            let value = $("option:selected",this).val();                  
            let check_agency = $("input[name='agency_loc']:checked").val();

            
            
            if(check_agency == "CO"){
                if(value == 1){
                    $("#region option").filter(function(){
                        return this.value
                        }).show()                    
                }else{
                    $("#region").val(00).change();
                    $("#region option").filter(function(){
                        return this.value == 00 && this.value == ""
                        }).show()    

                    $("#region option").filter(function(){
                        return this.value 
                        }).hide()                   
                }
            }
        })




        // FILTER REGION UPDATE FORM

        
        $("#role_id").change(function(){

            let value = $("option:selected",this).val();                  
            let check_agency = $("input[name='agency_loc']:checked").val();

            
            
            if(check_agency == "CO"){
                if(value == 1){
                    $("#region option").filter(function(){
                        return this.value
                        }).show()                    
                }else{
                    $("#region").val(00).change();
                    $("#region option").filter(function(){
                        return this.value == 00 && this.value == ""
                        }).show()    

                    $("#region option").filter(function(){
                        return this.value 
                        }).hide()                   
                }
            }
        })
        // filter province
        $("#edit_region").change(function(){
            let value = $("option:selected", this).val();
               
            $.ajax({
                url:'{{route("filter-province",["region_code" => ":id"])}}'.replace(':id',value),
                type:'get',
                success:function(data){
                    let convertToJson = JSON.parse(data);
                    $("#edit_province").prop('disabled',false);
                    $("#edit_province option").remove();
                    $("#edit_province").append('<option value="" selected disabled>Select Province</option>')
                    $("#edit_municipality option").remove();
                    $("#edit_barangay option").remove();
                    $("#edit_barangay").append('<option value="" selected disabled>Select Barangay</option>')
                    $("#edit_municipality").append('<option value="" selected disabled>Select Municipality</option>')

                    convertToJson.map(item => {
                        $("#edit_province").append('<option value="'+item.prov_code+'">'+item.prov_name+'</option>')
                    })
                }                
            });
        })

      
       
        
        
        // filter municipality
        $("#edit_province").change(function(){
            let value = $("option:selected", this).val();
            region_code = $("#edit_region option:selected").val();


            $.ajax({
                url:'{{route("filter-municipality",["province_code" => ":id","region_code" => ":region_code"])}}'.replace(':id',value).replace(':region_code',region_code),
                type:'get',
                success:function(data){
                    let convertToJson = JSON.parse(data);
                    $("#edit_municipality").prop('disabled',false);
                    $("#edit_municipality option").remove();
                    $("#edit_barangay option").remove();
                    $("#edit_barangay").append('<option value="" selected disabled>Select Barangay</option>')
                    $("#edit_municipality").append('<option value="" selected disabled>Select Municipality</option>')
                    convertToJson.map(item => {
                        $("#edit_municipality").append('<option value="'+item.mun_code+'">'+item.mun_name+'</option>')
                    })
                }                
            });
        })



        // filter barangay
        $("#edit_municipality").change(function(){
            
            let region = $("#edit_region option:selected").val();
            let province = $("#edit_province option:selected").val();
            let value = $("option:selected",this).val();
            
            $.ajax({
                url:'{{route("filter-barangay",["region_code" => ":id_region_code","province_code" => ":id_province_code","municipality_code" => ":id"])}}'.replace(':id_region_code',region).replace(':id_province_code',province).replace(':id',value),                
                type:'get',
                success:function(data){
                    let convertToJson = JSON.parse(data);
                    $("#edit_barangay").prop('disabled',false);
                    $("#edit_barangay option").remove();
                    $("#edit_barangay").append('<option value="" selected disabled>Select Barangay</option>')
                    convertToJson.map(item => {
                        $("#edit_barangay").append('<option value="'+item.bgy_code+'">'+item.bgy_name+'</option>')
                    })
                }                
            });
        })



    })

    </script>



    <script>
        $(document).ready(function(){
            $.validator.addMethod(
                    "mobileValidation",
                    function(value, element) {
                        
                        return   value.match(/^[0-9]{7}|[0-9]{11}$/);
                    },
                    "Please input valid contact number."
            );
            // Add User
            $("#AddForm").validate({
                rules:{
                    first_name:'required',
                    last_name:'required',
                    email:{required:true,
                            email:true,
                            remote:{
                                url:"{{route('check-email')}}",
                                type:'get'
                            }
                        },
                    contact:{
                        required:true,
                        mobileValidation: true
                    }, 
                    agency:'required',
                    agency_loc:'required',
                    role:'required',
                    program: {
                        required: {
                            depends: function (){
                                if($("#role option:selected").val() != 2){
                                    return true
                                }
                            }
                        }
                    },
                    region:'required',
                    province:'required',
                    municipality:'required',
                    barangay:'required',            
                },
                messages:{
                    first_name  :{required:'<div class="text-danger">Please enter your first name.</div>'},
                    last_name   :{required:'<div class="text-danger">Please enter your last name.</div>'},
                    email       :{
                                    required:'<div class="text-danger">Please enter your email.</div>',
                                    email:'<div class="text-danger">Please enter a valid email address.</div>', 
                                    remote:'<div class="text-danger">This email is already exist.</div>'
                                  },                    
                    contact     :{
                                    required:'<div class="text-danger">Please enter your phone number.</div>',
                                    mobileValidation: '<div class="text-danger">Invalid format.</div>'
                                  },
                    agency      :{required:'<div class="text-danger">Please select your agency.</div>'},
                    agency_loc  :{required:'<div class="text-danger">Please select agency location.</div>'},
                    program     :{required:'<div class="text-danger">Please select your program.</div>'},
                    role        :{required:'<div class="text-danger">Please select your role.</div>'},
                    region      :{required:'<div class="text-danger">Please select region.</div>'},
                    province    :{required:'<div class="text-danger">Please select province.</div>'},
                    municipality:{required:'<div class="text-danger">Please select municipality.</div>'},
                    barangay    :{required:'<div class="text-danger">Please select barangay.</div>', } 
                },
                submitHandler:function(){                    
                    Swal.fire({
                                title: "Are you sure you want to add this user?",
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes!'
                    })
                    .then((result) => {
                    
                        
                        id = $('input[name="id"]').val();
                        $(".add-btn").prop('disabled',true);
                        
                        // check if confirm
                        if (result.isConfirmed) {                       
                            $(".add-btn").html('<i class="fas fa-circle-notch fa-spin"></i> Add');                 
                            $.ajax({
                                url:"{{route('user-add')}}",
                                type:'post',
                                data:$("#AddForm").serialize(),
                                success:function(response){             
                                    //    
                                    
                                    if(response == 'true'){
                                        
                                        Swal.fire(
                                            'Message',
                                            "Successfully added new user.",
                                            'success'
                                        ).then(()=>{
                                            $(".add-btn").html('Add'); 
                                            
                                            $("#AddModal").modal('hide')
                                            $(".add-btn").prop('disabled',false);
                                            $("#AddForm")[0].reset();
                                        })
                                    }else{                                     
                                        Swal.fire(
                                            'Message',
                                            "Failed to add new user.",
                                            'error'
                                        ).then(()=>{
                                            $(".add-btn").html('Add');                                 
                                            $(".add-btn").prop('disabled',false);
                                            
                                        });
                                    }
                                },
                                error:function(response){
                                    $(".add-btn").prop('disabled',false);
                                }
                            })
                            
                        } else {
                            $(".add-btn").prop('disabled',false);
                            Swal.fire(
                                'Message',
                                "Operation Cancelled.",
                                'error'
                            )
                        }
                    });
                }
            })



            // import file
            $("#ImportForm").validate({

                rules:{                                        
                    file:{
                        required:true,
                        accept: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel"
                    }
                },
                messages:{                    
                    file:{
                        required: '<div class="text-danger">Please select file to upload.</div>',
                        accept: '<div class="text-danger">Please upload valid files formats .xlsx, . xls only.</div>'
                    }
                },
                submitHandler: function(){
                    let fd = this;
                    Swal.fire({
                        title: 'Are you sure you want to import this file?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!'
                    })
                    .then((result) => {
                        let fd = new FormData();

                        fd.append('_token','{{csrf_token()}}')                        
                        fd.append('file',$("input[name='file']")[0].files[0])
                        $(".import-btn").prop('disabled',true)

                        $(".import-btn").html('<i class="fas fa-spinner fa-spin"></i> Importing...');                                 
                        // check if confirm
                        if (result.isConfirmed) {                       
                            $.ajax({
                                url:"{{route('import-file')}}",
                                type:'post',
                                data: fd,
                                processData:false,
                                contentType:false,
                                success:function(response){             
                                    //              
                                    
                                    parses_result = JSON.parse(response)
                                    total_rows_inserted = parses_result['total_rows_inserted'];
                                    total_rows = parses_result['total_rows'];
                                
                                if(parses_result['message']['result'] == 'true'){
                                    Swal.fire(   'Message',total_rows_inserted + ' out of ' + total_rows + ' rows has been successfully inserted.','success').then(()=>{                    
                                            
                                        // check if it has error data;
                                        if(parses_result['error_data'].length > 0 ){
                                            $("#ErrorDataModal").modal('show');
                                            $("#error-datatable").DataTable({
                                                destroy:true,
                                                data:parses_result['error_data'],
                                                columns:[
                                                                                                                                                                                                                
                                                    {data:'email',title:'Email',orderable:false},
                                                    {data:'remarks',title:'Email',orderable:false},
                                                    
                                                    
                                                    
                                                    

                                                ]
                                            });
                                        }

                                        $("#ImportForm")[0].reset();
                                        $(".import-btn").prop('disabled',false)      
                                        $(".import-btn").html('<i class="fas fa-cloud-download-alt "></i> Import');                                 
                                        // $("#load-datatable").DataTable().ajax.reload();
                                    });
                                    }else{
                                        Swal.fire(
                                            'Message',
                                            "Something went rong.",
                                            'error'
                                            )
                                        $("#ImportForm")[0].reset();
                                        // $("#load-datatable").DataTable().ajax.reload();
                                        $("#ImportModal").modal('hide')
                                        $(".import-btn").prop('disabled',false)
                                        $(".import-btn").html('<i class="fas fa-cloud-download-alt "></i> Import');     
                                    }


                                    // swal("Successfully added new users.", {
                                    //         icon: "success",
                                    // }).then(()=>{
                                    //     $("#load-datatable").DataTable().ajax.reload();
                                    //     $("#ImportModal").modal('hide')
                                    //     $(".import-btn").prop('disabled',false)
                                        
                                    // });
                                },
                                error:function(response){
                                    $("#ImportModal").modal('hide')
                                    
                                    $(".import-btn").prop('disabled',false)
                                }   
                            })
                            
                        } else {
                            
                            $(".import-btn").prop('disabled',false)
                            $(".import-btn").html('<i class="fas fa-cloud-download-alt "></i> Import');     
                            Swal.fire(
                            'Message',
                            "Operation Cancelled.",
                            'error'
                            )
                        }
                    });
                }
            })

            // Update Form validate
            $("#UpdateForm").validate({
                rules:{
                    email:{
                            required:true,
                            email   :true,  
                            // remote:{
                            //     url:"{{route('check-email')}}",
                            //     type:'get'
                            // }                                                    
                        },
                    contact:{
                        required: true,
                        number : true,
                        minlength : 11,
                        maxlength : 11
                    },
                    role:{
                        required:true,
                    },                    
                    agency:'required',
                    edit_agency_loc:'required',                                        
                    region:'required',                   
                },
                messages:{
                     email:{
                            required:'<div class="text-danger">Please enter your email.</div>',
                            email:'<div class="text-danger">Please enter a valid email address.</div>',                             
                            // remote:'<div class="text-danger">This email is already exist.</div>'
                            },                    
                    contact:{
                            required:'<div class="text-danger">Please enter your phone number.</div>',
                            number: '<div class="text-danger">Invalid format.</div>',
                            maxlength:'<div class="text-danger">Invalid format.</div>'

                            },
                    role:{
                        required:'<div class="text-danger">Please enter your role</div>',  
                    },     
                    agency      :{required:'<div class="text-danger">Please select agency location.</div>'},                                   
                    edit_agency_loc  :{required:'<div class="text-danger">Please select agency location.</div>'},                    
                    role        :{required:'<div class="text-danger">Please select your role.</div>'},
                    region      :{required:'<div class="text-danger">Please select region.</div>'},                   
                },
                submitHandler:function(){

                    $("i").removeClass('hide');
                    $(".update-btn").prop('disabled',true);   
                    

              // upload file here
                    Swal.fire({
                            title: 'Are you sure you want to update this account?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes!'
                    })
                    .then((result) => {
                    
                        
                        $(".update-btn").html('<i class="fas fa-circle-notch fa-spin"></i> Updating');   
                        if(result.isConfirmed){      
                            $.ajax({
                                url:"{{route('user-update')}}",
                                type:'post',
                                data:$("#UpdateForm").serialize(),
                                success:function(response){             
                                    //          
                                    
                                    if(response == 'true'){
                                        $("i").addClass('hide');
                                       
                                        Swal.fire("Message",
                                        "Successfully updated the user info.",  
                                        "success"
                                        ).then(()=>{
                                            $(".search-btn").trigger('click');
                                            $("#ViewModal").modal('hide')
                                            $(".update-btn").prop('disabled',false);                                            
                                            $(".update-btn").text('update');   
                                            $(".update-btn").html('Update');   
                                        });
                                    }else{
                                        $("i").addClass('hide');
                                        Swal.fire("Message","Failed to update user info.", "error"
                                        ).then(()=>{
                                            $(".search-btn").trigger('click');
                                            $("#ViewModal").modal('hide')
                                            $(".update-btn").prop('disabled',false);                                            
                                            $(".update-btn").text('update');    
                                            $(".update-btn").html('Update');   
                                            
                                        });
                                    }
                                },
                                error:function(response){
                                    $(".add-btn").prop('disabled',false);
                                }
                            })
                            
                        } else {
                            $(".search-btn").trigger('click');
                            $(".update-btn").prop('disabled',false);                            
                            $(".update-btn").prop('disabled',false);                                            
                            $(".update-btn").text('update');    
                            $(".update-btn").html('Update');   
                            Swal.fire(
                            'Message',
                            "Operation Cancelled.",
                            'error'
                            )
                        }
                    });
                  

                }
            });

        

            // filter by region
            $("#filter-region").change(function(){
                    region_code = $("option:selected",this).val();                    
                
                    $.ajax({
                        url:"{{route('filter-region',['region_code' => ':id'])}}".replace(':id',region_code),
                        type:'get',                   
                        success:function(response){    
                               
                            $("#load-datatable").DataTable({       
                                            destroy:true,
                                            responsive:true,        
                                            processing:true,    
                                            data:response.data,
                                            dom: 'lBfrtip',
                                            paging: true,
                                            "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
                                            "buttons": [
                                                    {
                                                        extend: 'collection',
                                                        text: 'Export',
                                                        buttons: [
                                                            {
                                                                text: '<i class="fas fa-print"></i> PRINT',
                                                                title: 'Report: List of User Accounts',
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
                                                                title: 'List of User Accounts',
                                                                extend: 'excelHtml5',
                                                                footer: true,
                                                                exportOptions: {
                                                                    columns: [ 0,1,2,3,4,6,7 ]
                                                                }
                                                            }, 
                                                            {
                                                                text: '<i class="far fa-file-excel"></i> CSV',
                                                                title: 'List of User Accounts',
                                                                extend: 'csvHtml5',
                                                                footer: true,
                                                                fieldSeparator: ';',
                                                                exportOptions: {
                                                                        columns: [ 0,1,2,3,4,6,7 ]
                                                                }
                                                            }, 
                                                            {
                                                                text: '<i class="far fa-file-pdf"></i> PDF',
                                                                title: 'List of User Accounts',
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
                                                    {data:'full_name',title:'Name'},
                                                    {data:'role',title:"Role"},                                        
                                                    {data:'email',title:"Email"},
                                                    {data:'contact_no',title:"contact_no",visible:false},
                                                    {data:'reg_name',title:"Region"},
                                                    {data:'date_created',title:"Date Created"},
                                                    {data:'prov_name',title:"prov_name",visible:false},
                                                    {data:'mun_name',title:"mun_name",visible:false},
                                                    {data:'bgy_name',title:"bgy_name",visible:false},
                                                    
                                                
                                                    {data:'id',
                                                        title:"Actions",
                                                        render: function(data,type,row){       
                                                        
                                                        
                                                            
                                                            return  (row['is_created'] == 1  ? ("<button type='button' class='btn view-modal-btn btn-outline-warning btn-block' user_id="+row['user_id']+" role_id="+row['role_id']+" reg="+row['reg']+" prov="+row['prov']+"  mun="+row['mun']+"  bgy="+row['bgy']+"   data-toggle='modal' data-target='#ViewModal'>"+
                                                                        "<i class='fa fa-edit'></i> Edit"+
                                                                    "</button>   "+(
                                                                    row['status'] == 1 ?
                                                                    "<button type='button' class='btn btn-outline-danger set-status-btn  btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
                                                                        "<i class='fa fa-trash'></i> Disable"+
                                                                    "</button>  " :
                                                                    "<button type='button' class='btn btn-outline-success set-status-btn btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
                                                                        "<i class='fa fa-undo'></i> Enable"+
                                                                    "</button> ")+(
                                                                    row['status'] == 2 ?
                                                                    "<button type='button' class='btn btn-outline-success set-block-btn  btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
                                                                        "<i class='fa fa-trash'></i> Unblock"+
                                                                    "</button>  " :
                                                                    "<button type='button' class='btn btn-outline-primary set-block-btn btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
                                                                        "<i class='fa fa-ban'></i> Block"+
                                                                    "</button> ")
                                                                    ) :
                                                                        ""
                                                                    )
                                                                    +
                                                                    (row['is_created'] == 0 ?
                                                                    "<button type='button' class='btn send-recovery-link-button btn-outline-info btn-block' user_id="+row['user_id']+" role_id="+row['role_id']+" email="+row['email']+"   agency_name="+row['agency_name']+" agency_loc="+row['agency_loc']+" agency_id="+row['agency_id']+" reg="+row['reg']+" prov="+row['prov']+"  mun="+row['mun']+"  bgy="+row['bgy']+"  >"+
                                                                        "<i class='fa fa-envelope'></i> Send Account Creation Email"+
                                                                    "</button>   "  
                                                                    : ''
                                                                    )
                                                            
                                                        }
                                                    }
                                            ],
                                            "language": {
                                            processing: '<img src="assets/img/images/da-loading.gif" >'
                                        },

                                        order:[['5','desc']]
                                        
                                        })
                            
                        }                                                
                    });


                    
                    // $("#load-datatable").DataTable().column(4).search(region_name).draw();                        
                    
            });

        


            // filter by program
            $("#filter-roles").change(function(){
                    
                    role = $("option:selected",this).val();
               

                        $("#load-datatable").DataTable().column(1).search(role).draw();
                            
                                        
            });



                $("#SendAccountCreationLinkForm").validate({
                rules:{
                    email:{
                            required:true,
                            email:true,
                          
                            remote:{
                                url:"{{route('check-email')}}",
                                type:'get'
                            }
                        },
                    role:true,
                 
                },
                messages:{
                    email:{
                            required:'<div class="text-danger">Please enter your email.</div>',
                            email:'<div class="text-danger">Please enter a valid email address.</div>',                             
                            remote:'<div class="text-danger">This email is already exist.</div>'
                    },   
                    role:{required:'<div class="text-danger">Please select your role.</div>'}
                    
                },
                submitHandler:()=>{
                     // upload file here
                     Swal.fire({
                                title: 'Are you sure you want to send account creation link?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, Send it!'
                    })
                    .then((result) => {
                    
                        if(result.isConfirmed){                                                                                                        
                        
                        

                        Swal.fire({
                            title: 'Sending...',
                            didOpen: function () {
                                Swal.showLoading()
                                $('.send-link-btn').prop('disabled',true)
                                $('.send-link-btn').html('<i class="fas fa-spinner fa-spin"/> Sending')
                                $.ajax({
                                    url:"{{route('send-account-creation-link')}}",
                                    type:'post',
                                    data:$("#SendAccountCreationLinkForm").serialize(),
                                    success:function(response){       
                                        parses_result = JSON.parse(response);


                                        
                                        
                                        Swal.fire(
                                        'Message',
                                        parses_result['message'],
                                        parses_result['result']
                                        ).then(()=>{
                                           $(".search-btn").trigger('click');
                                            Swal.close()
                                        })

                                        $("#SendAccountCreationLinkForm")[0].reset();                                        
                                        $('.send-link-btn').prop('disabled',false)
                                        $('.send-link-btn').html('Send Account Creation Link')
                                        
                                    }                                                
                                });
                                                          
                            }
                            })
                     
                    }
                   

                                


                                
                });

                }
                });
                
            
        })

        
    $(document).on('click','.search-btn',function(){

        let search = $("input[name=search]").val();

        let payload = {
            search:search,
            _token: '{{ csrf_token() }}'
        }

        
        if(search){
        $.ajax({
                url:'{{route("search-user")}}',
                type:'post',
                data:payload,
                success:function(data){      
                    $("#load-datatable").DataTable({       
                        destroy:true,
            responsive:true,        
            processing:true,    
            data:data.data,
            dom: 'lBfrtip',
            paging: true,
            "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
            "buttons": [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            {
                                text: '<i class="fas fa-print"></i> PRINT',
                                title: 'Report: List of User Accounts',
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
                                title: 'List of User Accounts',
                                extend: 'excelHtml5',
                                footer: true,
                                exportOptions: {
                                    columns: [ 0,1,2,3,4,6,7 ]
                                }
                            }, 
                            {
                                text: '<i class="far fa-file-excel"></i> CSV',
                                title: 'List of User Accounts',
                                extend: 'csvHtml5',
                                footer: true,
                                fieldSeparator: ';',
                                exportOptions: {
                                         columns: [ 0,1,2,3,4,6,7 ]
                                }
                            }, 
                            {
                                text: '<i class="far fa-file-pdf"></i> PDF',
                                title: 'List of User Accounts',
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
                    {data:'full_name',title:'Name'},
                    {data:'role',title:"Role"},                                        
                    {data:'email',title:"Email"},
                    {data:'contact_no',title:"contact_no",visible:false},
                    {data:'reg_name',title:"Region"},
                    {data:'date_created',title:"Date Created"},
                    {data:'prov_name',title:"prov_name",visible:false},
                    {data:'mun_name',title:"mun_name",visible:false},
                    {data:'bgy_name',title:"bgy_name",visible:false},
                    
                   
                    {data:'id',
                        title:"Actions",
                        render: function(data,type,row){       
                        
                        
                       
                            return  (row['is_created'] == 1  ? ("<button type='button' class='btn view-modal-btn btn-outline-warning btn-block' user_id="+row['user_id']+" role_id="+row['role_id']+" reg="+row['reg']+" prov="+row['prov']+"  mun="+row['mun']+"  bgy="+row['bgy']+"   data-toggle='modal' data-target='#ViewModal'>"+
                                        "<i class='fa fa-edit'></i> Edit"+
                                    "</button>   "+(
                                    row['status'] == 1 ?
                                    "<button type='button' class='btn btn-outline-danger set-status-btn  btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
                                        "<i class='fa fa-trash'></i> Disable"+
                                    "</button>  " :
                                    "<button type='button' class='btn btn-outline-success set-status-btn btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
                                        "<i class='fa fa-undo'></i> Enable"+
                                    "</button> ")+(
                                    row['status'] == 2 ?
                                    "<button type='button' class='btn btn-outline-success set-block-btn  btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
                                        "<i class='fa fa-trash'></i> Unblock"+
                                    "</button>  " :
                                    "<button type='button' class='btn btn-outline-primary set-block-btn btn-block' id='"+row['user_id']+"' status='"+row["status"]+"' >"+
                                        "<i class='fa fa-ban'></i> Block"+
                                    "</button> ")
                                    ) :
                                        ""
                                    )
                                    +
                                    (row['is_created'] == 0 ?
                                    "<button type='button' class='btn send-recovery-link-button btn-outline-info btn-block' user_id="+row['user_id']+" role_id="+row['role_id']+" email="+row['email']+"   agency_name="+row['agency_name']+" agency_loc="+row['agency_loc']+" agency_id="+row['agency_id']+" reg="+row['reg']+" prov="+row['prov']+"  mun="+row['mun']+"  bgy="+row['bgy']+"  >"+
                                        "<i class='fa fa-envelope'></i> Send Account Creation Email"+
                                    "</button>   "  
                                    : ''
                                    )
                              
                        }
                    }
            ],
            "language": {
            processing: '<img src="assets/img/images/da-loading.gif" >'
        },

        order:[['5','desc']]
           
        })
                }                
            });
        }else{
            Swal.fire(
                    'Message',
                    `Please input the required field.`,
                    'error'
                )
        }
        
    }); 




    </script>
@endsection










@section('content')

<!-- begin page-header -->
<h1 class="page-header"><i class="fa fa-users"></i> User Management</h1>
<!-- end page-header -->
<div class="note note-warning">
    <div class="note-icon"><i class="fa fa-question-circle "></i></div>
    <div class="note-content">
      <h4><b>Module Function:</b></h4>
       <ul>
           <li><strong>Adding of  user accounts.</strong></li>
           <li> <strong>Updating of user accounts.</strong></li>
           <li><strong>Enabling and disabling of user accounts.</strong> </li>
       </ul>
    </div>
</div>
  

<div class="row">



<div class="col-md-8">
<!-- begin panel -->
<div class="panel  shadow-lg p-3 mb-5 bg-white rounded">
    <div class="panel-heading">
        {{-- <h4 class="panel-title">Panel Title here</h4> --}}
        {{-- <button type='button' class='btn btn-lime'data-toggle='modal' data-target='#AddModal' >
            <i class='fa fa-plus'></i> Add New
        </button> --}}
    
    

        <button type='button' class='btn btn-primary'data-toggle='modal' data-target='#AddByEmailModal' >
            <i class='fa fa-plus'></i> Add New User By Email
        </button>
        
        <button type='button' class='btn btn-info' data-toggle='modal' data-target='#ImportModal' >
            <i class='fa fa-file-excel'></i> Import Encoders
        </button>
        
    </div>
    <div class="panel-body">

        {{-- FITLER START HERE --}}
        <div class="row">

            <div class="col-md-4">
                <div class="panel ">
                    <div class="panel-heading  bg-info  text-white">Filter by Region</div>
                    <div class="panel-body border">
                        <div class="form-group">
                        <label for=""></label>
                        <select  class="form-control filter-select" name="filter_region" id="filter-region">
                            <option value=""  selected>-- Select Region --</option>                        
                            @foreach ($get_regions as $value)
                            <option value="{{$value->reg_code}}">{{$value->reg_name}}</option>                        
                                
                            @endforeach

                        </select>
                        </div>
                    </div>
                </div>
            </div>


      


            
            <div class="col-md-4">
                <div class="panel ">
                    <div class="panel-heading  bg-info text-white">Filter by Role</div>
                    <div class="panel-body border">
                        <div class="form-group">
                        <label for=""></label>
                        <select  class="form-control filter-select" name="filter_roles" id="filter-roles">
                            <option value=""  selected>-- Select Role --</option>                        
                            @foreach ($get_filter_roles as $value)
                            <option value="{{$value->role}}">{{$value->role}}</option>                                                        
                            @endforeach

                        </select>
                        </div>
                    </div>
                </div>  
            </div>

    
        </div>  
   	<!-- begin input-group -->
       <div class="input-group input-group-lg m-b-20">
        <input type="text" class="form-control" placeholder="Search user..." name="search" />
        <div class="input-group-append">
            <button type="button" class="btn btn-warning search-btn"><i class="fa fa-search fa-fw"></i> Search</button>                     
        </div>
    </div>
    <!-- end input-group -->
        
        <table id="load-datatable" class="table table-striped table-hover text-center" style="width:100%;">            
            <thead>
             
            </thead>
            <tbody>                
            </tbody>
        </table>


        <!-- #modal-add -->
        <div class="modal fade" id="AddModal">
            <div class="modal-dialog" style="max-width: 40%">
                <form id="AddForm" method="POST" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#6C9738;">
                            <h4 class="modal-title" style="color: white">Add</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                        </div>
                        <div class="modal-body">
                            {{--modal body start--}}
                            <div class="col-lg-12 row">
                                <div class="form-group">
                                    <label>Name</label> <span style="color:red">*</span>
                                    <input style="text-transform: capitalize;"  name="first_name" class="form-control"  placeholder="First Name *"  >                                    
                                </div>&nbsp;
                                <div class="form-group">
                                    <label>&nbsp;</label> <span style="color:red"></span>
                                    <input style="text-transform: capitalize;"  name="middle_name" class="form-control"  placeholder="Middle Name " >                                    
                                </div>&nbsp;
                                <div class="form-group">
                                    <label>&nbsp;</label> <span style="color:red"></span>
                                    <input style="text-transform: capitalize;"  name="last_name" class="form-control"  placeholder="Last Name *"    >                                   
                                </div>&nbsp;
                                <div class="form-group">
                                    <label>&nbsp;</label> <span style="color:red"></span>
                                    <input style="text-transform: capitalize;"  name="ext_name" class="form-control"  placeholder="Extension Name *"    >                                   
                                </div>
                            </div>
                           

                            <div class="col-lg-12 row">
                                <div class="form-group">
                                    <label>Email</label><span style="color:red">*</span>
                                    <input    type="email" name="email" class="form-control"  placeholder="example@gmail.com" >
                                </div>&nbsp;&nbsp;
                                <div class="form-group">
                                    <label>Contact</label><span style="color:red">*</span>
                                    <input    type="number" name="contact" class="form-control"  placeholder="9102...." >
                                </div>
                            </div>

                            <div class="col-lg-12 row ">
                                <label class="col-md-12 row">Agency <span style="color:red">*</span></label> 
                                <div class="col-md-12  row">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" id="defaultRadio1" name="agency_loc"  value="CO" checked  />
                                        <label class="form-check-label" for="defaultRadio1">Central Office</label>
                                    </div> &nbsp; &nbsp;                       
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="defaultRadio2" name="agency_loc" value="RFO" />
                                        <label class="form-check-label" for="defaultRadio2">Regional Field Office</label>
                                    </div>       
                                </div>                       
                            </div><br>


                            <div class="col-lg-12 row ">
                                <div class="form-group" style="width:95%">
                                    <label >Role</label> <span style="color:red">*</span>
                                    <select class="form-control" name="role" id="role" >
                                        <option selected disabled value="">Select Role</option>    
                                        @foreach ($get_roles as $item)
                                            <option  value="{{$item->role_id}}">{{$item->role}}</option>
                                        @endforeach                                
                                    </select>
                                </div>                              
                            </div>
                            
                     

                  
                            <div class="col-lg-12 row ">
                                <div class="form-group" style="width:95%">
                                    <label >Region</label> <span style="color:red">*</span>
                                    <select class="form-control" id="region" name="region" >
                                        <option selected disabled value="">Select Region</option>
                                        @foreach ($get_regions as $item)
                                            <option value="{{$item->reg_code}}">{{$item->reg_name}}</option>
                                        @endforeach
                                    </select>
                                </div>                              
                            </div>

                            <div class="col-lg-12 row ">
                                <div class="form-group" style="width:95%">
                                    <label >Province</label> <span style="color:red">*</span>
                                    <select class="form-control" id="province" name="province" disabled >
                                        <option selected disabled value="">Select Province</option>
                                    </select>
                                </div>                              
                            </div>

                            <div class="col-lg-12 row ">
                                <div class="form-group" style="width:95%">
                                    <label >Municipality</label> <span style="color:red">*</span>
                                    <select class="form-control" id="municipality" name="municipality" disabled >
                                        <option selected disabled value="">Select Municipality</option>
                                    </select>
                                </div>                              
                            </div>

                            <div class="col-lg-12 row ">
                                <div class="form-group" style="width:95%">
                                    <label >Barangay</label> <span style="color:red">*</span>
                                    <select class="form-control" id="barangay" name="barangay" disabled     >
                                        <option selected disabled value="">Select Barangay</option>
                                    </select>
                                </div>                              
                            </div>
                            {{--modal body end--}}
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-lime add-btn">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


         <!-- #modal-view VIEW PROFILE-->
         <div class="modal fade" id="ViewModal">
            <div class="modal-dialog" style="max-width: 40%">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #f59c1a">
                        <h4 class="modal-title" style="color: white">Update Profile</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                    </div>
                    <form id="UpdateForm" method="post">
                        @csrf
                        <input type="text" id="user_id" name="id" hidden>
                        <div class="modal-body">
                            {{--modal body start--}}
                            <h2 id="ViewCategName" align="center"></h2>

                            
                            <div class="note note-success">
                                <div class="note-icon"><i class="fas fa-user"></i></div>
                                <div class="note-content">
                                    <label style="display: block; text-align: center; font-weight:bold;  font-size:24px" id="name"></label>
                                    <label style="display: block; text-align: center; font-weight:bold;  font-size:20px" id="role_view"></label>
                                </div>
                            </div>


                    
                         
                            <div class="col-lg-12 row">
                                <div class="form-group">
                                    <label>Email</label><span style="color:red">*</span>
                                    <input    type="email" name="email" id="edit_email" class="form-control"  placeholder="example@gmail.com" >
                                </div>&nbsp;&nbsp;
                                <div class="form-group">
                                    <label>Contact</label><span style="color:red">*</span>
                                    <input    type="text" name="contact" id="edit_contact" class="form-control"  placeholder="9102...." >
                                </div>
                            </div>


                       


                            <div class="col-lg-12 row ">
                                <div class="form-group" style="width:95%">
                                    <label >Role</label> <span style="color:red">*</span>
                                    <select class="form-control" name="role_id" id="edit_role_id" >
                                        <option selected disabled value="">Select Role</option>    
                                        @foreach ($get_roles as $item)
                                            <option  value="{{$item->role_id}}">{{$item->role}}</option>
                                        @endforeach                                
                                    </select>
                                </div>                              
                            </div>                        
                                          

                            <div class="col-lg-12 row ">
                                <div class="form-group" style="width:95%">
                                    <label >Region</label> <span style="color:red">*</span>
                                    <select class="form-control" id="edit_region" name="region" >
                                        <option selected disabled value="">Select Region</option>
                                        @foreach ($get_regions as $item)
                                            <option value="{{$item->reg_code}}">{{$item->reg_name}}</option>
                                        @endforeach
                                    </select>
                                </div>                              
                            </div>

                            <div class="col-lg-12 row  ">
                                <div class="form-group" style="width:95%">
                                    <label >Province</label> <span style="color:red">*</span>
                                    <select class="form-control" id="edit_province" name="province" disabled >
                                        <option selected disabled value="">Select Province</option>
                                    </select>
                                </div>                              
                            </div>

                            <div class="col-lg-12 row  ">
                                <div class="form-group" style="width:95%">
                                    <label >Municipality</label> <span style="color:red">*</span>
                                    <select class="form-control" id="edit_municipality" name="municipality" disabled >
                                        <option selected disabled value="">Select Municipality</option>
                                    </select>
                                </div>                              
                            </div>

                            <div class="col-lg-12 row ">
                                <div class="form-group" style="width:95%">
                                    <label >Barangay</label> <span style="color:red">*</span>
                                    <select class="form-control" id="edit_barangay" name="barangay" disabled     >
                                        <option selected disabled value="">Select Barangay</option>
                                    </select>
                                </div>                              
                            </div>

                            <input type="text" id="update-role" name="role" class="form-control hide"   required="true" >                                              

                          

                                
                            {{--modal body end--}}
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-warning update-btn">    Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


      



         <!-- #modal-Import File -->
         <div class="modal fade" id="ImportModal">
            <div class="modal-dialog" style="max-width: 30%">
                <form id="ImportForm" method="POST"  >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #3a92ab">
                            <h4 class="modal-title" style="color: white">Import Encoders</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                        </div>
                        <div class="modal-body">
                            {{--modal body start--}}
                            <label class="form-label hide"> ID</label>                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>File </label>
                                    <input type="file" class="form-control" accept=".xlsx" name="file">
                                </div>
                            </div>
                           




                           
                            {{--modal body end--}}
                        </div>
                        <div class="modal-footer">
                            <a  href="{{ route('download-template') }}" class="btn btn-lime btn-download-template"><i class="fas fa-download "></i> Download Template</a>
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-info import-btn"><i class="fas fa-cloud-download-alt "></i> Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <!-- #modal-list of not inserted data to database from excel -->
        <div class="modal fade" id="ErrorDataModal"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" style="max-width: 70%">                    
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #ff5b57">
                            <h4 class="modal-title update-modal-title" style="color: white">Unsuccessful Imported Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                        </div>
                        <div class="modal-body">
                            {{--modal body start--}}          

                            <table id="error-datatable" class="table table-hover" style="width:100%">            
                                <thead>                                        
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                            {{--modal body end--}}
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>                                
                        </div>
                    </div>                    
            </div>
        </div>



        <!-- #modal-list of not inserted data to database from excel -->
        <div class="modal fade" id="AddByEmailModal"  data-backdrop="static" data-keyboard="false">
            <form id="SendAccountCreationLinkForm">
                @csrf
                <div class="modal-dialog">                    
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title update-modal-title" style="color: white">Add User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                            </div>
                            <div class="modal-body">
                                {{--modal body start--}}          
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label >Roles</label> <span style="color:red">*</span>
                                        <select class="form-control" id="role" name="role" >
                                            <option selected disabled value="">Select role</option>
                                            @foreach ($get_roles as $item)
                                                <option value="{{$item->role_id}}">{{$item->role}}</option>
                                            @endforeach
                                        </select>      
                                    </div>                          
                                </div>
                                
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <label>Email</label><span style="color:red">*</span>
                                        <input    type="email" name="email" id="email" class="form-control border-info col-lg-12"  placeholder="example@gmail.com" >
                                </div>
                                {{--modal body end--}}
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-primary send-link-btn">Send Account Creation Link</button>
                            </div>
                        </div>                    
                </div>
            </form>
        </div>


        
    </div>
</div>
<!-- end panel -->
</div>

</div>

<div class="col-md-4">
    <!-- begin panel -->
    <div class="panel panel-info ">
        <div class="panel-heading bg-white">
            <strong class="text-black" style="font-size: 20px">Dashboard</strong>
        </div>
        <div class="panel-body">
            <div id="container"></div>
            @include('UserManagement::dashboard')

        </div>
    </div>
    <!-- end panel -->
</div>

</div>

@endsection