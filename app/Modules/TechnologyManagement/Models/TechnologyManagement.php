<?php

namespace App\Modules\TechnologyManagement\Models;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Ramsey\Uuid\Uuid;
class TechnologyManagement extends Model
{

    public function get_records(){

        $get_records = db::table('lib_technology')->get();

        return $get_records;
    }

    public function add_technology(){

        $result = '';
        $uuid = Uuid::uuid4();
        try{
            DB::beginTransaction();
            $tech_desc  = request('tech_desc');
            

            $check_dup = db::table('lib_technology')->where('tech_desc',$tech_desc)->count();                        

            // Check Duplication
            if($check_dup == 0 ){
            
                $insert = db::table('lib_technology')
                            ->insert(["tech_desc"=> $tech_desc,"tech_id"=>$uuid]);

                // INSERT
                if($insert){
                    DB::commit();
                    // AUDIT TRAIL
                    $action = "Added new record in technology management.";
                    Controller::audit_trail($action);

                    $result = ["result"=>true,"message"=>"Successfully added."];
                }else{
                    DB::rollback();
                    $result = ["result"=>false,"message"=>"Failed to add."];
                }
            }else{
                $result = ["result"=>false,"message"=>"This record has duplicate."];
            }

        }catch(\Exception $e){
            DB::rollback();

            $result = ["result"=>false,"message"=>"Failed to add.","error"=>$e->getMessage()];
        }

        return $result;
        
    }


    public function update_technology(){

        $result = '';
        $uuid = Uuid::uuid4();
        try{
            DB::beginTransaction();
            $tech_id  = request('tech_id');
            $tech_desc  = request('tech_desc');
            
            $update = db::table('lib_technology')
                            ->where('tech_id',$tech_id)
                            ->update(["tech_desc"=> $tech_desc]);

            // Update
            if($update){
                DB::commit();

                // AUDIT TRAIL
                $action = "Updated the record in technology management.";
                Controller::audit_trail($action);

                $result = ["result"=>true,"message"=>"Successfully updated."];
            }else{
                DB::rollback();
                $result = ["result"=>false,"message"=>"Failed to update."];
            }
            

        }catch(\Exception $e){
            DB::rollback();

            $result = ["result"=>false,"message"=>"Failed to updated.","error"=>$e->getMessage()];
        }

        return $result;
        
    }
   
    
    public function set_status_technology(){

        $result = '';
     
        try{
            DB::beginTransaction();
            $tech_id  = request('tech_id');
            $status  = request('status');
   
            $set_status = db::table('lib_technology')
                            ->where('tech_id',$tech_id)
                            ->update(["status"=> $status == 1 ? 0 : 1]);

            // Set Status
            if($set_status){
                DB::commit();
                // AUDIT TRAIL
                $action =  $status == 1 ? "Disabled the record in technology management." : "Enabled the record in technology management."  ;
                Controller::audit_trail($action);
                $result = ["result"=>true,"message"=> $status == 1 ? "Successfully disabled." : "Successfully enabled." ];
            }else{
                DB::rollback();
                $result = ["result"=>false,"message"=>$status == 1 ? "Failed disabled." : "Failed enabled." ];
            }
            

        }catch(\Exception $e){
            DB::rollback();

            $result = ["result"=>false,"message"=>$status == 1 ? "Failed disabled." : "Failed enabled." ,"error"=>$e->getMessage()];
        }

        return $result;
        
    }
}
