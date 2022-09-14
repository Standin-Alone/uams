@extends('global.base')
@section('title', "MAP")

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
    @include('MapModule::components.css.css');
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
    @include('MapModule::components.js.js');

    {{-- Region, Province, Municipality, and Barangay Dropdown Filter--}}
    @include('MapModule::components.js.dropdown_filter');

    {{-- MAP JS --}}
    @include('MapModule::components.js.map');

    {{-- GOOGLE MAP API --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6JVpfd5wzUy4nYmymW1OTpuhSMbTkBe8&q&callback" async defer ></script>

@endsection


<script>

</script>


@section('content')
{{-- <input type="hidden" id="refno" value="1"> --}}
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="{{route('main.home')}}">HOME</a></li>
    <li class="breadcrumb-item active">MAP</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">MAP</h1>
<!-- end page-header -->

<div class="row mt-5">

    <div class="col-lg-4">

        <div class="panel panel-inverse" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="panel-heading">
                <h4 class="panel-title">FILTER</h4>
            </div>
            <div class="panel-body">
                <br>
                <!-- GET FILTER CARDS REGION, PROVINCE, MUNICIPALITY, AND BARANGAY -->
                @include('MapModule::components.filter_cards.dropdown_filter')

                <div class="row col-md-12">
                    <div class="ml-3 mr-3">

                        <button type="button" class="btn btn-success" id="filter_btn">
                            <span class="">FILTER</span>
                        </button>

                        <button type="submit" class="btn btn-success" id="show_all">
                            <span class="">SHOW ALL</span>
                        </button>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-8">

        <div class="panel panel-inverse" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="panel-heading">
                <h4 class="panel-title">MAP</h4>
            </div>
            <div class="panel-body">

                <div class="" id="map"></div>

            </div>
        </div>

    </div>

</div>
@endsection
