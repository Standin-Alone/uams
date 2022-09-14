  {{-- <tbody>
                            <label class="control-label"> Type of Organization: <span class="text-danger">*</span></label>
                            <tr>
                                @foreach($organization as $reg)
                                <td class="form-row p-2">

                                  <Input type="hidden" value="{{{$reg->org_id}}}" name="list[][id]"><br>
                                  <Input type="checkbox" class="mb-2" value="" name="list[][value]">
                                </td>
                                <td>
                                    {{$reg->org_name}}
                                </td>
                              </tr>
                              @endforeach
                        </tbody> --}}
                            {{-- <div class="row row-space-10">
                                <div class="col-md-4 m-b-15">
                                    <label class="control-label">Total Land Area of Location (sqm) <span class="text-danger">*</span></label>
                                    <input type="text" name="partner_area" class="form-control" placeholder=" Land Area"  onKeyUP="this.value = this.value.toUpperCase();" />
                                </div>


                                <input type="text" name="user_id" class="hide" value=""/>
                                <div class="col-md-4 m-b-15">
                                    <label class="control-label">No. of Manpower maintaing the garden: <span class="text-danger">*</span></label>
                                    <input type="text" name="partner_manpower" class="form-control txtfname" placeholder=""  onKeyUP="this.value = this.value.toUpperCase();"/>
                                </div>


                                <input type="text" name="user_id" class="hide" value=""/>
                                <div class="col-md-4 m-b-15">
                                    <label class="control-label">Years farm at the location: <span class="text-danger">*</span></label>
                                    <input type="text" name="partner_years" class="form-control txtfname" placeholder=""  onKeyUP="this.value = this.value.toUpperCase();"/>

                            </div>
                            </div> --}}




                            {{-- <tbody>
                                <label class="control-label"> UA Technology Presents: <span class="text-danger">*</span></label>
                                <tr>
                                    @foreach($technology as $tech)
                                    <td class="form-row p-2">

                                      <Input type="hidden" value="{{{$tech->tech_id}}}" name="list[][id]"></br>
                                      <Input type="checkbox" class="mb-2" value="true" name="list[][value]">
                                    </td>
                                    <td>
                                        {{$tech->tech_desc}}
                                    </td>
                                  </tr>
                                  @endforeach
                            </tbody>

                        <br> --}}



                         {{-- <div class="row row-space-10">
                                <input type="text" name="user_id" class="hide" value=""/>
                                <div class="col-md-12 m-b-15">
                                    <label class="control-label">If yes, What are the trainings attended?<span class="text-danger">*</span></label>
                                    <input type="text" name="" class="form-control txtfname" placeholder=""  onKeyUP="this.value = this.value.toUpperCase();"/>
                                </div>
                            </div> --}}

                            {{-- <tbody>
                                <label class="control-label"> Live Animals Presents: <span class="text-danger">*</span></label>
                                <tr>
                                    @foreach($animal as $ani)
                                    <td class="form-row p-2">

                                      <Input type="hidden" value="{{{$ani->animal_id}}}" name="list[][id]"><br>
                                      <Input type="checkbox" class="mb-2" value="true" name="list[][value]">
                                    </td>
                                    <td>
                                        {{$ani->animal_name}}
                                    </td>
                                  </tr>
                                  @endforeach
                            </tbody>
                        <br> --}}




                        <p class="text-center">
                            &copy; Department of Agriculture ICTS 2022
                        </p> .




{{--
                <Script></Script> --}}
{{--
                //     $("#CreateAccountForm").on('submit', function() {

                    //         event.preventDefault();
                    //         let save = $(this).serializeArray()

                    //         save.push({
                    //             name: 'reg_name', value: $('#region').find(":selected").text()
                    //         }, {
                    //             name: 'prov_name', value: $('#province').find(":selected").text()
                    //         }, {
                    //             name: 'mun_name', value: $('#municipality').find(":selected").text()
                    //         }, {
                    //             name: 'bgy_name', value: $('#barangay').find(":selected").text()
                    //         }, )
                    //         // alert ('pogi')


                    //         var route = "{{ route('save.partner') }}"

                    //         // alert(route);
                    //             // console.log(save);
                    //         // return false;

                    //         $.ajax({
                    //             headers: {
                    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //             },
                    //             method: "post",
                    //             url: route,
                    //             data: save,
                    //             dataType: "json",
                    //             success: function(success_response) {
                    //                 toast(success_response)
                    //             }
                    //         });
                    //     })
                    // }) --}}







                    // $(document).ready(function() {
                        //     var count = 0;

                        //     $(document).on('click', '.deleteRow', function(){
                        //         console.log('gumagana');
                        //         if (count > 0){
                        //             $(this).parents('.site').remove()
                        //             count = count - 1
                        //             console.log(count);
                        //         }else{
                        //             alert('Cannot Delete')
                        //         }
                        //     })

                        //     $('.addRow').on('click', function() {
                        //         tbody = $('#tbody')
                        //         var row = `
                        //         <tr class="site">
                        //                 <td><input type="text" name="site_name[]" id="site_name${count}" class="form-control"></td>
                        //                 <td><input type="text" name="land_area[]" id="land_area${count}" class="form-control"></td>
                        //                 <td><input type="text" name="no_of_manpower[]" id="no_of_manpower${count}" class="form-control"></td>
                        //                 <td><input type="text" name="no_of_year[]" id="no_of_year${count}" class="form-control"></td>
                        //                 <td> <select name="site_own[]" id="site_own${count}" class="form-control">
                        //                         <option value="" selected="" disabled="">--Select--</option>
                        //                         <option value="Rented">Rented</option>
                        //                         <option value="Owned">Owned</option>
                        //                         <option value="Contracted">Contracted</option>
                        //                     </select>
                        //                 </td>
                        //                 <td>
                        //                     <select class="form-control" name="region[]" id="region${count}" data-style="btn-white">
                        //                                         <option value="" selected>Select Region</option>
                        //                                         @foreach ($get_regions as $reg)
                        //                                             <option value="{{ $reg->reg_code }}">{{ $reg->reg_name }}</option>
                        //                                         @endforeach
                        //                     </select>
                        //                 </td>
                        //                 <td><select class="form-control" name="province[]" id="province${count}" data-style="btn-white" disabled="">
                        //                         <option value="" selected="" disabled="">Select Province</option>
                        //                     </select></td>
                        //                 <td> <select class="form-control" name="municipality[]" id="municipality${count}" data-style="btn-white" disabled="">
                        //                         <option value="" selected="" disabled="">Select Municipality</option>
                        //                     </select></td>
                        //                 <td><select class="form-control" name="barangay[]" id="barangay${count}" data-size="10" data-style="btn-white" disabled="">
                        //                         <option value="" selected="" disabled="">Select Barangay</option>
                        //                     </select></td>
                        //                 <td><input type="text" name="site_address[]" id="site_addres${count}" class="form-control"></td>
                        //                 <th><a href="javascript:void(0)" class="btn btn-danger deleteRow"><i class="fa fa-trash" aria-hidden="true"></i></a></th>
                        //             </tr>
                        //         `
                        //         tbody.append(row)
                        //         count = count + 1

                        //         console.log(count);
                        //     })

                        // });





                        <form id="Dropdown" action="{{route('partner.site')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered">
                                        <div class="card-body">

                                            <thead>
                                                <tr>
                                                    <th>Site Name</th>
                                                    <th>Total Land Area</th>
                                                    <th>Number of Manpower</th>
                                                    <th>Number of Years</th>
                                                    <th>Site Own</th>
                                                    <th>Region</th>
                                                    <th>Province</th>
                                                    <th>Municipality</th>
                                                    <th>Barangay</th>
                                                    <th>Site Address</th>
                                                    <th style="text-align: center"><a href="#"
                                                            class="btn btn-success addRow">+</a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="site_name[]" class="form-control">
                                                    </td>
                                                    <td><input type="text" name="land_area[]" class="form-control">
                                                    </td>
                                                    <td><input type="text" name="no_of_manpower[]" class="form-control">
                                                    </td>
                                                    <td><input type="text" name="no_of_year[]" class="form-control">
                                                    </td>
                                                    <td> <select name="site_own[]" id="" class="form-control">
                                                            <option value="" selected disabled>--Select--</option>
                                                            <option value="Rented">Rented</option>
                                                            <option value="Owned">Owned</option>
                                                            <option value="Contracted">Contracted</option>
                                                        </select>
                                                    </td>
                                                    <td><select class="form-control region" name="region[]" id="region"
                                                            data-style="btn-white">
                                                            <option value="" selected>Select Region</option>
                                                                @foreach ($get_regions as $reg)
                                                                    <option value="{{ $reg->reg_code }}">{{ $reg->reg_name }}
                                                                    </option>
                                                                @endforeach
                                                        </select>

                                                    </td>
                                                    <td><select class="form-control province" name="province[]"
                                                            id="province" data-style="btn-white" disabled>
                                                            <option value="" selected disabled>Select Province
                                                            </option>
                                                        </select></td>
                                                    <td> <select class="form-control municipality" name="municipality[]"
                                                            id="municipality" data-style="btn-white" disabled>
                                                            <option value="" selected disabled>Select Municipality
                                                            </option>
                                                        </select></td>
                                                    <td><select class="form-control barangay" name="barangay[]"
                                                            id="barangay" data-size="10" data-style="btn-white" disabled>
                                                            <option value="" selected disabled>Select Barangay
                                                            </option>
                                                        </select></td>
                                                    <td><input type="text" name="site_address[]" class="form-control">
                                                    </td>
                                                    <td style="text-align: center"> <a href="#"
                                                            class="btn btn-danger deleteRow">-</a></td>
                                            </tbody>

                                        </div>
                                </div>

                            </div>
                            <button type="submit" name="save" class="btn btn-success" onclick="return confirm('Are you sure you want to save this profile?')">Save</button>
                        </form>
