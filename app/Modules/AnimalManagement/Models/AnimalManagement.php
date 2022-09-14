<?php

namespace App\Modules\AnimalManagement\Models;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Ramsey\Uuid\Uuid;
class AnimalManagement extends Model
{

    public function get_records(){

        $get_records = db::table('lib_animal')->get();

        return $get_records;
    }

    public function add_animal(){

        $result = '';
        $uuid = Uuid::uuid4();
        try{
            DB::beginTransaction();
            $animal_name  = request('animal_name');
      

            $check_dup = db::table('lib_animal')->where('animal_name',$animal_name)->count();                        

            // Check Duplication
            if($check_dup == 0 ){

                $insert = db::table('lib_animal')
                            ->insert(["animal_name"=> $animal_name,"animal_id"=>$uuid]);

                // INSERT
                if($insert){
                    
                    DB::commit();

                    // AUDIT TRAIL
                    $action = "Added new record in animal management.";
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


    public function update_animal(){

        $result = '';
        $uuid = Uuid::uuid4();
        try{
            DB::beginTransaction();
            $animal_id  = request('animal_id');
            $animal_name  = request('animal_name');
            
            $update = db::table('lib_animal')
                            ->where('animal_id',$animal_id)
                            ->update(["animal_name"=> $animal_name]);

            // Update
            if($update){
                // AUDIT TRAIL
                $action = "Updated the record in animal management.";
                Controller::audit_trail($action);
                DB::commit();
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
   
    
    public function set_status_animal(){

        $result = '';
     
        try{
            DB::beginTransaction();
            $animal_id  = request('animal_id');
            $status  = request('status');
   
            $set_status = db::table('lib_animal')
                            ->where('animal_id',$animal_id)
                            ->update(["status"=> $status == 1 ? 0 : 1]);

            // Set Status
            if($set_status){
               
                DB::commit();

                 // AUDIT TRAIL
                 $action =  $status == 1 ? "Disabled the record in animal management." : "Enabled the record in animal management."  ;
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
