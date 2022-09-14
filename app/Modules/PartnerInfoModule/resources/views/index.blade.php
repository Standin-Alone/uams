@extends('global.base')
@section('title', "PARTNER INFO")

{{--  import in this section your css files--}}
@section('page-css')
    <link href="{{url('assets/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" />
    <link href="{{url('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />

    {{-- datatable row group--}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.3/css/rowGroup.dataTables.min.css"> --}}

    {{-- datatable buttons --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css"> --}}

    {{-- datatable responsive --}}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.css"> --}}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css"> --}}

    {{-- Include external CSS components --}}
    @include('PartnerInfoModule::components.css.css')
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
    {{-- <script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script> --}}
    {{-- <script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script> --}}

    {{-- datatable buttons --}}
    {{-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script> --}}

    {{-- datatable row group --}}
    {{-- <script src="https://cdn.datatables.net/rowgroup/1.1.3/js/dataTables.rowGroup.min.js"></script> --}}

    {{-- sweet alert 2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Include external JS components --}}
    @include('PartnerInfoModule::components.js.js')

    <script>
        $(document).ready(function(){
            var tbl_count = 1;

            $('#add_new_form_btn').on('click', function(){
                var original = $('#form_set_' + tbl_count);

                tbl_count += 1;

                $(original).clone().insertAfter(original).attr('id', 'form_set_' + tbl_count).find('label').each(function(id, obj){
                    console.log(obj);
                    $(obj).attr($(obj).attr('for').replace(/_[0-9]+$/, '_' + tbl_count));
                }).end()
                
                // .find('input').each(function(id, obj){
                //     $(obj).attr({ id: $(obj).attr('id').replace(/_[0-9]+$/, '_' + tbl_count), name: $(obj).attr('name').replace(/_[0-9]+$/, '_' + tbl_count) }).val('');
                // })
            })

            $("#remove_form_btn").click(function(){
                $("$form").remove();
            });
        });

        // $(function () {
        //     var tbl_cnt = 1;
        //     // 追加ボタンをクリックした時の処理
        //     $('#add_btn').click(function () {
        //         var original = $('#form_set_' + tbl_cnt);
        //         tbl_cnt += 1;

        //         $(original)
        //         .clone()
        //         .insertAfter(original)
        //         // クローンのid属性を変更。
        //         .attr('id', 'form_set_' + tbl_cnt)
        //         // label要素のfor属性を変更。
        //         .find('label').each(function (idx, obj) {
        //             $(obj).attr(
        //             'for',
        //             $(obj).attr('for').replace(/_[0-9]+$/, '_' + tbl_cnt)
        //             );
        //         })
        //         .end()

        //         // input要素のid,name属性を変更。value値を空白に。
        //         .find('input').each(function (idx, obj) {
        //             $(obj).attr({
        //             id: $(obj).attr('id').replace(/_[0-9]+$/, '_' + tbl_cnt),
        //             name: $(obj).attr('name').replace(/_[0-9]+$/, '_' + tbl_cnt)
        //             }).val('');
        //         });
        //     });
        // });
    </script>
@endsection


<script>

</script>


@section('content')
{{-- <input type="hidden" id="refno" value="1"> --}}
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">HOME</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">PARTNER INFO</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">PARTNER INFO</h1>
<!-- end page-header -->

{{-- <div class="row mt-5"> --}}

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">CREATE PARTNER</h4>
        </div>
        <div class="panel-body">

            <form class="form-serialize">
                <table id="form_set_1">
                  <tbody>
                    <tr>
                      <td><label for="name_1">NAME</label></td>
                      <td><input type="text" id="name_1" name="name[]"></td>
                    </tr>
                    <tr>
                      <td><label for="age_1">AGE</label></td>
                      <td><input type="text" id="age_1" name="age[]"></td>
                    </tr>
                  </tbody>
                </table>
                <input type="button" value="ADD NEW FORM" id="add_new_form_btn"><br>
                <input type="submit" value="SAVE" name="submit">
            </form>



            <form id="create_partner_info" method="POST" class="mt-3" action="" class="margin-bottom-0">
                {{ csrf_field() }}

                <span class="error_form"></span>

                <div class="col-md-12 mb-3">
                    <label class="control-label">NAME OF PARTNER: <span class="text-danger">*</span></label>
                    <input class="form-control partner_name" name="partner_name" type="text" value="" placeholder="">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">COMPLETE ADDRESS(mention nearest landmark, if applicable):<span class="text-danger">*</span></label>
                    <input class="form-control partner_address" name="partner_address" type="text" value="" placeholder="">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">TYPE OF ORGANIZATION: <span class="text-danger">*</span></label>
                    <div class="row mb-3">
                        <div class="col-md-8 pl-2">
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck1" name="mincheck[]" data-parsley-mincheck="2" value="foo" required />
                                <label class="form-check-label" for="mincheck1">Checkbox 1</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 2</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 3</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 4</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 5</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-md-12 mb-3">
                    <label class="control-label">TOTAL LAND AREA OF LOCATION (sqm): <span class="text-danger">*</span></label>
                    <input class="form-control land_area" name="land_area" type="text" value="" placeholder="">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">NO. OF MANPOWER MAINTANING THE GARDEN: <span class="text-danger">*</span></label>
                    <input class="form-control no_of_manpower" name="no_of_manpower" type="text" value="" placeholder="">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">YEARS FARM AT THE LOCATION: <span class="text-danger">*</span></label>
                    <input class="form-control land_area" name="land_area" type="text" value="" placeholder="">
                </div> --}}

                <div class="col-md-12 mb-3">        
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label class="control-label">CONTACT PERSON: <span class="text-danger">*</span></label>
                            <input class="form-control contact_person" name="contact_person" type="text" value="" placeholder="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="control-label">CONTACT NUMBER: <span class="text-danger">*</span></label>
                            <input class="form-control contact_number" name="contact_number" type="text" value="" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label class="control-label">UA Technology Presents: <span class="text-danger">*</span></label>
                    <div class="row mb-3">
                        <div class="col-md-8 pl-2">
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck1" name="mincheck[]" data-parsley-mincheck="2" value="foo" required />
                                <label class="form-check-label" for="mincheck1">Checkbox 1</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 2</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 3</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 4</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 5</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">Do you sell your harvest? </label>
                    <input type="checkbox" class="" id="mincheck1" name="mincheck[]" data-parsley-mincheck="2" value="foo" required />
                    <label class="form-check-label" for="mincheck1">Yes</label>
                    <input type="checkbox" class="" id="mincheck2" name="mincheck[]" value="bar" />
                    <label class="form-check-label" for="mincheck2">No</label>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">If yes, indicate the weight(kgs) of the total harvest sold per crop: <span class="text-danger">*</span></label>
                    <input class="form-control" name="" type="text" value="" placeholder="">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">Are the growers/farmers trained? </label>
                    <input type="checkbox" class="" id="mincheck1" name="mincheck[]" data-parsley-mincheck="2" value="foo" required />
                    <label class="form-check-label" for="mincheck1">Yes</label>
                    <input type="checkbox" class="" id="mincheck2" name="mincheck[]" value="bar" />
                    <label class="form-check-label" for="mincheck2">No</label>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">If yes, What are the trainings attended? <span class="text-danger">*</span></label>
                    <input class="form-control" name="" type="text" value="" placeholder="">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">LIVE ANIMALS PRESENTS: <span class="text-danger">*</span></label>
                    <div class="row mb-3">
                        <div class="col-md-8 pl-2">
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck1" name="mincheck[]" data-parsley-mincheck="2" value="foo" required />
                                <label class="form-check-label" for="mincheck1">Checkbox 1</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 2</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 3</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 4</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="mincheck2" name="mincheck[]" value="bar" />
                                <label class="form-check-label" for="mincheck2">Checkbox 5</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">Did you apply fertilizers? </label>
                    <input type="checkbox" class="" id="mincheck1" name="mincheck[]" data-parsley-mincheck="2" value="foo" required />
                    <label class="form-check-label" for="mincheck1">Yes</label>
                    <input type="checkbox" class="" id="mincheck2" name="mincheck[]" value="bar" />
                    <label class="form-check-label" for="mincheck2">No</label>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">If yes, Please specify? <span class="text-danger">*</span></label>
                    <input class="form-control" name="" type="text" value="" placeholder="">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">Did you apply pesticides? </label>
                    <input type="checkbox" class="" id="mincheck1" name="mincheck[]" data-parsley-mincheck="2" value="foo" required />
                    <label class="form-check-label" for="mincheck1">Yes</label>
                    <input type="checkbox" class="" id="mincheck2" name="mincheck[]" value="bar" />
                    <label class="form-check-label" for="mincheck2">No</label>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="control-label">If yes, please specify? <span class="text-danger">*</span></label>
                    <input class="form-control" name="" type="text" value="" placeholder="">
                </div>

                <div class="col-md-12 mb-5">
                    <label class="control-label">NO. OF BENEFICIARIES: <span class="text-danger">*</span></label>
                    <input class="form-control" name="" type="number" value="" placeholder="">
                </div>

                <hr>

                <button type="submit" id="create_profile_info_btn" class="btn btn-outline-info float-right">SAVE PROFILE INFO</button>
            </form>


        </div>
    </div>

{{-- </div> --}}

@endsection
