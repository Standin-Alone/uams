<?php

namespace App\Modules\ReportSite\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ReportSite extends Model
{
    use HasFactory;

    public function get_list($request){        
        $getData = DB::table('vw_site')->get();

        if($request->ajax()){
            return Datatables::of($getData)->make(true);
        }        
        return $getData;
    }
    
    public function get_reg_name(){
        $data = DB::table('vw_site')
            ->select('reg_name')
            ->groupBy('reg_name')
            ->get();
        return $data;        
    }
    
    public function get_mun_name(){
        $data = DB::table('vw_site')
            ->select('mun_name')
            ->groupBy('mun_name')
            ->get();
        return $data;        
    }
    
    public function get_prov_name(){
        $data = DB::table('vw_site')
            ->select('prov_name')
            ->groupBy('prov_name')
            ->get();
        return $data;        
    }
    
    public function get_bgy_name(){
        $data = DB::table('vw_site')
            ->select('bgy_name')
            ->groupBy('bgy_name')
            ->get();
        return $data;        
    }
    
    public function get_partner_name(){
        $data = DB::table('vw_site')
            ->select('partner_name')
            ->groupBy('partner_name')
            ->get();
        return $data;        
    }
    
    public function get_crop(){
        $data = DB::table('vw_site')
            ->select('crop')
            ->groupBy('crop')
            ->get();
        return $data;        
    }
}
