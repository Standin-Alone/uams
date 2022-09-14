@extends('global.base')
@section('title', "List of Site")

{{--  import in this section your css files--}}
@section('page-css')
    {{-- Include Libraries CSS --}}
    @include('components.libraries.css-components')
@endsection

{{--  import in this section your javascript files  --}}
@section('page-js')    
    {{-- Include Libraries JS --}}
    @include('components.libraries.js-components')

    {{-- Include Script Components --}}
    @include('ReportSite::components.script.js')
@endsection

@section('content')

<div class="row">
    <!-- PROGRAM DROPDOWN SELECTION -->
    <div class="col-md-6">
        <div class="input-group">
            <h1 class="page-header">List of Crops Harvested</h1>                                  
        </div>
    </div>
</div>


<div class="panel bg-gradient">
    <div class="panel-heading">
        <div class="panel-heading-btn">
        </div>
        <div class="row">
            @include('ReportSite::components.filter_cards')
        </div>
    </div>
    <div class="panel-body" style="background-color: #fff;">
        <table id="list-datatable" class="table table-striped display nowrap" style="width: 100%;">
            <thead></thead>
        </table>        
    </div>
</div>
@endsection