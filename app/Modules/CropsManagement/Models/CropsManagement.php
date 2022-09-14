<?php

namespace App\Modules\CropsManagement\Models;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Ramsey\Uuid\Uuid;
class CropsManagement extends Model
{

    public function get_records(){

        $get_records = db::table('lib_crop')->get();

        return $get_records;
    }

    public function add_crop(){

        $result = '';
        $uuid = Uuid::uuid4();
        try{
            DB::beginTransaction();
            $crop_english  = request('crop_english');
            $crop_tagalog  = request('crop_tagalog');
        
            $check_dup = db::table('lib_crop')->where('crop_english',$crop_english)->where('crop_tagalog',$crop_tagalog)->count();                        

            // Check Duplication
            if($check_dup == 0 ){

                $insert = db::table('lib_crop')
                                ->insert(["crop_english"=> $crop_english, "crop_tagalog" => $crop_tagalog,"crop_id"=>$uuid]);

                // INSERT
                if($insert){
                    DB::commit();

                    // AUDIT TRAIL
                    $action = "Added new record in crops management.";
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


    public function update_crop(){

        $result = '';
        $uuid = Uuid::uuid4();
        try{
            DB::beginTransaction();
            $crop_id  = request('crop_id');
            $crop_english  = request('crop_english');
            $crop_tagalog  = request('crop_tagalog');
            
            $update = db::table('lib_crop')
                            ->where('crop_id',$crop_id)
                            ->update(["crop_english"=> $crop_english, "crop_tagalog" => $crop_tagalog]);

            // Update
            if($update){
                DB::commit();

                
                // AUDIT TRAIL
                $action = "Updated the record in crops management.";
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
   
    
    public function set_status_crop(){

        $result = '';
     
        try{
            DB::beginTransaction();
            $crop_id  = request('crop_id');
            $status  = request('status');
   
            $set_status = db::table('lib_crop')
                            ->where('crop_id',$crop_id)
                            ->update(["status"=> $status == 1 ? 0 : 1]);

            // Set Status
            if($set_status){
                DB::commit();

                 // AUDIT TRAIL
                 $action =  $status == 1 ? "Disabled the record in crops management." : "Enabled the record in crops management."  ;
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
