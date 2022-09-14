<?php

namespace App\Modules\ReportCrop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ReportCrop extends Model
{
    use HasFactory;

    public function get_list($request){        
        $getData = DB::table('vw_crop')->get();

        if($request->ajax()){
            return Datatables::of($getData)->make(true);
        }        
        return $getData;
    }
    
    public function get_reg_name(){
        $data = DB::table('vw_crop')
            ->select('reg_name')
            ->groupBy('reg_name')
            ->get();
        return $data;        
    }
    
    public function get_mun_name(){
        $data = DB::table('vw_crop')
            ->select('mun_name')
            ->groupBy('mun_name')
            ->get();
        return $data;        
    }
    
    public function get_prov_name(){
        $data = DB::table('vw_crop')
            ->select('prov_name')
            ->groupBy('prov_name')
            ->get();
        return $data;        
    }
    
    public function get_bgy_name(){
        $data = DB::table('vw_crop')
            ->select('bgy_name')
            ->groupBy('bgy_name')
            ->get();
        return $data;        
    }
    
    public function get_partner_name(){
        $data = DB::table('vw_crop')
            ->select('partner_name')
            ->groupBy('partner_name')
            ->get();
        return $data;        
    }
    
    public function get_crop(){
        $data = DB::table('vw_crop')
            ->select('crop')
            ->groupBy('crop')
            ->get();
        return $data;        
    }

    public function get_crop_bydate($date_from , $date_to){
        $date_from = '2022-07-10';
        $date_to = '2022-07-11';
        $data = DB::table('vw_crop')
            ->where('harvest_from', '<=' , $date_from )
            ->where('harvest_to', '>=' , $date_to )
            ->get();
        return $data;
    }
}
