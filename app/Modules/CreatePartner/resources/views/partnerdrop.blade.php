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
                {{-- <div class="news-feed">
                    <div class="news-image" style="background-image: url({{ url('assets/img/images/IMP.jpg') }})"></div>
                    <div class="news-caption">
                    </div>
                </div> --}}
                <div class="">
                    <h1 class="register-header">
                        Partners Profile
                        <small>Monitoring Form</small>
                    </h1>
                    <div class="register-content">
                        

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    {{-- </div> --}}

@endsection
