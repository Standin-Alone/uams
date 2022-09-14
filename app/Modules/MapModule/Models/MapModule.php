<?php

namespace App\Modules\MapModule\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MapModule extends Model
{
    use HasFactory;

    public function get_partner_site_query(){

        // $region = session()->get('region');

        $region = 13;

        $query = DB::table('partner_site as ps')
                        ->select('site_id', 'partner_id', 'site_name', 
                                 'reg_code', 'prov_code', 'mun_code', 'bgy_code', 
                                 'reg_name', 'prov_name', 'mun_name', 'bgy_name', 
                                 'site_address', 'lat', 'long')
                        ->when($region, function($query, $region){
                            if($region != 13){
                                $query->where('ps.reg_code', '=', $region)
                                      ->whereRaw('ps.reg_code != 00 AND ps.reg_code != 13');
                                      
                            }else{
                                $query->whereRaw('ps.reg_code != 00 AND ps.reg_code != 13');
                            }
                        })
                        ->get();

        return $query;

    }

}
