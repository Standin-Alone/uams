<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
<script> var location_markers = {!! json_encode( $get_partner_site ) !!}; </script>
<script> var partner_profile_route = {!! json_encode( $partner_profile_route ) !!}; </script>
<script>

$(document).ready(function(){
   async  function async_markers() {


        let lat_long_datas = Promise.all(location_markers.map((item,index)=>{
           return  { 
                        site_id: item.site_id, 
                        partner_id: item.partner_id, 
                        site_name: item.site_name,
                        reg: item.reg_code,
                        prv: item.prov_code,
                        mun: item.mun_code,
                        brgy: item.brgy_code,
                        reg_desc: item.reg_name, 
                        prv_desc: item.prov_name,
                        mun_desc: item.mun_name, 
                        brgy_desc: item.bgy_name, 
                        lat: parseFloat(item.lat) , 
                        lng: parseFloat(item.long) 
                    };
        }));


        return await lat_long_datas;
    }   


    async_markers().then((data)=>{
        return initMap(data);
    })

    
    const mapStyle = [
                            {
                                featureType: "landscape.natural.landcover",
                                stylers: [
                                    {
                                        "gamma": 0.44
                                    },
                                    {
                                        "hue": "#2bff00"
                                    }
                                ]
                            },
                            {
                                featureType: "water",
                                stylers: [
                                    {
                                        "hue": "#00a1ff"
                                    },
                                    {
                                        "saturation": 29
                                    },
                                    {
                                        "gamma": 0.74
                                    }
                                ]
                            },

    ];
    
    var arr_data = [];

    var cluster_storage = [];

    // Multiple Markers on Database
    function initMap(locations) {
  
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6,
  
            center: { lat: 12.8797, lng: 121.7740 },
            styles: mapStyle,
        });
        const infoWindow = new google.maps.InfoWindow({
            content: "",
            disableAutoPan: true,
        });

        // Create an array of alphabetical characters used to label the markers.
        // const labels = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";

        var loc_Latlong = [];

        const markers = locations.map(function(position,i){

                // console.log(position);
        
                // const label = labels[i % labels.length];
                const marker = new google.maps.Marker({
                    position,
                    // icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
                });


                // marker.setMap(map);

                marker.setMap(map);

                marker.reg_desc = position.reg_desc;
                marker.prov_desc = position.prov_desc;
                marker.mun_desc = position.mun_desc;
                marker.brgy_desc = position.brgy_desc;
                marker.reg = position.reg;
                marker.prv = position.prv;
                marker.mun = position.mun;
                marker.brgy = position.brgy;

                arr_data.push(marker);

                // Info Window Content
                var contentString =
                                    '<div id="markerContent" style="font-size: 12px;">' +
                                        "<strong> <b> Partner </b>: " + position['site_name'] + "</strong>" +
                                        "<br>" +
                                        "<strong> <b> Region </b>: " + position['reg_desc'] + "</strong>" +
                                        "<br>" +
                                        "<strong> <b> Province </b>: " + position['prv_desc'] + "</strong>" +
                                        "<br>" +
                                        "<strong> <b> Municipality </b>: " + position['mun_desc'] + "</strong>" +
                                        "<br>" +
                                        "<strong> <b> Barangay </b>: " + position['brgy_desc'] + "</strong>" +
                                        "<br>" +
                                        "<br>" +
                                        "<a href='"+ partner_profile_route+'/'+ position['partner_id'] +"' class='view_btn_site btn btn-outline-primary btn-sm' id='view_btn_site'>View</a>"
                                    "</div>";

                // markers can only be keyboard focusable when they have click listeners
                // open info window when marker is clicked
                marker.addListener("click", () => {
                    infoWindow.setContent(contentString);
                    infoWindow.open(map, marker);
                });

                return marker;
        });

        // Add a marker clusterer to manage the markers.
        // const markerCluster = new markerClusterer.MarkerClusterer({map, markers});

        // SHOW ALL MARKERS
        $(document).on('click', '#show_all', function () {
            $('#filter_region').prop('selectedIndex',0);
            $('#filter_Province').prop('selectedIndex',0);
            $('#filter_Municipality').prop('selectedIndex',0);
            $('#filter_Barangay').prop('selectedIndex',0);
            $("#filter_btn").prop('disabled', true);  
            arr_data.map((value, key) => {
                value.setMap(map);
            });
        });

        // FILTER BUTTON
        $(document).on('click', '#filter_btn', function () {
            arr_data.map((value, key) => {
                value.setMap(map);
            });
            var reg_code = $('select[name="filter_region"]').val();
            var prov_code = $('select[name="filter_Province"]').val();
            var mun_code =  $('select[name="filter_Municipality"]').val();
            var brgy_code =  $('select[name="filter_Barangay"]').val();

            // console.log(mun_code);
            arr_data.map((value, key) => {
      
                if(value.reg == reg_code && prov_code == "" && mun_code == "" && brgy_code == ""){
                    function initialize(){
                        value.setMap(map);
                    }
                }
                else if(value.reg == reg_code && value.prv == prov_code && mun_code == "" && brgy_code == ""){
                    function initialize(){
                        value.setMap(map);
                    }
                }
                else if(value.reg == reg_code && value.prv == prov_code && value.mun == mun_code && brgy_code == ""){
                    function initialize(){
                        value.setMap(map);
                    }
                }
                else if(value.reg == reg_code && value.prv == prov_code && value.mun == mun_code && value.brgy == brgy_code){
                    function initialize(){
                        value.setMap(map);
                    }
                }
                else{
                    value.setMap(null);
                };
            });

        });

        $("#filter_btn").prop('disabled', true);

        // Provinces
        $('#filter_Province').append('<option value="">-- Select Province --</option>').prop('disabled', true);
        $(document).on('change', '#filter_region', function () {
            var reg_code = $(this).val();

            console.log(partner_profile_route);
           
            if (reg_code) {
                $("#filter_btn").prop('disabled', false);

                $('select[name="filter_Municipality"]').empty();
                $('select[name="filter_Municipality"]').focus;
                $('select[name="filter_Municipality"]').append('<option value="">-- Select Municipality --</option>').prop('disabled', true).prop('selected', true);

                $('select[name="filter_Barangay"]').empty();
                $('select[name="filter_Barangay"]').focus;
                $('#filter_Barangay').append('<option value="">-- Select Barangay --</option>').prop('disabled', true).prop('selected', true);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('map.get_province',['reg_code'=>':id'])}}".replace(':id', reg_code),
                    type: "GET",
                    dataType: "json",
                    success: function (provinces) {

                        if (provinces) {
                            $('select[name="filter_Province"]').empty();
                            $('select[name="filter_Province"]').focus;
                            $('select[name="filter_Province"]').append('<option value="">-- Select Province --</option>');
                            $.each(provinces, function (key, province) {
                                $('select[name="filter_Province"]').append('<option value="' + province.prov_code + '">' + province.prov_name + ' </option>').prop('disabled', false).prop('selected', true);
                            }); 
                        } else {
                            $('#filter_Province').empty();
                        } 
                    }
                });
            } 
            else if( ($('#filter_region').val() == "") && ($('#filter_Province').val() != "") && ($('#filter_Municipality').val() != "") && ($('#filter_Barangay').val() != "") ||
                ($('#filter_region').val() == "") && ($('#filter_Province').val() != "") && ($('#filter_Municipality').val() != "") && ($('#filter_Barangay').val() == "") ||
                ($('#filter_region').val() == "") && ($('#filter_Province').val() != "") && ($('#filter_Municipality').val() == "") && ($('#filter_Barangay').val() == "") ||
                ($('#filter_region').val() == "") && ($('#filter_Province').val() == "") && ($('#filter_Municipality').val() == "") && ($('#filter_Barangay').val() == "")){
            
                $("#filter_btn").prop('disabled', true); 

                arr_data.map((value, key) => {
                    value.setMap(map);
                });
                
                $('select[name="filter_Province"]').empty();
                $('select[name="filter_Province"]').focus;
                $('#filter_Province').append('<option value="">-- Select Province --</option>').prop('disabled', true).prop('selected', true);

                $('select[name="filter_Municipality"]').empty();
                $('select[name="filter_Municipality"]').focus;
                $('select[name="filter_Municipality"]').append('<option value="">-- Select Municipality --</option>').prop('disabled', true).prop('selected', true);

                $('select[name="filter_Barangay"]').empty();
                $('select[name="filter_Barangay"]').focus;
                $('#filter_Barangay').append('<option value="">-- Select Barangay --</option>').prop('disabled', true);
            }
        });

        // Municipalities
        $('#filter_Municipality').append('<option value="">-- Select Municipality --</option>').prop('disabled', true);
        $('#filter_Province').on('change', function () {
            var reg_code = $('select[name="filter_region"]').val();
            var prov_code = $(this).val();
   
            if (prov_code && reg_code) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('map.get_municipality')}}"+"/"+reg_code+"/"+prov_code,
                    type: "GET",
                    dataType: "json",
                    success: function (cities) {
               
                        if (cities) {
                            $('select[name="filter_Municipality"]').empty();
                            $('select[name="filter_Municipality"]').focus;
                            $('select[name="filter_Municipality"]').append('<option value="">-- Select Municipality --</option>');
                            $.each(cities, function (key, city) {
                                $('select[name="filter_Municipality"]').append('<option value="' + city.mun_code + '">' + city.mun_name + ' </option>').prop('disabled', false).prop('selected', true);
                            }); 
                        } else {
                            $('#filter_Municipality').empty();
                        }
                    }
                });
            } 
            else if( ($('#filter_Province').val() == "") && ($('#filter_Municipality').val() != "") && ($('#filter_Barangay').val() != "") ||
                    ($('#filter_Province').val() == "") && ($('#filter_Municipality').val() != "") && ($('#filter_Barangay').val() == "") ||
                    ($('#filter_Province').val() == "") && ($('#filter_Municipality').val() == "") && ($('#filter_Barangay').val() == "") ){

                $('select[name="filter_Municipality"]').empty();
                $('select[name="filter_Municipality"]').focus;
                $('select[name="filter_Municipality"]').append('<option value="">-- Select Municipality --</option>').prop('disabled', true).prop('selected', true);

                $('select[name="filter_Barangay"]').empty();
                $('select[name="filter_Barangay"]').focus;
                $('#filter_Barangay').append('<option value="">-- Select Barangay --</option>').prop('disabled', true);
            } 
        });

        // Barangays
        $('#filter_Barangay').append('<option value="">-- Select Barangay --</option>').prop('disabled', true);
        $('#filter_Municipality').on('change', function () {
            var reg_code = $('select[name="filter_region"]').val();
            var prov_code = $('select[name="filter_Province"]').val();
            var mun_code = $(this).val();
            if (prov_code && reg_code && mun_code) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('map.get_barangay')}}"+"/"+reg_code+"/"+prov_code+"/"+mun_code,
                    type: "GET",
                    dataType: "json",
                    success: function (barangays) {
                        // console.log(barangay);
                        if (barangays) {
                            $('select[name="filter_Barangay"]').empty();
                            $('select[name="filter_Barangay"]').focus;
                            $('select[name="filter_Barangay"]').append('<option value="">-- Select Barangay --</option>');
                            $.each(barangays, function (key, brgy) {
                                $('select[name="filter_Barangay"]').append('<option value="' + brgy.bgy_code + '">' + brgy.bgy_name + ' </option>').prop('disabled', false).prop('selected', true);
                            }); 
                        } else {
                            $('#filter_Barangay').empty();
                        }
                    }
                });
            } 
            else if( ($('#filter_Municipality').val() == "") && ($('#filter_Barangay') != "") ){
                $('select[name="filter_Barangay"]').empty();
                $('select[name="filter_Barangay"]').focus;
                $('#filter_Barangay').append('<option value="">-- Select Barangay --</option>').prop('disabled', true);
            }
            else if( ($('#filter_Municipality').val() == "") && ($('#filter_Barangay') == "") ){
                $('select[name="filter_Barangay"]').empty();
                $('select[name="filter_Barangay"]').focus;
                $('#filter_Barangay').append('<option value="">-- Select Barangay --</option>').prop('disabled', true);
            }
        });  
    } 

    window.initMap = initMap;
})

</script>