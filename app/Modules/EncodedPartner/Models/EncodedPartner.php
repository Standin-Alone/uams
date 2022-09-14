<?php

namespace App\Modules\EncodedPartner\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class EncodedPartner extends Model
{
    use HasFactory;

    public function get_list($request){        
        $getData = DB::table('partner_info')->get();

        if($request->ajax()){
            return Datatables::of($getData)
                ->addIndexColumn()
                ->addColumn('status_verified', function($row){

                    $percentage = 0;
                    
                    $site = DB::table('partner_site')
                        ->select('site_id')
                        ->where('partner_id', $row->partner_id)
                        ->get();
                    
                    $verified_site = DB::table('partner_site')
                        ->select('site_id')
                        ->where('partner_id', $row->partner_id)
                        ->where('status','1')
                        ->get();

                    $count_site = count($site);
                    $count_verified_site = count($verified_site);

                    if($count_site > 0 && $count_verified_site > 0){                        
                        /** Get the Percentage of Verified Site */
                        $percentage = ($count_verified_site/$count_site) * 100;
                    }

                    // return $percentage . '%';
                    $percentage = $percentage . '%';
                    return '<div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: '.$percentage.'" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$percentage.'</div>
                        </div>';
                })
                ->rawColumns(['status_verified'])
                ->make(true);
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

    public function update_partner_status(){
        $partner_id = request('partner_id');
        $status = request('status');        
        $result = '';

        try{
            DB::beginTransaction();

            $update = DB::table('partner_info')
                ->where('partner_id', $partner_id)
                ->update(['status'=> $status == '1' ? '0' : '1']);

            /** Disable the partner site if the Partner will be disabled */
            if($status == 1) {                
                DB::table('partner_site')
                    ->where('partner_id', $partner_id)
                    ->update(['status'=> '0']);
            }
        
            /** Update */
            if($update){
                DB::commit();
                $result = ["result"=>true,"message"=> $status == 1 ? "Successfully disabled." : "Successfully enabled." ];
            }else{
                DB::rollback();
                $result = ["result"=>false,"message"=>$status == 1 ? "Failed disabled." : "Failed enabled." ];
            }

        } catch(\Exception $e){
            DB::rollback();
            $result = ["result"=>false,"message"=>$status == 1 ? "Failed disabled." : "Failed enabled." ,"error"=>$e->getMessage()];
        }

        return $result;
    }

    /** Get Partner Site list */
    public function get_list_site($request){        
        $partner_id = request('partner_id');       
        $getData = DB::table('vw_site')
            ->where('partner_id', $partner_id)
            ->get();

        if($request->ajax()){
            return Datatables::of($getData)
                ->make(true);
        }
        
        return $getData;
    }
    
    /** Update the status of the Partner Site */
    public function update_site_status(){
        $partner_id = request('partner_id');
        $site_id = request('site_id');
        $status = request('status');        
        $result = '';

        try{
            DB::beginTransaction();

            $update = DB::table('partner_site')
                // ->where('partner_id', $partner_id)
                ->where('site_id', $site_id)
                ->update(['status'=> $status == '1' ? '0' : '1']);
        
            /** Update */
            if($update){
                DB::commit();
                $result = ["result"=>true,"message"=> $status == 1 ? "Successfully disabled." : "Successfully enabled." ];
            }else{
                DB::rollback();
                $result = ["result"=>false,"message"=>$status == 1 ? "Failed disabled." : "Failed enabled." ];
            }

        } catch(\Exception $e){
            DB::rollback();
            $result = ["result"=>false,"message"=>$status == 1 ? "Failed disabled." : "Failed enabled." ,"error"=>$e->getMessage()];
        }

        return $result;
    }

}
