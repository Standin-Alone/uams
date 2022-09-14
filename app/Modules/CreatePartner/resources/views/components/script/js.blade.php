<script>
    function toast(response = []) {
        switch (response.status) {
            case 'success':
                Swal.fire({
                    title: 'Done!',
                    text: response.message,
                    type: 'success'
                }).then(function() {
                    if (response.url) {
                        window.location.href = response.url
                    }
                    //  window.location.href = reponse.url
                    // if(success_response.message != 'Nothing to update!'){
                    // }
                });
                break;
            case 'fail':
                Swal.fire({
                    title: 'Error!',
                    text: response.message,
                    type: 'success'
                }).then(function() {
                    if (response.message != 'Nothing to save!') {
                        window.top.location.reload(true)
                    }
                });
                break;
        }
    }




    function edit_site(form_id) {
        event.preventDefault();

        let save = $(form_id).serializeArray()
        var route = "{{ route('partnersite.edit') }}"

        save.push({
            name: 'reg_name',
            value: $(form_id).find('.region').find(":selected").text()
        }, {
            name: 'prov_name',
            value: $(form_id).find('.province').find(":selected").text()
        }, {
            name: 'mun_name',
            value: $(form_id).find('.municipality').find(":selected").text()
        }, {
            name: 'bgy_name',
            value: $(form_id).find('.barangay').find(":selected").text()
        }, )

        // alert(route);
        // console.log(save);
        // return false;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "post",
            url: route,
            data: save,
            dataType: "json",
            success: function(success_response) {
                toast(success_response)
            }
        });
    }



    // function editTechnology(form_id) {
    //     event.preventDefault();

    //     let save = $(form_id).serializeArray()
    //     var route = "{{ route('partnertechnology.edit') }}"

    //     save.push({
    //         name: 'tech_desc',
    //         value: $(form_id).find('.technology').find(":selected").text()
    //     }, )


    //     // alert(route);
    //     // console.log(save);
    //     // return false;

    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         method: "post",
    //         url: route,
    //         data: save,
    //         dataType: "json",
    //         success: function(success_response) {
    //             toast(success_response)
    //         }
    //     });
    // }


    // function editTraining(form_id) {
    //     event.preventDefault();
    //     let save = $(form_id).serializeArray()
    //     var route = "{{ route('partnertraining.edit') }}"


    //     // alert(route);
    //     //console.log(save);
    //     // return false;

    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         method: "post",
    //         url: route,
    //         data: save,
    //         dataType: "json",
    //         success: function(success_response) {
    //             toast(success_response)
    //         }
    //     });
    // }



    // function editAnimal(form_id) {

    //     event.preventDefault();
    //     let save = $(form_id).serializeArray()
    //     var route = "{{ route('partneranimal.edit') }}"

    //     save.push({

    //         name: 'animal_name',
    //         value: $(form_id).find('.animal').find(":selected").text()
    //     }, )

    //     // alert(route);
    //     //console.log(save);
    //     // return false;

    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         method: "post",
    //         url: route,
    //         data: save,
    //         dataType: "json",
    //         success: function(success_response) {
    //             toast(success_response)
    //         }
    //     });
    // }



    // function editOrganization(form_id) {

    //     event.preventDefault();
    //     let save = $(form_id).serializeArray()
    //     var route = "{{ route('partnerorganization.edit') }}"

    //     save.push({

    //         name: 'org_name',
    //         value: $(form_id).find('.organization').find(":selected").text()
    //     }, )

    //     // alert(route);
    //     // console.log(save);
    //     // return false;

    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         method: "post",
    //         url: route,
    //         data: save,
    //         dataType: "json",
    //         success: function(success_response) {
    //             toast(success_response)
    //         }
    //     });
    // }

    function editHarvest(form_id) {

        event.preventDefault();
        let save = $(form_id).serializeArray()
        var route = "{{ route('partnerharvest.edit') }}"

        save.push({

            name: 'crop',
            value: $(form_id).find('.crop').find(":selected").text()
        }, )

        // alert(route);
        console.log(save);
        // return false;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "post",
            url: route,
            data: save,
            dataType: "json",
            success: function(success_response) {
                toast(success_response)
            }
        });
        }




    $(document).ready(function() {

        // $('#save').click(function() {
        //     alert('pogi')
        //     return false;
        //     event.preventDefault();
        //     var form_data = $('#CreateAccountForm').serializeArray();
        //     var updates = check_updates();

        //     var route = "{{ route('save.partner') }}"
        //     $.ajax({
        //         url         : route,
        //         method      : 'POST',
        //         dataType    : 'json',
        //         data        : form_data,
        //         success     : function(success_response) {
        //             Swal.fire({
        //                     title: 'Done!',
        //                     text: success_response.message,
        //                     type: 'success'
        //                 }).then(function(){
        //                     if(success_response.message != 'Nothing to update!'){
        //                         window.top.location.reload(true)
        //                     }
        //                 });
        //         },
        //         error       : function(error_response) {
        //             Swal.fire("Error!", error_response.message, "error");
        //         }
        //     })
        // })




        $("#CreateAccountForm").on('submit', function() {

            event.preventDefault();
            let save = $(this).serializeArray()

            save.push({
                name: 'reg_name',
                value: $('#region').find(":selected").text()
            }, {
                name: 'prov_name',
                value: $('#province').find(":selected").text()
            }, {
                name: 'mun_name',
                value: $('#municipality').find(":selected").text()
            }, {
                name: 'bgy_name',
                value: $('#barangay').find(":selected").text()
            }, )



            var route = "{{ route('save.partner') }}"

            // alert(route);
            // console.log(save);
            // return false;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "post",
                url: route,
                data: save,
                dataType: "json",
                success: function(success_response) {
                    // console.log(save);
                    toast(success_response)
                }
            });
        })







        //         $(document).on('click', '#save', function(event){
        //             alert('aaa');

        //             var partner_info = $('#partner_info').serializeArray();
        //             // var partner_site = $('#partner_site').serializeArray();
        //             var route = "{{ route('save.partner') }}";
        //             var form_data = {
        //                 partner_info: partner_info,
        //                 // partner_site: partner_site,
        //             };



        //             form_data.partner_info.push(
        //                         {
        //                             name: 'reg_name', value: $('#region').find(":selected").text()
        //                         },

        //                         {
        //                             name: 'prov_name', value: $('#province').find(":selected").text()
        //                         },

        //                         {
        //                             name: 'mun_name', value: $('#municipality').find(":selected").text()
        //                         },

        //                         {
        //                             name: 'bgy_name', value: $('#barangay').find(":selected").text()
        //                         },
        //             );
        // // console.log(form_data);
        //             $.ajax({
        //                         headers: {
        //                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                         },
        //                         type: "post",
        //                         url: route,
        //                         data: form_data,
        //                         dataType: "json",
        //                         success: function(response) {

        //                         }
        //             });
        //                         return false
        //         });


        // $(document).ready(function() {
        //         $('#save').on('submit', function() {

        //             var partner_info = $('#partner_info').serializeArray()
        //             var partner_site = $('#partner_site').serializeArray()
        //             var route = "{{ route('save.partner') }}"
        //             var form_data = {
        //                 partner_info: partner_info,
        //                 partner_site: partner_site,

        //             }
        //             console.log(partner_info);
        //             let save = $(this).serializeArray()
        //       save.push({
        //         name: 'reg_name', value: $('#region').find(":selected").text()
        //     }, {
        //         name: 'prov_name', value: $('#province').find(":selected").text()
        //     }, {
        //         name: 'mun_name', value: $('#municipality').find(":selected").text()
        //     }, {
        //         name: 'bgy_name', value: $('#barangay').find(":selected").text()
        //     }, )


        //             $.ajax({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 },
        //                 type: "post",
        //                 url: route,
        //                 data: form_data,
        //                 dataType: "json",
        //                 success: function(response) {

        //                 }
        //             });
        //         });

        //     });

        // }


        // filter province
        $("#region").change(function() {

            var value = $(this).val()
            // console.log(value);

            $.ajax({
                url: '{{ route('ab-filter-province', ['region_code' => ':id']) }}'.replace(
                    ':id',
                    value),
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    var options = $.map(data, function(v, i) {
                        if (i == 0) {
                            return `<option value="" selected disabled>Select Province</option>
                            <option value="${v.prov_code}">${v.prov_name}</option>`
                        } else {
                            return `<option value="${v.prov_code}">${v.prov_name}</option>`
                        }
                    });
                    $("#province").prop('disabled', false);
                    $("#province").html(options)

                }
            });
        })


        $("#municipality").change(function() {

            let region = $("#region option:selected").val();
            let province = $("#province option:selected").val();
            let value = $("option:selected", this).val();
            console.warn(value)
            $.ajax({
                url: '{{ route('abcd-filter-barangay', ['region_code' => ':id_region_code', 'province_code' => ':id_province_code', 'municipality_code' => ':id']) }}'
                    .replace(':id_region_code', region).replace(':id_province_code', province)
                    .replace(
                        ':id', value),
                type: 'get',
                success: function(data) {
                    let convertToJson = JSON.parse(data);
                    $("#barangay").prop('disabled', false);
                    $("#barangay option").remove();
                    $("#barangay").append(
                        '<option value="" selected disabled>Select Barangay</option>')
                    convertToJson.map(item => {
                        $("#barangay").append('<option value="' + item.bgy_code +
                            '">' + item
                            .bgy_name + '</option>')
                    })
                }
            });
        })

        // filter municipality
        $("#province").change(function() {
            let value = $("option:selected", this).val();
            let region = $("#region").val();
            $.ajax({
                url: '{{ route('abc-filter-municipality', ['province_code' => ':id', 'region_code' => ':region_code']) }}'
                    .replace(':id', value).replace(':region_code', region),
                type: 'get',
                success: function(data) {
                    let convertToJson = JSON.parse(data);
                    $("#municipality").prop('disabled', false);
                    $("#municipality option").remove();
                    $("#municipality").append(
                        '<option value="" selected disabled>Select Municipality</option>'
                    )
                    convertToJson.map(item => {
                        $("#municipality").append('<option value="' + item
                            .mun_code + '">' +
                            item.mun_name + '</option>')
                    })
                }
            });
        })









        // filter province
        $(".region").change(function() {
            var region = $(this)
            var value = $(this).val()
            console.log(value);

            $.ajax({
                url: '{{ route('ab-filter-province', ['region_code' => ':id']) }}'.replace(
                    ':id',
                    value),
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    console.log(region);
                    var options = $.map(data, function(v, i) {
                        if (i == 0) {
                            return `<option value="" selected disabled>Select Province</option>
                            <option value="${v.prov_code}">${v.prov_name}</option>`
                        } else {
                            return `<option value="${v.prov_code}">${v.prov_name}</option>`
                        }
                    });
                    region.parents('tr').find(".province").prop('disabled', false);
                    region.parents('tr').find(".province").html(options)
                }
            });
        })


        // filter municipality
        $(".province").change(function() {
            var province = $(this)
            var val = $(this).val()
            console.log(val);

            let value = $("option:selected", this).val();
            let region = $(".region").val();
            $.ajax({
                url: '{{ route('abc-filter-municipality', ['province_code' => ':id', 'region_code' => ':region_code']) }}'
                    .replace(':id', value).replace(':region_code', region),
                type: 'get',
                success: function(data) {
                    let convertToJson = JSON.parse(data);
                    $(".municipality").prop('disabled', false);
                    $(".municipality option").remove();
                    $(".municipality").append(
                        '<option value="" selected disabled>Select Municipality</option>'
                    )
                    convertToJson.map(item => {
                        $(".municipality").append('<option value="' + item
                            .mun_code + '">' +
                            item.mun_name + '</option>')
                    })

                    province.parents('tr').find(".municipality").prop('disabled', false);
                    province.parents('tr').find(".municipality").html(options)
                }
            });
        })


        $(".municipality").change(function() {

            var municipality = $(this)
            var vala = $(this).val()
            console.log(vala);

            let region = $(".region option:selected").val();
            let province = $(".province option:selected").val();
            let value = $("option:selected", this).val();
            console.warn(value)
            $.ajax({
                url: '{{ route('abcd-filter-barangay', ['region_code' => ':id_region_code', 'province_code' => ':id_province_code', 'municipality_code' => ':id']) }}'
                    .replace(':id_region_code', region).replace(':id_province_code', province)
                    .replace(
                        ':id', value),
                type: 'get',
                success: function(data) {
                    let convertToJson = JSON.parse(data);
                    $(".barangay").prop('disabled', false);
                    $(".barangay option").remove();
                    $(".barangay").append(
                        '<option value="" selected disabled>Select Barangay</option>')
                    convertToJson.map(item => {
                        $(".barangay").append('<option value="' + item.bgy_code +
                            '">' + item
                            .bgy_name + '</option>')
                    })
                    municipality.parents('tr').find(".barangay").prop('disabled', false);
                    municipality.parents('tr').find(".barangay").html(options)
                }
            });
        })




        $("#addSite").on('submit', function() {

            event.preventDefault();
            let save = $(this).serializeArray()

            save.push({
                name: 'reg_name',
                value: $('#region').find(":selected").text()
            }, {
                name: 'prov_name',
                value: $('#province').find(":selected").text()
            }, {
                name: 'mun_name',
                value: $('#municipality').find(":selected").text()
            }, {
                name: 'bgy_name',
                value: $('#barangay').find(":selected").text()
            }, )



            var route = "{{ route('partner.site') }}"

            // alert(route);
            // console.log(save);
            // return false;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "post",
                url: route,
                data: save,
                dataType: "json",
                success: function(success_response) {
                    // console.log(save);
                    toast(success_response)
                    $("#partnersite-datatable").DataTable().ajax.reload();

                }
            });
        })

        $("#addTech").on('submit', function() {

            event.preventDefault();
            let save = $(this).serializeArray()
            var route = "{{ route('partnersite.tech') }}"

            save.push({
                name: 'tech_desc',
                value: $('#technology').find(":selected").text()
            }, )
            // alert(route);
            // console.log(save);
            // return false;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "post",
                url: route,
                data: save,
                dataType: "json",
                success: function(success_response) {
                    console.log(save);
                    toast(success_response)
                }
            });
        })







        $("#addTraining").on('submit', function() {

            event.preventDefault();
            let save = $(this).serializeArray()
            var route = "{{ route('partnersite.training') }}"

            // alert(route);
            // console.log(save);
            // return false;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "post",
                url: route,
                data: save,
                dataType: "json",
                success: function(success_response) {
                    toast(success_response)
                }
            });
        })

        $("#addOrganization").on('submit', function() {

            event.preventDefault();
            let save = $(this).serializeArray()
            var route = "{{ route('partnersite.organization') }}"


            save.push({

                name: 'org_name',
                value: $('.org').find(":selected").text()
                }, )

            // alert(route);
            //console.log(save);
            // return false;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "post",
                url: route,
                data: save,
                dataType: "json",
                success: function(success_response) {
                    toast(success_response)
                }
            });
        })


        $("#addAnimal").on('submit', function() {

            event.preventDefault();
            let save = $(this).serializeArray()
            var route = "{{ route('partnersite.animal') }}"

            save.push({
            name:'animal_name',
            value:$('#animal').find(":selected").text()
            }, )


            // alert(route);
            console.log(save);
            // return false;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "post",
                url: route,
                data: save,
                dataType: "json",
                success: function(success_response) {
                    toast(success_response)
                }
            });
        })



        $("#addHarvest").on('submit', function() {

            event.preventDefault();
            let save = $(this).serializeArray()
            var route = "{{ route('partnersite.harvest') }}"


            save.push({

                name: 'crop',
                value: $('#crop').find(":selected").text()
            }, )

            // alert(route);
            // console.log(save);
            // return false;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "post",
                url: route,
                data: save,
                dataType: "json",
                success: function(success_response) {
                    toast(success_response)
                }
            });
        })




        // $('#partnersite-datatable').DataTable();


        // $('#partnersite-datatable').DataTable({
        //     "serverSide": true,
        //     var route = "{{ route('partnersite.data') }}"
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },

        //         method: "get",
        //         url: route,
        //       })

        //     "columnDefs": [{
        //         'targets': [4],
        //         'orderable': false
        //     }],
        // });



        // alert(route);
        // console.log(save);
        // return false;




        $('#profile-datatable').DataTable();
        $('#partnersite-datatable').DataTable();
        $('#technology-datatable').DataTable();
        $('#training-datatable').DataTable();
        $('#organization-datatable').DataTable();
        $('#animal-datatable').DataTable();
        $('#harvest-datatable').DataTable();



        // $(document).on('click', '.btn_delete_tech', function(event) {
        //     alert('btn_delete_tech');
        //     // var harvest_id = $(this).data('selectedid');
        //     // var csrf        = "{{ csrf_token() }}";
        //     // event.preventDefault();

        //     // window.open(URL, '_blank');
        // });  



    })





    // $(function() {

    //     // var partner_id = document.getElementById("partner_id").value
    //     var partner_id = 'f7d35575-7ea6-453e-8121-527b4397d7ba';
    //         var table = $('#partnersite-datatable').DataTable({
    //             processing: true,
    //             serverSide: true,
    //             responsive: true,
    //             paging: true,
    //             ajax: "{{ route('partnersite.data') }}"+ "?partner_id=" + partner_id,
    //             lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
    //             columns: [
    //                 {data: 'site_name', name: 'site_name'},
    //                 {data: 'land_area', name: 'land_area'},
    //                 {data: 'no_of_manpower', name: 'no_of_manpower'},
    //                 {data: 'no_of_year', name: 'no_of_year'},
    //                 {data: 'site_own', name:'site_own'},
    //                 {data: 'reg_name', name: 'reg_name'},
    //                 {data: 'prov_name', name: 'prov_name'},
    //                 {data: 'mun_name', name: 'mun_name'},
    //                 {data: 'bgy_name', name: 'bgy_name'},
    //                 {data: 'site_address', name: 'site_address'},
    //                 {data: 'action', name: 'action', orderable: true, searchable: true},
    //             ],
    //         });

    //     });
</script>
