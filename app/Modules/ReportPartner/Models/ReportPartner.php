<?php

namespace App\Modules\ReportPartner\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ReportPartner extends Model
{
    use HasFactory;

    public function get_list($request){        
        $getData = DB::table('partner_info')->get();

        if($request->ajax()){
            return Datatables::of($getData)->make(true);
        }
        
        return $getData;
    }

    public function get_partner_info($partner_id){
        $data = DB::table('partner_info')
            ->where('partner_id',$partner_id)
            ->first();
        return $data;
    }

    public function get_partner_site($partner_id){
        $data = DB::table('partner_site')
            ->where('partner_id',$partner_id)
            ->get();
        return $data;
    }

    public function get_partner_org($partner_id){
        $data = DB::table('partner_org')
            ->where('partner_id',$partner_id)
            ->get();
        return $data;
    }

    public function get_partner_tech($partner_id){
        $data = DB::table('partner_tech')
            ->where('partner_id',$partner_id)
            ->get();
        return $data;
    }

    public function get_partner_training($partner_id){
        $data = DB::table('partner_training')
            ->where('partner_id',$partner_id)
            ->get();
        return $data;
    }

    public function get_partner_animal($partner_id){
        $data = DB::table('partner_animal')
            ->where('partner_id',$partner_id)
            ->get();
        return $data;
    }

    public function get_partner_harvest($partner_id){
        $data = DB::table('partner_harvest')
            ->where('partner_id',$partner_id)
            ->get();
        return $data;
    }

    public function get_reg_name(){
        $data = DB::table('partner_info')
            ->select('reg_code','reg_name')
            ->groupBy('reg_name')
            ->get();
        return $data;        
    }
    
    public function get_mun_name(){
        $data = DB::table('partner_info')
            ->select('mun_code','mun_name')
            ->groupBy('mun_name')
            ->get();
        return $data;        
    }
    
    public function get_prov_name(){
        $data = DB::table('partner_info')
            ->select('prov_code','prov_name')
            ->groupBy('prov_name')
            ->get();
        return $data;        
    }
    
    public function get_bgy_name(){
        $data = DB::table('partner_info')
            ->select('bgy_code','bgy_name')
            ->groupBy('bgy_name')
            ->get();
        return $data;        
    }

}
