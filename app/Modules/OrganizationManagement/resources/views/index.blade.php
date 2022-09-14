@extends('global.base')
@section('title', "Organization Management")




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
            color:#545a64;
            font-size: 20px;                        
            font-weight: bold
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

    @include('OrganizationManagement::js.js')

@endsection










@section('content')

<!-- begin page-header -->
<h1 class="page-header">Organization Management</h1>
<!-- end page-header -->

<!-- begin panel -->
<div class="panel  ">
    <div class="panel-heading">        
  

        <button type='button' class='btn btn-primary'data-toggle='modal' data-target='#AddModal' >
            <i class='fa fa-plus'></i> Add New Organization
        </button>

    </div>
    <div class="panel-body">

        
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
                        <div class="modal-header" style="background-color:#348fe2;">
                            <h4 class="modal-title" style="color: white">Add</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                        </div>
                        <div class="modal-body">
                            {{--modal body start--}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Organization Name </label> <span style="color:red">*</span>
                                    <input style="text-transform: capitalize;"  name="org_name" class="form-control"  placeholder="Please enter name here..."  >                                    
                                </div>&nbsp;                            
                            </div>                  
                                                              
                            {{--modal body end--}}
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-success add-btn">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


          <!-- #modal-update -->
          <div class="modal fade" id="UpdateModal">
            <div class="modal-dialog" style="max-width: 40%">
                <form id="UpdateForm" method="POST" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#ffc107;">
                            <h4 class="modal-title" style="color: white">UPDATE INFO</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                        </div>
                        <div class="modal-body">

                            <input type="text" name="org_id" class="hide"/>

                            {{--modal body start--}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Organization Name </label> <span style="color:red">*</span>
                                    <input style="text-transform: capitalize;"  name="org_name" id="org_name" class="form-control"  placeholder="Please enter animal name here..."  >                                    
                                </div>&nbsp;                            
                            </div>                                    
                            {{--modal body end--}}
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>






      



        
    </div>
</div>
<!-- end panel -->
@endsection