    <script src="assets/js/highcharts/code/highcharts.js"></script>    
    <script src="assets/js/highcharts/code/modules/drilldown.js"></script>
    <script src="assets/js/highcharts/code/modules/exporting.js"></script>
    <script src="assets/js/highcharts/code/modules/export-data.js"></script>
    <script src="assets/js/highcharts/code/modules/accessibility.js"></script>
<script type="text/javascript">
// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Total Users per Region'
    },
    subtitle: {
        text: 'Click the slices to view by provinces.</a>'
    },

    accessibility: {
        announceNewData: {
            enabled: true
        },
        point: {
            valueSuffix: '%'
        }
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:1}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Regions",
            colorByPoint: true,
            data: [
                @foreach($computeUsersPerRegions as $value)
                {
                    name: "{{$value->REG_NAME}}",
                    y:{{$value->total / $value->sub_total}},
                    drilldown: "{{$value->REG_NAME}}"
                },
                @endforeach
            ]
        }
    ],
    drilldown: {
        series: [
                @foreach($computeUsersPerRegions as $value)
                  {
                    name: "{{$value->REG_NAME}}",
                    id: "{{$value->REG_NAME}}",
                     data: [
                         @php
                            $getUsersByRegion = db::select("
                                            select total as sub_total, g.REG_NAME, sum(total) as total,g.prov_name from (SELECT reg,COUNT(*) as total,prov FROM uams_db.users as u
                                            where reg = '{$value->reg}'   
                                                    group by reg   
                                                                                                                                                     
                                            ) as a                                          
                                                    left join  uams_db.geo_map as g on g.reg_code = a.reg
                                                    
                                                    where reg is not null
                                                    group by reg

                                            

                                        ");
                                        
     
                         @endphp

                        @foreach($getUsersByRegion as $usersByRegion)
                            
                        [
                            "{{$usersByRegion->prov_name}}",
                            {{$usersByRegion->sub_total}}
                        ],

                         @endforeach
                     ]
                },
                @endforeach
           
        ]
    }
})
		</script>