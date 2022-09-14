@extends('global.base')
@section('title', "PARTNER PROFILE")

{{--  import in this section your css files--}}
@section('page-css')
    <link href="{{url('assets/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" />
    <link href="{{url('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />

    {{-- datatable row group--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.3/css/rowGroup.dataTables.min.css">

    {{-- datatable buttons --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    {{-- datatable responsive --}}
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    {{-- Include external CSS components --}}
    @include('PartnerProfileModule::components.css.css')

    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #CCC;
            border: 0px!important;
        }
        
        #customers td, #customers th {
            padding: 8px;
            border: none;
        }
        
        /* #customers tr:nth-child(even){background-color: #f2f2f2;} */
        
        /* #customers tr:hover {background-color: #ddd;} */
        
        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            /* background-color: #04AA6D; */
            color: black;
        }

        .form-control[readonly]{
            background: #ffffff;
            opacity: 1;
        }

        input[type="text"] {
              cursor: context-menu;
        }
        
        textarea{
            cursor: context-menu;
        }

        .badge{
            border-radius: 0px !important;
        }
    </style>
@endsection




{{--  import in this section your javascript files  --}}
@section('page-js')
    <script src="{{url('assets/plugins/gritter/js/jquery.gritter.js')}}"></script>
    <script src="{{url('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{url('assets/js/demo/ui-modal-notification.demo.min.js')}}"></script>
    <script src="{{url('assets/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{url('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('assets/js/demo/table-manage-default.demo.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>

    {{-- datatable responsive --}}
    <script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    {{-- datatable buttons --}}
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    {{-- datatable row group --}}
    <script src="https://cdn.datatables.net/rowgroup/1.1.3/js/dataTables.rowGroup.min.js"></script>

    {{-- sweet alert 2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Include external JS components --}}
    @include('PartnerProfileModule::components.js.js')

    @include('PartnerProfileModule::components.js.partner_site_datatable')
@endsection


<script>

</script>


@section('content')
{{-- <input type="hidden" id="refno" value="1"> --}}
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">HOME</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">PARTNER PROFILE</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">PARTNER PROFILE</h1>
<!-- end page-header -->

<div class="row mt-5">

    @foreach ($get_partner_profile as $pp)
    <div class="col-lg-5">
        <div class="panel panel-inverse" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="panel-heading">
                <h4 class="panel-title">PROFILE</h4>
            </div>
            <div class="panel-body">
                <table id="customers">
                    <tr>
                        <th style="font-size: 12px;">PARTNER NAME</th>
                        <td style="width: 400px;"><input class="form-control" name="" value="{{$pp->partner_name}}" type="text" readonly /></td>
                      </tr>
                      <tr>
                        <th style="font-size: 12px;">CONTACT PERSON NAME</th>
                        <td style="width: 400px;"><input class="form-control" name="" value="{{$pp->contact_person}}" type="text" readonly /></td>
                      </tr>
                      <tr>
                        <th style="font-size: 12px;">CONTACT NO</th>
                        <td style="width: 400px;"><input class="form-control" name="" value="{{$pp->contact_no}}" type="text" readonly /></td>
                      </tr>
                      <tr>
                        <th style="font-size: 12px;">STATUS</th>
                        <td style="width: 400px;">
                            @if ($pp->status == 1)
                                <span class="badge bg-Success"> ACTIVE </span>
                                {{-- <h4><span class="badge" style="background-color: rgba(57,218,138,.17); color: #0bd570!important;" data-value="'.$row->payout.'">ACTIVE</span></h4> --}}
                            @else
                                <span class="badge bg-Danger"> NOT ACTIVE </span>
                                {{-- <h4><span class="badge" style="background-color: rgba(57,218,138,.17); color: #da3939!important;" data-value="'.$row->payout.'">NOT ACTIVE</span></h4> --}}
                            @endif
                        </td>
                      </tr>
                </table>  
            </div>
        </div>

        <div class="panel panel-inverse" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="panel-heading">
                <h4 class="panel-title">FARM AREA IMAGES & LOCATION</h4>
            </div>
            <div class="panel-body"> 
                @php echo '<iframe id="map_canvas" width="600" height="450" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC6JVpfd5wzUy4nYmymW1OTpuhSMbTkBe8&q='.$pp->lat.','.$pp->long.'"></iframe>'; @endphp
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="panel panel-inverse" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="panel-heading">
                <h4 class="panel-title">SITE INFO</h4>
            </div>
            <div class="panel-body">
                <table id="customers">
                    <tr>
                        <th style="font-size: 12px;">SITE NAME</th>
                        <td style="width: 400px;"><input class="form-control" name="" value="{{$pp->site_name}}" type="text" readonly /></td>
                    </tr>
                    <tr>
                        <th style="font-size: 12px;">SITE OWN</th>
                        <td style="width: 400px;"><input class="form-control" name="" value="{{$pp->site_own}}" type="text" readonly /></td>
                    </tr>
                    <tr>
                        <th style="font-size: 12px;">LAND AREA</th>
                        <td style="width: 400px;"><input class="form-control" name="" value="{{$pp->land_area}}" type="text" readonly /></td>
                    </tr>
                    <tr>
                        <th style="font-size: 12px;">REGION</th>
                        <td style="width: 400px;">
                            <input class="form-control" name="" value="{{$pp->reg_name}}" type="text" readonly />

                        </td>
                    </tr>
                    <tr>
                        <th style="font-size: 12px;">PROVINCE</th>
                        <td style="width: 400px;">
                            <input class="form-control" name="" value="{{$pp->prov_name}}" type="text" readonly />
                        </td>
                    </tr>
                    <tr>
                        <th style="font-size: 12px;">MUNCIPALITY</th>
                        <td style="width: 400px;">
                            <input class="form-control" name="" value="{{$pp->mun_name}}" type="text" readonly />
                        </td>
                    </tr>
                    <tr>
                        <th style="font-size: 12px;">BARANGAY</th>
                        <td style="width: 400px;">
                            <input class="form-control" name="" value="{{$pp->bgy_name}}" type="text" readonly />
                        </td>
                    </tr>
                    <tr>
                        <th style="font-size: 12px;">SITE ADDRESS</th>
                        <td style="width: 400px;">
                            <textarea class="form-control" name="" value="" rows="3" readonly>{{$pp->site_address}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="font-size: 12px;">LATITUDE </th>
                        <td style="width: 400px;">
                            <input class="form-control" name="" value="{{$pp->lat}}" type="text" readonly />
                        </td>
                    </tr>
                    <tr>
                        <th style="font-size: 12px;"> LONGITUDE </th>
                        <td style="width: 400px;">
                            <input class="form-control" name="" value="{{$pp->long}}" type="text" readonly />
                        </td>
                    </tr>
                    <tr>
                        <th style="font-size: 12px;"> NO. OF MANPOWER </th>
                        <td style="width: 400px;">
                            <input class="form-control" name="" value="{{$pp->no_of_manpower}}" type="text" readonly />
                        </td>
                    </tr>
                </table> 
            </div>
        </div>
    </div>

    @endforeach

    {{-- <div class="col-lg-7">
        <div class="panel panel-inverse" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="panel-heading">
                <h4 class="panel-title">SITE INFO</h4>
            </div>
            <div class="panel-body">
                <table id="partner-site-datatable" class="table table-bordered table-hover mt-5 mb-5 text-center display responsive nowrap" style="width:100%;">
                    <thead class="table-header">
                      <tr>
                        <th>SITE NAME</th>
                        <th>LAND AREA</th>
                        <th>MUNICIPALITY</th>
                        <th>SITE ADDRESS</th>
                        <th>LATITUDE</th>
                        <th>LONGITUDE</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table> 
            </div>
        </div>
    </div> --}}

</div>

@endsection
