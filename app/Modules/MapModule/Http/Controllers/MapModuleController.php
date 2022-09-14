<?php

namespace App\Modules\MapModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Modules\MapModule\Models\MapModule;

class MapModuleController extends Controller
{
    public function __construct(Request $request)
    {
        $this->MapModel = new MapModule;
    }

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("MapModule::welcome");
    }

    public function map_index(){

        // GET PARTNER SITE QUERY in MAP MODEL
        $get_partner_site = $this->MapModel->get_partner_site_query();

        // GET FARM AREA IMAGE


        // CALL get_region STORED PROCEDURE
        $regions = DB::select("CALL get_regions()");

        // get url partner-profile
        $partner_profile_route = url(route('partner_profile.index'));

        // RETURN VIEW
        return view("MapModule::index", ["get_partner_site" => $get_partner_site, 'regions' => $regions, 'partner_profile_route' => $partner_profile_route]);

    }

    public function get_province($reg_code){
        
        $provinces = DB::select("SELECT prov_code, prov_name FROM geo_map WHERE reg_code LIKE '$reg_code' GROUP BY prov_name HAVING COUNT(*) > 1");

        return response()->json($provinces);

    }

    public function get_city($reg_code, $prov_code){

        $cities = DB::select("SELECT mun_code, mun_name FROM geo_map WHERE reg_code LIKE '$reg_code' AND prov_code LIKE '$prov_code' group by mun_name, mun_code");

        return response()->json($cities);

    }

    public function get_barangay($reg_code, $prov_code, $mun_code){

        $barangays = DB::select("SELECT bgy_code, bgy_name FROM geo_map WHERE reg_code = '$reg_code' AND prov_code = '$prov_code' AND mun_code = '$mun_code' group by bgy_name, bgy_code");

        return response()->json($barangays);

    }

}
