<script> var get_partner_profile = {!! json_encode($get_partner_profile) !!}; </script>
<script>
    $(document).ready(function(){
        var html = "";

        get_partner_profile.map((item,index)=>{
            html += '<iframe id="map_canvas" width="600" height="450" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC6JVpfd5wzUy4nYmymW1OTpuhSMbTkBe8&q='+item.lat+'+'+item.long+'"></iframe>';
        });

        $(".append_map").append(html);
    });
</script>