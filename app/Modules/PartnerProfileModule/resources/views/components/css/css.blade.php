<style>
    .pa-color-highlight {
        text-decoration: none !important;
        box-shadow: inset 0 -.5em 0 rgba(245, 221, 86, 0.994) !important;
        color: inherit !important;
    }
    .panel-inverse{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        border-radius:15px !important;
    }

    .panel-inverse>.panel-heading{
        border-radius:15px !important;
    }

    .panel-inverse>.panel-heading {
        background: #ffffff !important;
    }

    .panel-inverse>.panel-heading{
        color: rgb(0, 0, 0) !important;
    }

    .panel-title {
        font-size: 15px !important;
    }

    table th:first-child{
        border-radius:15px 0 0 0 !important;
    }

    table th:last-child{
        border-radius:0 15px 0 0 !important;
    }

    table.dataTable{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important; 
        border-radius:15px !important;
    } 

    .btn.btn-primary{
        color: #fff;
        background: #3571cb;
        border-color: #242526;
    }
    .swal2-title {
        font-size: 20px !important;
    }
    .swal2-button {
        font-size: 20px !important;
    }
    table.dataTable td {
        font-size: 13px !important;
    }
    table.dataTable th {
        font-size: 13px !important;
    }

    .table-header{
        background-color: #008a8a;
        /* font-size: 12px !important; */
    }
    
    table thead th{
        color: white !important;
    }

    .table th {
        border-radius:2px !important;
    }
    
    .panel-inverse{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius:15px;
    }

    /* .panel-inverse>.panel-heading{
      border-radius:15px;
    } */
    
    .dt-button{
        background-color: #00c3ff !important;
        color: #fff !important;
        font-size: 12px !important;
        border-radius: 5px !important;
        padding-top: 5px !important;
        padding-bottom: 5px !important;
        padding-left: 20px !important;
        padding-right: 20px !important;
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

    @media screen and (max-width: 767px){
        div.dataTables_wrapper div.dataTables_length{
            text-align:left !important;
        }
    }

    @media screen and (max-width: 767px){
        div.dataTables_wrapper div.dataTables_filter{
            text-align:left !important;
        }
    }
</style>