<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Intervention Management Platform</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/img/logo/DA-Logo.png" sizes="196x196" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ url('assets/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/css/default/style.min.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/css/default/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/css/default/theme/default.css')}}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{ url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/ionRangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/password-indicator/css/password-indicator.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/jquery-tag-it/css/jquery.tagit.css')}}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css')}}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css')}}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css')}}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css')}}" rel="stylesheet" />

	<!-- ================== END PAGE LEVEL STYLE ================== -->
	<link href="assets/pgv/backend-style.css" rel="stylesheet">
    <style>
        .prov_val{
            font-size: 12px; font-family: 'Open Sans',"Helvetica Neue",Helvetica,Arial,sans-serif;
        }
		label[class=error]{
			color: #ff5b57 !important;
		}
		.error{
			text-align: left !important;
		}

    </style>
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->



</head>
<body class="pace-top bg-white">
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<div id="page-container" class="fade">
        <div class="register register-with-news-feed overflow-auto">
            <div class="news-feed">
                <div class="news-image" style="background-image: url({{ url('assets/img/images/IMP.jpg') }})"></div>
                <div class="news-caption">
                </div>
            </div>
            <div class="right-content">
                <h1 class="register-header">
                    <img src="{{url('assets/img/images/DA-LOGO-1024x1024.png')}}" alt="DA-Logo" style="height:70px; width:70px;"> Partners Profile
                    <small>Monitoring Form</small>
                </h1>
                <div class="register-content">
                <form id="CreateAccountForm">
                        @csrf
                        <div class="row row-space-10">
                            <input type="text" name="user_id" class="hide" value=""/>
                            <div class="col-md-12 m-b-15">
                                <label class="control-label">Name of Partner <span class="text-danger">*</span></label>
                                <input type="text" name="partner_name" class="form-control txtfname" placeholder="Enter Partners Name"  onKeyUP="this.value = this.value.toUpperCase();"/>
                            </div>
                        </div>
                        <div class="row row-space-10">
                            <input type="text" name="user_id" class="hide" value=""/>
                            <div class="col-md-12 m-b-15">
                                <label class="control-label">Complete Address(mention nearest landmark, if applicable): <span class="text-danger">*</span></label>
                                <input type="text" name="partner_address" class="form-control txtfname" placeholder="No. Street/Barangay/City"   onKeyUP="this.value = this.value.toUpperCase();"/>
                            </div>
                        </div>

                    <tbody>
                        <label class="control-label"> Type of Organization: <span class="text-danger">*</span></label>
                        <tr>
                            @foreach($organization as $reg)
                            <td class="form-row p-2">

                              <Input type="hidden" value="{{{$reg->org_id}}}" name="list[][id]"></br>
                              <Input type="checkbox" class="mr-2" value="true" name="list[][value]">
                            </td>
                            <td>
                                {{$reg->org_name}}
                            </td>
                          </tr>
                          @endforeach
                    </tbody>
                        <div class="row row-space-10">
                            <div class="col-md-12 m-b-15">
                                <label class="control-label">Total Land Area of Location (sqm) <span class="text-danger">*</span></label>
                                <input type="text" name="partner_area" class="form-control" placeholder=" Land Area"  onKeyUP="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>
                        <div class="row row-space-10">
                            <input type="text" name="user_id" class="hide" value=""/>
                            <div class="col-md-12 m-b-15">
                                <label class="control-label">No. of Manpower maintaing the garden: <span class="text-danger">*</span></label>
                                <input type="text" name="partner_manpower" class="form-control txtfname" placeholder=""  onKeyUP="this.value = this.value.toUpperCase();"/>
                            </div>
                        </div>
                        <div class="row row-space-10">
                            <input type="text" name="user_id" class="hide" value=""/>
                            <div class="col-md-12 m-b-15">
                                <label class="control-label">Years farm at the location: <span class="text-danger">*</span></label>
                                <input type="text" name="partner_years" class="form-control txtfname" placeholder=""  onKeyUP="this.value = this.value.toUpperCase();"/>
                            </div>
                        </div>
                        <div class="row row-space-10">
                            <div class="col-md-6 m-b-15">
                                <label class="control-label">Contact Person </label>
                                <input type="text" c class="form-control" placeholder=""  onKeyUP="this.value = this.value.toUpperCase();" />
                            </div>
                            <div class="col-md-6 m-b-15">
                                <label class="control-label">Contact Number</label>
                                <input type="text" name="contact_number" class="form-control" placeholder=""  onKeyUP="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>


                        <tbody>
                            <label class="control-label"> UA Technology Presents: <span class="text-danger">*</span></label>
                            <tr>
                                @foreach($technology as $tech)
                                <td class="form-row p-2">

                                  <Input type="hidden" value="{{{$tech->tech_id}}}" name="list[][id]"></br>
                                  <Input type="checkbox" class="mr-2" value="true" name="list[][value]">
                                </td>
                                <td>
                                    {{$tech->tech_desc}}
                                </td>
                              </tr>
                              @endforeach
                        </tbody>

                    </br>

                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <label class="control-label"> Do your sell your harvest?</label>
                                <input type="checkbox" name="agree" id="agree">
                                <label for="agree">Yes</label>
                                <input type="checkbox" name="agree" id="agree">
                                <label for="agree">No</label>
                            </div>
                        </div>
                        <div class="row row-space-10">
                            <input type="text" name="user_id" class="hide" value=""/>
                            <div class="col-md-12 m-b-15">
                                <label class="control-label">If yes, indicate the weight(kgs) of the total harvest sold per crop <span class="text-danger">*</span></label></br>
                                <input type="text" name="" class="form-control txtfname" placeholder=""  onKeyUP="this.value = this.value.toUpperCase();"/>
                            </div>
                        </div>

                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <label class="control-label"> Are the growers/farmers trained?</label>
                                <input type="checkbox" name="agree" id="agree">
                                <label for="agree">Yes</label>
                                <input type="checkbox" name="agree" id="agree">
                                <label for="agree">No</label>
                            </div>
                        </div>

                        <div class="row row-space-10">
                            <input type="text" name="user_id" class="hide" value=""/>
                            <div class="col-md-12 m-b-15">
                                <label class="control-label">If yes, What are the trainings attended?<span class="text-danger">*</span></label>
                                <input type="text" name="" class="form-control txtfname" placeholder=""  onKeyUP="this.value = this.value.toUpperCase();"/>
                            </div>
                        </div>

                        <tbody>
                            <label class="control-label"> Live Animals Presents: <span class="text-danger">*</span></label>
                            <tr>
                                @foreach($animal as $ani)
                                <td class="form-row p-2">

                                  <Input type="hidden" value="{{{$ani->animal_id}}}" name="list[][id]"></br>
                                  <Input type="checkbox" class="mr-2" value="true" name="list[][value]">
                                </td>
                                <td>
                                    {{$ani->animal_name}}
                                </td>
                              </tr>
                              @endforeach
                        </tbody>
                    </br>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <label class="control-label">Did you apply fertilizers?</label></br>
                                <input type="checkbox" name="agree" id="agree">
                                <label for="agree">If Yes</label></br>
                                <input type="text" name="partner_name" class="form-control txtfname" placeholder="Please specify"  onKeyUP="this.value = this.value.toUpperCase();"/></br>
                                <input type="checkbox" name="agree" id="agree">
                                <label for="agree">No</label>
                            </div>
                        </div>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <label class="control-label">Did you apply pesticides?</label></br>
                                <input type="checkbox" name="agree" id="agree">
                                <label for="agree">If Yes</label></br>
                                <input type="text" name="partner_name" class="form-control txtfname" placeholder="Please specify"  onKeyUP="this.value = this.value.toUpperCase();"/></br>
                                <input type="checkbox" name="agree" id="agree">
                                <label for="agree">No</label>
                            </div>
                        </div>

                        <div class="row row-space-10">
                            <input type="text" name="user_id" class="hide" value=""/>
                            <div class="col-md-12 m-b-15">
                                <label class="control-label">No. of Beneficiaries <span class="text-danger">*</span></label></br>
                                <input type="text" name="partner_benificiaries" class="form-control txtfname" placeholder=""  onKeyUP="this.value = this.value.toUpperCase();"/>
                            </div>
                        </div>


                        <div class="register-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg create-account-btn"  onclick="return confirm('Are you sure you want to delete this item?');><i class="fas fa-spinner fa-spin btnloadingIcon1 pull-left m-r-10" style="display: none;"></i> Save</button>
                        </div>
                        <hr />
                        <p class="text-center">
                            &copy; Department of Agriculture ICTS 2022
                        </p>
                    </form>
                </div>
            </div>
        </div>
	</div>


    <!-- ================== BEGIN BASE JS ================== -->
    <!-- <script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<script src="{{ url('assets/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
	<script src="{{ url('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{ url('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{{ url('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{ url('assets/plugins/js-cookie/js.cookie.js')}}"></script>
	<script src="{{ url('assets/js/theme/default.min.js')}}"></script>
	<script src="{{ url('assets/js/apps.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{ url('assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js')}}"></script>
	<script src="{{ url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{ url('assets/plugins/masked-input/masked-input.min.js')}}"></script>
	<script src="{{ url('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
	<script src="{{ url('assets/plugins/password-indicator/js/password-indicator.js')}}"></script>
	<script src="{{ url('assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js')}}"></script>
	<script src="{{ url('assets/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
	<script src="{{ url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
	<script src="{{ url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js')}}"></script>
	<script src="{{ url('assets/plugins/jquery-tag-it/js/tag-it.min.js')}}"></script>
    <script src="{{ url('assets/plugins/bootstrap-daterangepicker/moment.js')}}"></script>
    <script src="{{ url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ url('assets/plugins/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{ url('assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{ url('assets/plugins/bootstrap-show-password/bootstrap-show-password.js')}}"></script>
    <script src="{{ url('assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js')}}"></script>
    <script src="{{ url('assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js')}}"></script>
    <script src="{{ url('assets/plugins/clipboard/clipboard.min.js')}}"></script>
	<script src="{{ url('assets/js/demo/form-plugins.demo.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {

            App.init();

             // filter province
        $("#region").change(function(){
            let value = $("option:selected", this).val();

            $.ajax({
                url:'{{route("ac-filter-province",["region_code" => ":id"])}}'.replace(':id',value),
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

        if(check_agency === 'CO'){
            $.ajax({
                url:'{{route("ac-filter-role",["agency_loc" => ":id"])}}'.replace(':id',check_agency),
                type:'get',
                success:function(data){
                    let convertToJson = JSON.parse(data);
                    $("#role").prop('disabled',false);
                    $("#role option").remove();
                    $("#role").append('<option value="" selected disabled>Select Role</option>')
                    convertToJson.map(item => {
                        $("#role").append('<option value="'+item.role_id+'">'+item.role+'</option>')
                    })
                }
            });

            $("#region").val(13).change();
            $("#region option").filter(function(){
                return this.value != 13;
            }).hide()
        }




        // filter municipality
        $("#province").change(function(){
            let value = $("option:selected", this).val();
            let region = $("#region").val();
            $.ajax({
                url:'{{route("ac-filter-municipality",["province_code" => ":id","region_code" => ":region_code"])}}'.replace(':id',value).replace(':region_code',region),
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
            console.warn(value)
            $.ajax({
                url:'{{route("ac-filter-barangay",["region_code" => ":id_region_code","province_code" => ":id_province_code","municipality_code" => ":id"])}}'.replace(':id_region_code',region).replace(':id_province_code',province).replace(':id',value),
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





        // Create Account Form
        $("#CreateAccountForm").validate({
                rules:{
                    partner_name:'required',
                    partner_area:'required',
                    email:{required:true,
                            email:true,
                            remote:{
                                url:"{{route('check-email')}}",
                                type:'get'
                            }
                        },
                    contact:{
                        required: true,
                        number : true,
                        minlength : 11,
                        maxlength : 11
                    },

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
                    password:{
                        required: true,
                        minlength : 8
                    },
                    re_enter_password:{
                        required: true,
                        minlength : 8,
                        equalTo : "input[name=password]"
                    }
                },
                messages:{
                    partner_name        :{required:'<div class="text-danger">Please enter your name.</div>'},
                    partner_address         :{required:'<div class="text-danger">Please enter your address.</div>'},
                    partner_area             :{
                                        required:'<div class="text-danger">Please enter your area.</div>'},
                    partner_manpower        :{required:'<div class="text-danger">Please enter your total No. of Manpower maintaining the garden:.</div>'},
                    partner_years        :{required:'<div class="text-danger">Please enter Years farm at the location: .</div>'},
                    contact_number           :{
                                        required:'<div class="text-danger">Please enter your phone number.</div>',
                                        number: '<div class="text-danger">Invalid format.</div>'
                                       },

                },
                submitHandler:function(){

                    Swal.fire({
                        title: 'Do you want to save this profile?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Create profile'
                        }).then((result) => {

                        id = $('input[name="id"]').val();
                        $(".create-account-btn").prop('disabled',true);

                        // check if confirm
                        if (result.isConfirmed) {
                            $(".create-account-btn").html('<i class="fas fa-circle-notch fa-spin"></i> Creating...');
                            $.ajax({
                                url:"{{route('create-account')}}",
                                type:'post',
                                data:$("#CreateAccountForm").serialize(),
                                success:function(response){
                                    parses_result = JSON.parse(response);
                                    console.warn(response);


                                    if(parses_result['result'] == 'success'){
                                        Swal.fire(
                                            'Message',
                                            parses_result['message'],
                                            parses_result['result']
                                        ).then(()=>{
                                            $(".create-account-btn").html('Create Account');
                                            $("#CreateAccountForm")[0].reset();
                                            window.location.href = "{{url('/login') }}";
                                        });

                                    }else{
                                        Swal.fire(
                                            'Message',
                                            parses_result['message'],
                                            parses_result['result']
                                        )
                                        $(".create-account-btn").html('Create Account');
                                        $(".create-account-btn").prop('disabled',false);
                                    }

                                },
                                error:function(response){
                                    $(".create-account-btn").html('Create Account');
                                    $(".create-account-btn").prop('disabled',false);
                                }
                            })

                        } else {
                            $(".create-account-btn").html('Create Account');
                            $(".create-account-btn").prop('disabled',false);
                        }
                    });
                }
            })




        })

    </script>
	<!-- ================== END PAGE LEVEL JS ================== -->

</body>
</html>
