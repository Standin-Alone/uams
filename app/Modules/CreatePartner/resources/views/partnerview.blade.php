@extends('global.base')



@section('title', 'List of Partner')

{{-- import in this section your css files --}}
@section('page-css')
    {{-- Include Libraries CSS --}}
    @include('components.libraries.css-components')
@endsection

{{-- import in this section your javascript files --}}
@section('page-js')
    {{-- Include Libraries JS --}}
    @include('components.libraries.js-components')

    {{-- Include Script Components --}}
    @include('CreatePartner::components.script.js')
    @include('CreatePartner::components.script.data-js')
@endsection

@section('content')
    <!-- STORE DATA OBJECT -->
    {{-- <input type="hidden" id="selectedProgramDesc" value="{{session('Default_Program_Desc')}}">
<input type="hidden" id="selectedProgramId" value="{{session('Default_Program_Id')}}">
<input type="hidden" id="selectedlinkview" value="">
<input type="hidden" id="selectedprogram_id" value=""> --}}

    <div class="row">
        <!-- PROGRAM DROPDOWN SELECTION -->
        <div class="col-md-6">
            <div class="input-group">
                {{-- <h1 class="page-header">Employee Profile Update Request<small>&nbsp; {{session('user_region_name')}}</small></h1> --}}
            </div>
        </div>

        <!-- HEADER CAPTION -->
        <div class="col-md-6">
            <ol class="breadcrumb pull-right">
                {{-- <li class="breadcrumb-item"><a href="{{ route('main.home') }}">Home Page</a></li> --}}
                <li class="breadcrumb-item active">Employee Profile Update Request</li>
            </ol>
        </div>
    </div>


    <div class="panel bg-gradient">
        <div class="panel-heading">
            <div class="panel-heading-btn">

                <!-- <a href="javascript:;" class="btn btn-xs btn-inverse btn-create-eme"><i class="fa fa-plus"></i> Create</a> -->
                {{-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> --}}
                {{-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success reload_panel" data-click="panel-reload"><i class="fa fa-redo"></i></a> --}}
                {{-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a> --}}
            </div>
            <h4 class="panel-title" style="color: #d9e0e7;"><i class="fa fa-info-circle"></i> Partners Profile:</h4>
        </div>
        <div class="panel-body" style="background-color: #fff;">
            {{-- <div id="page-container" class="fade"> --}}
            <div class="register register-with-news-feed overflow-auto">
                <a href="javascript:history.back()" style="float:right 4px;" class="btn btn-default">Back</a>
                {{-- <div class="news-feed">
                    <div class="news-image" style="background-image: url({{ url('assets/img/images/IMP.jpg') }})"></div>
                    <div class="news-caption">
                    </div>
                </div> --}}

                <div class="">
                    <div class="alert alert-info clearfix">
                        <a href="#" class="alert-link">
                            Partners Profile
                        </a>

                    </div>





                    <form action="">



                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Partners Name:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext"
                                    value="{{ $user->partner_name }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Contact Person:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext"
                                    value="{{ $user->contact_person }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Contact Number:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext"
                                    value="{{ $user->contact_no }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Contact Address:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext"
                                    value="{{ $user->site_address }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Region</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $user->reg_name }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Province:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $user->prov_name }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Municipality:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $user->mun_name }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Barangay:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $user->bgy_name }}"
                                    disabled>
                            </div>
                        </div>

                    </form>


                    <div class="alert alert-info clearfix">
                        <a href="#" class="alert-link">

                        </a>

                    </div>


                    {{-- @php
                                    $success = Session::get('success');
                                @endphp
                                @if ($success)
                                <div class="alert alert-success">{{$success}}
                                @endif --}}
                    {{-- </div> --}}





                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-inverse">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Partner Site</h4>
                                    <td>
                                        <a href="" id="editCompany" data-toggle="modal"
                                            data-target='#partnersite_modal'>Add Partner Site</a>
                                    </td>
                                </div>

                                <div class="panel-body">
                                    <span class="error_deduction"></span>
                                    <table id="partnersite-datatable"
                                        class="datatable table table-striped table-bordered table-hover text-center"
                                        style="width:100%;">
                                        <thead class="table-header">
                                            <tr>
                                                <th>Site Name</th>
                                                <th>Land Area</th>
                                                <th>No of Manpower</th>
                                                <th>No of year</th>
                                                <th>Site Own</th>
                                                <th>Region Name</th>
                                                <th>Province Name</th>
                                                <th>Municipality Name</th>
                                                <th>Action</th>

                                        </thead>
                                        <tbody>
                                            @foreach ($sites as $site)
                                                <tr>
                                                    <td>{{ $site->site_name }}</td>
                                                    <td>{{ $site->land_area }}</td>
                                                    <td>{{ $site->no_of_manpower }}</td>
                                                    <td>{{ $site->no_of_year }}</td>
                                                    <td>{{ $site->site_own }}</td>
                                                    <td>{{ $site->reg_name }}</td>
                                                    <td>{{ $site->prov_name }}</td>
                                                    <td>{{ $site->mun_name }}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target="#editSite{{ $loop->index }}">Edit</button>
                                                        <a href="{{ route('site.delete') }}" class="btn btn-danger"
                                                            id="delete">Delete</a>
                                                        <!----------------------------------------------- Modal --------------------------------------------------------->
                                                        <div class="row">
                                                            <div class="modal" tabindex="-1" role="dialog"
                                                                id="editSite{{ $loop->index }}">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="alert alert-danger"
                                                                            style="display:none">
                                                                        </div>
                                                                        <div class="modal-header">

                                                                            <h5 class="modal-title">Update Partner Site
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <meta name="csrf-token"
                                                                            content="{{ csrf_token() }}" />
                                                                        <form id="form_editSite{{ $loop->index }}">
                                                                            @csrf
                                                                            <table
                                                                                class="table mb-0 table-sm table-condensed text-xs">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">

                                                                                            </div>
                                                                                            <input type="text"
                                                                                                name="partner_id"
                                                                                                class="form-control form-control-sm"
                                                                                                value="{{ $user->partner_id }}"
                                                                                                hidden>

                                                                                            <input type="text"
                                                                                                name="site_id"
                                                                                                class="form-control form-control-sm"
                                                                                                value="{{ $site->site_id }}"
                                                                                                hidden>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>

                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Partner Name</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">
                                                                                                {{ $user->partner_name }}
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Site Name</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="site_name"
                                                                                                    id="site_name{{ $loop->index }}"
                                                                                                    value="{{ $site->site_name }}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Land Area</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <input type="number"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="land_area"
                                                                                                    id="land_area{{ $loop->index }}"
                                                                                                    value="{{ $site->land_area }}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Number of
                                                                                                    Manpower</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <input type="number"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="no_of_manpower"
                                                                                                    id="no_of_manpower{{ $loop->index }}"
                                                                                                    value="{{ $site->no_of_manpower }}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Number of
                                                                                                    year</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <input type="number"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="no_of_year"
                                                                                                    id="no_of_year{{ $loop->index }}"
                                                                                                    value="{{ $site->no_of_year }}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label> Site own:</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <select
                                                                                                    class="custom-select custom-select-sm"
                                                                                                    name="site_own">
                                                                                                    <option selected
                                                                                                        value=""
                                                                                                        disabled>---Please
                                                                                                        Select
                                                                                                        ---- </option>
                                                                                                    <option value="Rented"
                                                                                                        class="">
                                                                                                        Rented
                                                                                                    </option>
                                                                                                    <option value="Owned"
                                                                                                        class="">
                                                                                                        Owned
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Contracted"
                                                                                                        class="">
                                                                                                        Contracted
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Number of
                                                                                                    year</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="no_of_year"
                                                                                                    id="no_of_year{{ $loop->index }}"
                                                                                                    value="{{ $site->no_of_year }}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>


                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Region</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="hidden"
                                                                                                class="geo_code">
                                                                                            <div class="row m-b-15">
                                                                                                <div class="col-md-12">
                                                                                                    <select
                                                                                                        class="form-control select region"
                                                                                                        name="reg_code"
                                                                                                        data-size="10"
                                                                                                        id="region{{ $loop->index }}"
                                                                                                        data-style="btn-white">
                                                                                                        <option
                                                                                                            value=""selected>
                                                                                                            Select Region
                                                                                                        </option>
                                                                                                        @foreach ($get_regions as $reg)
                                                                                                            <option
                                                                                                                value="{{ $reg->reg_code }}">
                                                                                                                {{ $reg->reg_name }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>


                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Province</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="row m-b-15">
                                                                                                <div class="col-md-12">
                                                                                                    <select
                                                                                                        class="form-control select province"
                                                                                                        name="prov_code"
                                                                                                        data-size="10"
                                                                                                        data-style="btn-white"
                                                                                                        id="province{{ $loop->index }}"
                                                                                                        disabled>
                                                                                                        <option
                                                                                                            value=""
                                                                                                            selected
                                                                                                            disabled>
                                                                                                            Select
                                                                                                            Province
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Municipality</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <select
                                                                                                    class="form-control select municipality"
                                                                                                    name="mun_code"
                                                                                                    data-size="10"
                                                                                                    data-style="btn-white"
                                                                                                    id="municipality{{ $loop->index }}"
                                                                                                    disabled>
                                                                                                    <option value=""
                                                                                                        selected disabled>
                                                                                                        Select
                                                                                                        Municipality
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>


                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Barangay</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <select
                                                                                                    class="form-control select barangay"
                                                                                                    name="bgy_code"
                                                                                                    data-size="10"
                                                                                                    data-style="btn-white"
                                                                                                    id="barangay{{ $loop->index }}"
                                                                                                    disabled>
                                                                                                    <option value=""
                                                                                                        selected disabled>
                                                                                                        Select
                                                                                                        Barangay
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Site Address</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <input type="site_address"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="site_address"
                                                                                                    id="site_address{{ $loop->index }}"
                                                                                                    value="{{ $site->site_address }}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <!-- MODAL FOOTER - START -->
                                                                            <div class="modal-footer">
                                                                                <div class="form-group">
                                                                                    <button type="button"
                                                                                        class="btn btn-sm btn-primary"
                                                                                        onclick="edit_site('#form_editSite{{ $loop->index }}')"
                                                                                        name="save">
                                                                                        <span
                                                                                            class="fas fa-fw fa-sm fa-plus mr-1"></span>
                                                                                        Add
                                                                                    </button>
                                                                                    <button
                                                                                        class="btn btn-sm btn-secondary"
                                                                                        data-dismiss="modal">
                                                                                        <span
                                                                                            class="fas fa-fw fa-sm fa-times mr-1"></span>
                                                                                        Close
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- ------------------------------- end of Partner Site modal --------------------------------- --}}
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- ------------------------------- end of Partner Site --------------------------------- --}}

{{-- -----------------------------------------------ADD PARTNER TECH--------------------------------------------------------- --}}

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel panel-inverse">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">PARTNER TECHNOLOGY</h4>

                                        <a href="" id="editCompany" data-toggle="modal"
                                            data-target='#partnersite_technology'>Add Partner Technology</a>
                                    </div>
                                    <div class="panel-body">
                                        <span class="error_earnings"></span>
                                        <table id="technology-datatable"
                                            class="datatable table table-striped table-bordered table-hover text-center"
                                            style="width:100%;">
                                            <thead class="table-header">
                                                <tr>
                                                    <th>Technology </th>
                                                    <th>Action</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($technology as $tech)
                                                    <tr>
                                                        <td>{{ $tech->tech_desc }}</td>
                                                        {{-- <td>
                                                            <a href="{{ route('site.delete') }}" class="btn btn-danger"
                                                                id="delete">Delete</a>
                                                        </td> --}}
                                                        <td>
                                                            <button type='button' class='btn btn-outline-danger set-status-btn btn_delete_tech'
                                                                id="btn_delete_tech" name="btn_delete_tech"
                                                                data-selectedid="{{ $tech->id }}"
                                                                data-status="${row.status}"
                                                                >
                                                                <i class='fa fa-remove'></i> Delete
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
{{-------------------------------------------------------------------------------------------------------------------------------------------------------- --}}
                            <div class="col-lg-4">
                                <div class="panel panel-inverse">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">PARTNER TRAINING</h4>

                                        <a href="" id="editCompany" data-toggle="modal"
                                            data-target='#partnersite_training'>Add Partner Training</a>
                                    </div>
                                    <div class="panel-body">
                                        <span class="error_earnings"></span>
                                        <table id="training-datatable"
                                            class="datatable table table-striped table-bordered table-hover text-center"
                                            style="width:100%;">
                                            <thead class="table-header">
                                                <tr>
                                                    <th>Training</th>
                                                    <th>Action</th>


                                                    {{-- <th>No. of Payment</th> --}}
                                                    {{-- <th>Action</th> --}}
                                            </thead>
                                            <tbody>
                                                @foreach ($training as $train)
                                                    <tr>
                                                        <td>{{ $train->training_desc }}</td>
                                                        {{-- <td>

                                                            <a href="{{ route('site.delete') }}" class="btn btn-danger" id="delete">Delete</a>
                                                        </td> --}}
                                                        <td>
                                                            <button type='button' class='btn btn-outline-danger set-status-btn btn_delete_organization'
                                                                id="btn_delete_organization" name="btn_delete_organization"
                                                                data-selectedid="{{ $train->training_id }}"
                                                                data-status="${row.status}"
                                                                >
                                                                <i class='fa fa-remove'></i> Delete
                                                            </button>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

{{-- ------------------------------------------------------------------------------------------------------------------------------------ --}}
                            <div class="col-lg-4">
                                <div class="panel panel-inverse">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">PARTNER ORGANIZATION</h4>

                                        <a href="" id="editCompany" data-toggle="modal"
                                            data-target='#partnersite_organization'>Add Partner Organization</a>
                                    </div>
                                    <div class="panel-body">
                                        <span class="error_earnings"></span>
                                        <table id="organization-datatable"
                                            class="datatable table table-striped table-bordered table-hover text-center"
                                            style="width:100%;">
                                            <thead class="table-header">
                                                <tr>
                                                    <th>Organization</th>
                                                    <th>Action</th>


                                                    {{-- <th>No. of Payment</th> --}}
                                                    {{-- <th>Action</th> --}}
                                            </thead>
                                            <tbody>
                                                @foreach ($organization as $org)
                                                    <tr>
                                                        <td>{{ $org->org_name }}</td>
                                                        <td>

                                                            <a href="{{ route('site.delete') }}" class="btn btn-danger"
                                                                id="delete">Delete</a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="panel panel-inverse">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">PARTNER ANIMAL</h4>

                                        <a href="" id="editCompany" data-toggle="modal"
                                            data-target='#partnersite_animal'>Add Partner Animal</a>
                                    </div>
                                    <div class="panel-body">
                                        <span class="error_earnings"></span>
                                        <table id="animal-datatable"
                                            class="datatable table table-striped table-bordered table-hover text-center"
                                            style="width:100%;">
                                            <thead class="table-header">
                                                <tr>
                                                    <th>Animal</th>
                                                    <th>Action</th>


                                                    {{-- <th>No. of Payment</th> --}}
                                                    {{-- <th>Action</th> --}}
                                            </thead>
                                            <tbody>
                                                @foreach ($animal as $anim)
                                                    <tr>
                                                        <td>{{ $anim->animal_name }}</td>
                                                        <td>

                                                            {{-- <button type="button"
                                                                class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                                data-toggle="modal"
                                                                data-target="#editAnimal{{ $loop->index }}"> Edit</button> --}}
                                                            <a href="{{ route('site.delete') }}" class="btn btn-danger"
                                                                id="delete">Delete</a>

                                                            {{-- Start of Partner Animal modal --}}

                                                            <!-- Modal -->
                                                            <div class="modal" tabindex="-1" role="dialog"
                                                                id="editAnimal{{ $loop->index }}">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="alert alert-danger"
                                                                            style="display:none"></div>
                                                                        <div class="modal-header">

                                                                            <h5 class="modal-title">Update Partner Animal
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <meta name="csrf-token"
                                                                            content="{{ csrf_token() }}" />
                                                                        <form id="form_editAnimal{{ $loop->index }}">
                                                                            @csrf
                                                                            <table
                                                                                class="table mb-0 table-sm table-condensed text-xs">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="col-lg-12 p-2">

                                                                                            </div>

                                                                                            <input type="text"
                                                                                                name="id"
                                                                                                class="form-control form-control-sm"
                                                                                                value="{{ $anim->id }}"
                                                                                                hidden>

                                                                                            <input type="text"
                                                                                                name="partner_id"
                                                                                                class="form-control form-control-sm"
                                                                                                value="{{ $user->partner_id }}"
                                                                                                hidden>

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="bg-light">
                                                                                            <div class="col-lg-12 p-2">
                                                                                                <label>Select Animal</label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="row m-b-15">
                                                                                                <div class="col-md-12">

                                                                                                    <select
                                                                                                        class="form-control select animal" name="animal_id" data-size="10" data-style="btn-white">
                                                                                                        <option value="" readonly>Select Animal</option>
                                                                                                        @foreach ($ps_animal as $animal)
                                                                                                            <option value="{{$animal->animal_id}}">{{$animal->animal_name}}</option>
                                                                                                        @endforeach
                                                                                                    </select>


                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                </tbody>
                                                                            </table>
                                                                            <!-- MODAL FOOTER - START -->
                                                                            <div class="modal-footer">
                                                                                <div class="form-group">
                                                                                    {{-- <button type="submit"
                                                                                    class="btn btn-sm btn-primary"
                                                                                    onclick="editAnimal('#form_editAnimal{{ $loop->index }}')"
                                                                                    name="save">
                                                                                    <span
                                                                                        class="fas fa-fw fa-sm fa-plus mr-1"></span>
                                                                                    Add
                                                                                </button> --}}
                                                                                <button type="submit"
                                                                                    class="btn btn-sm btn-secondary"
                                                                                    data-dismiss="modal">
                                                                                    <span
                                                                                        class="fas fa-fw fa-sm fa-times mr-1"></span>
                                                                                    Close
                                                                                </button>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </form>

                                                            {{-- end of modal --}}


                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-8">
                                <div class="panel panel-inverse">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">PARTNER HARVEST</h4>

                                        <a href="" id="editCompany" data-toggle="modal"
                                            data-target='#partnersite_harvest'>Add Harvest</a>
                                    </div>
                                    <div class="panel-body">
                                        <span class="error_earnings"></span>
                                        <table id="harvest-datatable"
                                            class="datatable table table-striped table-bordered table-hover text-center"
                                            style="width:100%;">
                                            <thead class="table-header">
                                                <tr>
                                                    <th>Crop</th>
                                                    <th>Harvest From</th>
                                                    <th>Harvest To</th>
                                                    <th>Volume harvest from</th>
                                                    <th>Volume harvest to</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                    {{-- <th>No. of Payment</th> --}}
                                                    {{-- <th>Action</th> --}}
                                            </thead>
                                            <tbody>
                                                @foreach ($harvest as $harv)
                                                    <tr>

                                                        <td>{{ $harv->crop }}</td>
                                                        <td>{{ $harv->harvest_from }}</td>
                                                        <td>{{ $harv->harvest_to }}</td>
                                                        <td>{{ $harv->volume_harvest_from }}</td>
                                                        <td>{{ $harv->volume_harvest_to }}</td>
                                                        <td>{{ $harv->status }}
                                                        </td>
                                                        <td>

                                                            <button type="button"
                                                            class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target="#editHarvest{{ $loop->index }}"> Edit</button>
                                                             <a href="{{ route('site.delete') }}" class="btn btn-danger"
                                                            id="delete">Delete</a>

  {{-- Start of Partner harvest modal --}}

      <!-- Modal -->
      <div class="modal" tabindex="-1" role="dialog" id="editHarvest{{ $loop->index }}">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="alert alert-danger" style="display:none"></div>
                  <div class="modal-header">

                      <h5 class="modal-title">Update Partner Harvest</h5>
                      <button type="button" class="close" data-dismiss="modal"
                          aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <form id="form_editHarvest{{$loop->index}}">
                        @csrf
                  <table class="table mb-0 table-sm table-condensed text-xs">
                      <tbody>
                          <tr>
                              <td>
                                  <div class="col-lg-12 p-2">

                                  </div>
                                  <input type="text" name="partner_id"
                                      class="form-control form-control-sm"
                                      value="{{ $user->partner_id }}" hidden>
                                      <input type="text" name="harvest_id"
                                      class="form-control form-control-sm"
                                      value="{{ $harv->harvest_id}}" hidden>

                              </td>
                          </tr>
                          <tr>
                              <td class="bg-light">
                                  <div class="col-lg-12 p-2">
                                      <label>Partner Name</label>
                                  </div>
                              </td>
                              <td>
                                  <div class="col-lg-12 p-2">
                                      {{ $user->partner_name }}
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td class="bg-light">
                                  <div class="col-lg-12 p-2">
                                      <label>Select Crop</label>
                                  </div>
                              </td>
                              <td>
                                  <div class="row m-b-15">
                                      <div class="col-md-12">

                                          <select class="form-control select crop" name="crop_id" id="crop_id{{ $loop->index }}" data-size="10" data-style="btn-white">
                                              <option value="" selected disabled>--Select Crop---</option>
                                              @foreach ($ps_crop as $crop)
                                                  <option value="{{ $crop->crop_id }}">{{ $crop->crop_english }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                              </td>
                          </tr>

                          <tr>
                              <td class="bg-light">
                                  <div class="col-lg-12 p-2">
                                      <label>Harvest From</label>
                                  </div>
                              </td>
                              <td>
                                  <div class="col-lg-12 p-2">
                                      <input type="date" class="form-control form-control-sm"
                                          name="harvest_from"  id="harvest_from{{ $loop->index }}" value="{{ $harv->harvest_from }}">
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td class="bg-light">
                                  <div class="col-lg-12 p-2">
                                      <label>Harvest to</label>
                                  </div>
                              </td>
                              <td>
                                  <div class="col-lg-12 p-2">
                                      <input type="date" class="form-control form-control-sm" name="harvest_to"  id="harvest_to{{ $loop->index }}" value="{{ $harv->harvest_to }}">
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td class="bg-light">
                                  <div class="col-lg-12 p-2">
                                      <label>Volume Harvest From</label>
                                  </div>
                              </td>
                              <td>
                                  <div class="col-lg-12 p-2">
                                      <input type="number" class="form-control form-control-sm" name="volume_harvest_from"  id="volume_harvest_from{{ $loop->index }}" value="{{ $harv->volume_harvest_from }}" placeholder="per kilo">
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td class="bg-light">
                                  <div class="col-lg-12 p-2">
                                      <label>Volume Harvest to</label>
                                  </div>
                              </td>
                              <td>
                                  <div class="col-lg-12 p-2">
                                      <input type="number" class="form-control form-control-sm"
                                          name="volume_harvest_to" id="volume_harvest_to{{ $loop->index }}" value="{{ $harv->volume_harvest_to }}"
                                          placeholder="per kilo">
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td class="bg-light">
                                  <div class="col-lg-12 p-2">
                                      <label>Status</label>
                                  </div>
                              </td>
                              <td>
                                  <div class="col-lg-12 p-2">
                                      <select class="form-control select status" name="status" id="status{{ $loop->index }}" data-size="10" data-style="btn-white">
                                          <option value="" selected disabled>--Select Status ---</option>
                                          <option value="0">Not Sold </option>
                                          <option value="1">Sold </option>
                                      </select>

                                  </div>
                              </td>
                          </tr>

                      </tbody>
                  </table>
                  <!-- MODAL FOOTER - START -->
                  <div class="modal-footer">
                      <div class="form-group">
                        <button type="submit"
                        class="btn btn-sm btn-primary"
                        onclick="editHarvest('#form_editHarvest{{ $loop->index }}')"
                        name="save">
                        <span
                            class="fas fa-fw fa-sm fa-plus mr-1"></span>
                        Add
                    </button>
                          <button type="submit" class="btn btn-sm btn-secondary"
                              data-dismiss="modal">
                              <span class="fas fa-fw fa-sm fa-times mr-1"></span>
                              Close
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </form>

  {{-- end of modal --}}



                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            {{-- ----------------------------------------MODAL------------------------------------------------------------------------------------------------------------------------------ --}}
                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            <form id="addSite">
                                @csrf
                                <!-- Modal -->
                                <div class="modal" tabindex="-1" role="dialog" id="partnersite_modal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="alert alert-danger" style="display:none"></div>
                                            <div class="modal-header">

                                                <h5 class="modal-title">Add Partner Site</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <table class="table mb-0 table-sm table-condensed text-xs">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="col-lg-12 p-2">

                                                            </div>
                                                            <input type="text" name="partner_id"
                                                                class="form-control form-control-sm"
                                                                value="{{ $user->partner_id }}" hidden>

                                                        </td>
                                                    </tr>
                                                    <tr>

                                                    </tr>

                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Partner Name</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                {{ $user->partner_name }}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Site Name</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    name="site_name" value="">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Land Area</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <input type="number" class="form-control form-control-sm"
                                                                    name="land_area" value="">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Number of Manpower</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <input type="number" class="form-control form-control-sm"
                                                                    name="no_of_manpower" value="">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Number of year</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <input type="number" class="form-control form-control-sm"
                                                                    name="no_of_year" value="">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label> Site own:</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <select class="custom-select custom-select-sm"
                                                                    id="site_own" name="site_own">
                                                                    <option selected value="" disabled>---Please Select---- </option>
                                                                    <option value="Rented" class="">Rented</option>
                                                                    <option value="Owned" class="">Owned</option>
                                                                    <option value="Contracted" class="">Contracted
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Number of year</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    name="no_of_year" value="">
                                                            </div>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Region</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="geo_code">
                                                            <div class="row m-b-15">
                                                                <div class="col-md-12">
                                                                    <select class="form-control selectregion"
                                                                        name="reg_code" data-size="10" id="region"
                                                                        data-style="btn-white">
                                                                        <option value="" selected>Select Region
                                                                        </option>
                                                                        @foreach ($get_regions as $reg)
                                                                            <option value="{{ $reg->reg_code }}">
                                                                                {{ $reg->reg_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Province</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="row m-b-15">
                                                                <div class="col-md-12">
                                                                    <select class="form-control selectprovince"
                                                                        name="prov_code" id="province" data-size="10"
                                                                        data-style="btn-white" disabled>
                                                                        <option value="" selected disabled>Select
                                                                            Province</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Municipality</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <select class="form-control selectmunicipality"
                                                                    name="mun_code" id="municipality" data-size="10"
                                                                    data-style="btn-white" disabled>
                                                                    <option value="" selected disabled>Select
                                                                        Municipality</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Barangay</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <select class="form-control selectbarangay"
                                                                    name="bgy_code" id="barangay" data-size="10"
                                                                    data-style="btn-white" disabled>
                                                                    <option value="" selected disabled>Select
                                                                        Barangay
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Site Address</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <input type="site_address"
                                                                    class="form-control form-control-sm"
                                                                    name="site_address" value="">
                                                            </div>
                                                        </td>
                                                    </tr>




                                                </tbody>
                                            </table>


                                            <!-- MODAL FOOTER - START -->
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-primary" name="save">
                                                        <span class="fas fa-fw fa-sm fa-plus mr-1"></span>
                                                        Add
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-secondary"
                                                        data-dismiss="modal">
                                                        <span class="fas fa-fw fa-sm fa-times mr-1"></span>
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- end of Partner Site modal --}}




                            {{-- --------------------------Start of Partner Tech modal ----------------------------------- --}}

                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            <form id="addTech">
                                @csrf
                                <!-- Modal -->
                                <div class="modal" tabindex="-1" role="dialog" id="partnersite_technology">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="alert alert-danger" style="display:none"></div>
                                            <div class="modal-header">

                                                <h5 class="modal-title">Add Partner Technology</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <table class="table mb-0 table-sm table-condensed text-xs">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="col-lg-12 p-2">

                                                            </div>
                                                            <input type="text" name="partner_id"
                                                                class="form-control form-control-sm"
                                                                value="{{ $user->partner_id }}" hidden>

                                                        </td>
                                                    </tr>
                                                    <tr>

                                                    </tr>

                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Partner Technology</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="row m-b-15">
                                                                <div class="col-md-12">

                                                                    <select class="form-control select technology"
                                                                        name="tech_id" data-size="10" id="technology"
                                                                        data-style="btn-white">
                                                                        <option value="" selected>--Select Technology---</option>
                                                                        @foreach ($ps_tech as $org)
                                                                            <option value="{{ $org->tech_id }}">
                                                                                {{ $org->tech_desc }}</option>
                                                                        @endforeach
                                                                    </select>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <!-- MODAL FOOTER - START -->
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-primary" name="save">
                                                        <span class="fas fa-fw fa-sm fa-plus mr-1"></span>
                                                        Add
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-secondary"
                                                        data-dismiss="modal">
                                                        <span class="fas fa-fw fa-sm fa-times mr-1"></span>
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>



                            {{-- ---------------end of modal ---------------------------------------------------------------------- --}}

                            {{-- Start of Partner training modal --}}
                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            <form id="addTraining">
                                @csrf
                                <!-- Modal -->
                                <div class="modal" tabindex="-1" role="dialog" id="partnersite_training">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="alert alert-danger" style="display:none"></div>
                                            <div class="modal-header">

                                                <h5 class="modal-title">Add Partner Training</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <table class="table mb-0 table-sm table-condensed text-xs">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="col-lg-12 p-2">

                                                            </div>
                                                            <input type="text" name="partner_id"
                                                                class="form-control form-control-sm"
                                                                value="{{ $user->partner_id }}" hidden>

                                                        </td>
                                                    </tr>
                                                    <tr>

                                                    </tr>

                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Partner Training</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    name="training_desc" value="">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <!-- MODAL FOOTER - START -->
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-primary" name="save">
                                                        <span class="fas fa-fw fa-sm fa-plus mr-1"></span>
                                                        Add
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-secondary"
                                                        data-dismiss="modal">
                                                        <span class="fas fa-fw fa-sm fa-times mr-1"></span>
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- end of modal --}}


                            {{-- Start of Partner Organization modal --}}

                                <!-- Modal -->
                                <div class="modal" tabindex="-1" role="dialog" id="partnersite_organization">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="alert alert-danger" style="display:none"></div>
                                            <div class="modal-header">

                                                <h5 class="modal-title">Add Partner Organization</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                                            <form id="addOrganization">
                                                @csrf
                                            <table class="table mb-0 table-sm table-condensed text-xs">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="col-lg-12 p-2">

                                                            </div>
                                                            <input type="text" name="partner_id"
                                                                class="form-control form-control-sm"
                                                                value="{{ $user->partner_id }}" hidden>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Select Organization</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="row m-b-15">
                                                                <div class="col-md-12">
                                                                    <select class="form-control select org" name="org_id" data-size="10"
                                                                    data-style="btn-white">
                                                                    <option value="" selected>Select Organization</option>
                                                                    @foreach ($ps_org as $org)
                                                                    <option value="{{$org->org_id}}">{{$org->org_name}}</option>
                                                                @endforeach
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <!-- MODAL FOOTER - START -->
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-primary" name="save">
                                                        <span class="fas fa-fw fa-sm fa-plus mr-1"></span>
                                                        Add
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-secondary"
                                                        data-dismiss="modal">
                                                        <span class="fas fa-fw fa-sm fa-times mr-1"></span>
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>


                            {{-- end of modal --}}




                            {{-- Start of Partner Animal modal --}}
                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            <form id="addAnimal">
                                @csrf
                                <!-- Modal -->
                                <div class="modal" tabindex="-1" role="dialog" id="partnersite_animal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="alert alert-danger" style="display:none"></div>
                                            <div class="modal-header">

                                                <h5 class="modal-title">Add Partner Animal</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <table class="table mb-0 table-sm table-condensed text-xs">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="col-lg-12 p-2">

                                                            </div>
                                                            <input type="text" name="partner_id"
                                                                class="form-control form-control-sm"
                                                                value="{{ $user->partner_id }}" hidden>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Select Animal</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="row m-b-15">
                                                                <div class="col-md-12">
                                                                    <select class="form-control" id="animal" name="animal_id" data-size="10" data-style="btn-white">
                                                                    <option value="" selected>Select Animal</option>
                                                                    @foreach ($ps_animal as $animal)
                                                                    <option value="{{$animal->animal_id}}">{{$animal->animal_name}}</option>
                                                                   @endforeach
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <!-- MODAL FOOTER - START -->
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-primary" name="save">
                                                        <span class="fas fa-fw fa-sm fa-plus mr-1"></span>
                                                        Add
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-secondary"
                                                        data-dismiss="modal">
                                                        <span class="fas fa-fw fa-sm fa-times mr-1"></span>
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- end of modal --}}

                            {{-- Start of Partner harvest modal --}}
                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            <form id="addHarvest">
                                @csrf
                                <!-- Modal -->
                                <div class="modal" tabindex="-1" role="dialog" id="partnersite_harvest">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="alert alert-danger" style="display:none"></div>
                                            <div class="modal-header">

                                                <h5 class="modal-title">Add Partner Harvest</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <table class="table mb-0 table-sm table-condensed text-xs">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="col-lg-12 p-2">

                                                            </div>
                                                            <input type="text" name="partner_id"
                                                                class="form-control form-control-sm"
                                                                value="{{ $user->partner_id }}" hidden>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Partner Name</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                {{ $user->partner_name }}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Select Crop</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="row m-b-15">
                                                                <div class="col-md-12">

                                                                    <select class="form-control " name="crop_id"
                                                                        data-size="10" id="crop"
                                                                        data-style="btn-white">
                                                                        <option value="" selected disabled>--Select Crop---</option>
                                                                        @foreach ($ps_crop as $crop)
                                                                            <option value="{{ $crop->crop_id }}">
                                                                                {{ $crop->crop_english }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Harvest From</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <input type="date" class="form-control form-control-sm"
                                                                    name="harvest_from" value="">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Harvest to</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <input type="date" class="form-control form-control-sm"
                                                                    name="harvest_to" value="">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Volume Harvest From</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <input type="number" class="form-control form-control-sm"
                                                                    name="volume_harvest_from" value=""
                                                                    placeholder="per kilo">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Volume Harvest to</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <input type="number" class="form-control form-control-sm"
                                                                    name="volume_harvest_to" value=""
                                                                    placeholder="per kilo">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-light">
                                                            <div class="col-lg-12 p-2">
                                                                <label>Status</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-lg-12 p-2">
                                                                <select class="form-control select " name="status" data-size="10" data-style="btn-white">
                                                                    <option value="" selected disabled>--Select Status ---</option>
                                                                    <option value="0">Not Sold </option>
                                                                    <option value="1">Sold </option>
                                                                </select>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <!-- MODAL FOOTER - START -->
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-primary" name="save">
                                                        <span class="fas fa-fw fa-sm fa-plus mr-1"></span>
                                                        Add
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-secondary"
                                                        data-dismiss="modal">
                                                        <span class="fas fa-fw fa-sm fa-times mr-1"></span>
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- end of modal --}}

                            {{-- Edit Site --}}

                            </body>


                        </div>



                    </div>
                </div>
            </div>
        </div>




    @endsection
