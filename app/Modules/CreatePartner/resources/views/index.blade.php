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
                        <form id="CreateAccountForm" action="{{route('save.partner')}}">
                            @csrf
                            <div class="row row-space-10">
                                {{-- <input type="text" name="user_id" class="hide" value=""/> --}}
                                <div class="col-md-6 m-b-15">
                                    <label class="control-label">Partner Name<span class="text-danger">*</span></label>
                                    <input type="text" name="partner_name" id="partner_name"
                                        class="form-control txtfname" placeholder="Partner Name"
                                        onKeyUP="this.value.toUpperCase();" required/>
                                </div>

                                {{-- <input type="text" name="user_id" class="hide" value=""/> --}}
                                <div class="col-md-6 m-b-15">
                                    <label class="control-label">Street Name, Building, House No.(mention nearest landmark, if applicable):
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="site_address" class="form-control txtfname" placeholder="Street Name, Building, House No."
                                        onKeyUP="this.value.toUpperCase();" required/>
                                </div>
                            </div>

                            <label class="control-label">Region: <span class="text-danger">*</span></label>
                            <input type="hidden" class="geo_code">
                            <div class="row m-b-15">
                                <div class="col-md-12">
                                    <select class="form-control selectregion" name="region" data-size="10" id="region"
                                        data-style="btn-white">
                                        <option value="" selected>Select Region</option>
                                        @foreach ($get_regions as $reg)
                                            <option value="{{ $reg->reg_code }}" required>{{ $reg->reg_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="control-label">Province: <span class="text-danger">*</span></label>
                            <div class="row m-b-15">
                                <div class="col-md-12">
                                    <select class="form-control selectprovince" name="province" id="province"
                                        data-size="10" data-style="btn-white" disabled>
                                        <option value="" selected disabled>Select Province</option>
                                    </select>
                                </div>
                            </div>
                            <label class="control-label">Municipality: <span class="text-danger">*</span></label>

                            <div class="row m-b-15">
                                <div class="col-md-12">
                                    <select class="form-control selectmunicipality" name="municipality" id="municipality"
                                        data-size="10" data-style="btn-white" disabled>
                                        <option value="" selected disabled>Select Municipality</option>
                                    </select>
                                </div>
                            </div>
                            <label class="control-label">Barangay: <span class="text-danger">*</span></label>

                            <div class="row m-b-15">
                                <div class="col-md-12">
                                    <select class="form-control selectbarangay" name="barangay" id="barangay"
                                        data-size="10" data-style="btn-white" disabled>
                                        <option value="" selected disabled>Select Barangay</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row row-space-10">

                                <div class="col-md-6 m-b-15">
                                    <label class="control-label">Latitude <span class="text-danger">*</span></label>
                                    <input type="text" name="lat" class="form-control txtfname" placeholder="Latitude"
                                        onKeyUP="this.value = this.value.toUpperCase();" />
                                </div>
                                <div class="col-md-6 m-b-15">
                                    <label class="control-label">Longitude<span class="text-danger">*</span></label>
                                    <input type="text" name="site_address" class="form-control txtfname" placeholder="Longitude"
                                        onKeyUP="this.value = this.value.toUpperCase();" />
                                </div>
                            </div>



                            <div class="row row-space-10">
                                <div class="col-md-6 m-b-15">
                                    <label class="control-label">Contact Person </label>
                                    <input type="text" name="contact_person" class="form-control" placeholder="Contact Person"
                                        onKeyUP="this.value = this.value.toUpperCase();" required/>
                                </div>
                                <div class="col-md-6 m-b-15">
                                    <label class="control-label">Contact Number</label>
                                    <input type="text" name="contact_no" class="form-control" placeholder="Contact Number"
                                        onKeyUP="this.value = this.value.toUpperCase();" required/>
                                </div>
                            </div>



                            <div class="row m-b-15">
                                <div class="col-md-12 mt-2" x-data="{ isYes: true }">
                                    <label class="control-label"> Do your sell your harvest?</label>
                                    <input @click="isYes=true" type="radio" name="is_sell_harvest" value="0">
                                    <label for="agree">No</label>
                                    <input @click="isYes=false" type="radio" name="is_sell_harvest" value="1">
                                    <label for="agree">Yes</label>
                                    <input type="text" x-bind:disabled="isYes" name="indicate_the_weight"
                                        class="form-control indicate_the_weight"
                                        placeholder="If yes, indicate the weight(kgs) of the total harvest sold per crop "
                                        onKeyUP="this.value = this.value.toUpperCase();" /><br>
                                </div>
                            </div>


                            <div class="row m-b-15">
                                <div class="col-md-12">
                                    <label class="control-label"> Are the growers/farmers trained?</label>
                                    <input type="radio" name="is_farmer_trained" value="0">
                                    <label for="agree">No</label>
                                    <input type="radio" name="is_farmer_trained" value="1">
                                    <label for="agree">Yes</label>
                                </div>
                            </div>


                            <div class="row m-b-15">
                                <div class="col-md-12 mt-2" x-data="{ isYes: true }">
                                    <label class="control-label">Did you apply fertilizers?</label><br>                                    <input @click="isYes=true" type="radio" name="is_apply_fertilizer"  value="0">
                                    <label for="is_apply_fertilizer" value="0">No</label>
                                    <input @click="isYes=false" type="radio" name="is_apply_fertilizer"  value="1">
                                    <label for="is_apply_fertilizer">If Yes</label><br>
                                    <input type="text" x-bind:disabled="isYes" name="fertilizer_type" class="form-control txtfertilizer" placeholder="Please specify the fertilizer" onKeyUP="this.value = this.value.toUpperCase();" /></br>

                                </div>
                            </div>
                            <div class="row m-b-15">
                                <div class="col-md-12" x-data="{ isYes: true }">
                                    <label class="control-label">Did you apply pesticides?</label><br>                                    
                                    <input @click="isYes=true" type="radio" name="is_apply_fertilizer"  value="0">
                                    <label for="is_apply_fertilizer" value="0">No</label>
                                    <input @click="isYes=false" type="radio" name="is_apply_pesticide" value="1">
                                    <label for="is_apply_pesticide" name="is_apply_pesticide" value="1">If
                                        Yes</label><br>
                                    <input type="text" x-bind:disabled="isYes" name="pesticide"
                                        class="form-control pesticide" placeholder="Please specify"
                                        onKeyUP="this.value = this.value.toUpperCase();" /></br>
                                </div>
                            </div>

                            <div class="row row-space-10">
                                <div class="col-md-12 m-b-15">
                                    <label class="control-label">No. of Beneficiaries <span
                                            class="text-danger">*</span></label><br>
                                    <input type="number" name="no_of_beficiaries" class="form-control txtfname"
                                        placeholder="" onKeyUP="this.value = this.value.toUpperCase();" required/>
                                </div>
                            </div>
                            <hr />

                            <button type="submit" name="save" class="btn btn-success" onclick="return confirm('Are you sure you want to save this profile?')">Save</button>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    {{-- </div> --}}

@endsection
