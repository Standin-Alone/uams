<?php

namespace App\Modules\OrganizationManagement\Models;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Ramsey\Uuid\Uuid;
class OrganizationManagement extends Model
{

    public function get_records(){

        $get_records = db::table('lib_organization')->get();

        return $get_records;
    }

    public function add_organization(){

        $result = '';
        $uuid = Uuid::uuid4();
        try{
            DB::beginTransaction();
            $org_name  = request('org_name');
      
            
            $insert = db::table('lib_organization')
                            ->insert(["org_name"=> $org_name,"org_id"=>$uuid]);

            $check_dup = db::table('lib_organization')->where('org_name',$org_name)->count();                        

            // Check Duplication
            if($check_dup == 0 ){

                // INSERT
                if($insert){
                    DB::commit();
                    // AUDIT TRAIL
                    $action = "Added new record in organization management.";
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


    public function update_organization(){

        $result = '';
        $uuid = Uuid::uuid4();
        try{
            DB::beginTransaction();
            $org_id  = request('org_id');
            $org_name  = request('org_name');
            
            $update = db::table('lib_organization')
                            ->where('org_id',$org_id)
                            ->update(["org_name"=> $org_name]);

            // Update
            if($update){
                DB::commit();
                // AUDIT TRAIL
                $action = "Updated the record in organization management.";
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
   
    
    public function set_status_organization(){

        $result = '';
     
        try{
            DB::beginTransaction();
            $org_id  = request('org_id');
            $status  = request('status');
   
            $set_status = db::table('lib_organization')
                            ->where('org_id',$org_id)
                            ->update(["status"=> $status == 1 ? 0 : 1]);

            // Set Status
            if($set_status){
                DB::commit();
                  // AUDIT TRAIL
                 $action =  $status == 1 ? "Disabled the record in organization management." : "Enabled the record in organization management."  ;
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
