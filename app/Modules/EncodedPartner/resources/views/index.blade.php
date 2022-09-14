@extends('global.base')
@section('title', "Admin | List of Partner")

{{--  import in this section your css files--}}
@section('page-css')
    {{-- Include Libraries CSS --}}    
    @include('components.libraries.css-components')
    {{-- @include('EncodedPartner::components.css.style') --}}
@endsection

{{--  import in this section your javascript files  --}}
@section('page-js')    
    {{-- Include Libraries JS --}}
    @include('components.libraries.js-components')

    {{-- Include Script Components --}}
    @include('EncodedPartner::components.script.js')
@endsection

@section('content')

<div class="row">
    <!-- PROGRAM DROPDOWN SELECTION -->
    <div class="col-md-6">
        <div class="input-group">
            <h1 class="page-header">Admin | List of Partner</h1>                                  
        </div>
    </div>
</div>


<div class="panel bg-gradient">
    <div class="panel-heading">
        <div class="panel-heading-btn">
        </div>
        
        <br>
        <div class="row">
            @include('EncodedPartner::components.filter_cards')
        </div>
    </div> 
    <div class="panel-body" style="background-color: #fff;">
        <table id="list-datatable" class="table table-striped display nowrap" style="width: 100%;">
            <thead></thead>
        </table>        
    </div>

          <!-- #modal-update -->
          <div class="modal fade" id="UpdateModal">
            <div class="modal-dialog" style="max-width: 40%">
                <form id="UpdateForm" method="POST" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#ffc107;">
                            <h4 class="modal-title" style="color: white">VERIFY PARTNER SITE</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                        </div>
                        <div class="modal-body">

                            <input type="text" name="animal_id" class="hide"/>

                            {{--modal body start--}}                           

                            <div class="col-md-12">
                                
                                <div class="panel-body" style="background-color: #fff;">
                                    <table id="site-list-datatable" class="table table-striped display nowrap" style="width: 100%;">
                                        <thead></thead>
                                    </table>        
                                </div>

                                {{-- <div class="form-group">
                                    <label>Animal Name </label> <span style="color:red">*</span>
                                    <input style="text-transform: capitalize;"  name="animal_name" id="animal_name" class="form-control"  placeholder="Please enter animal name here..."  >                                    
                                </div>&nbsp;                             --}}
                            </div>
                            
                            
                            {{--modal body end--}}
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>


</div>
@endsection