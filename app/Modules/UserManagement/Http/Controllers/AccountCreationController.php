<?php

namespace App\Modules\UserManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Ramsey\Uuid\Uuid;
use Mail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Modules\UserManagement\Models\UserManagement;
use App\Models\GlobalNotificationModel;
use Yajra\DataTables\Facades\DataTables;
use App\Modules\Login\Models\OTP;
use Carbon\Carbon;
class AccountCreationController extends Controller
{
   
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
  
    public function account_creation_index($user_id){
        
        $clean_user_id = base64_decode($user_id);        
        $get_regions = db::table('geo_map')->select('reg_code','reg_name')->distinct()->get();
        
        $get_roles = db::table('roles')->where('rfo_use','0')->get();        

        $check_user = db::table('users as u')
                            ->leftJoin('user_access as ua','u.user_id','ua.user_id')                            
                            ->leftJoin('roles as r','r.role_id','ua.role_id')                            
                            ->where('u.user_id',$clean_user_id)                            
                            ->first();
        $check_user_access = db::table('user_access')->where('user_id',$clean_user_id)->first();


        if(isset($check_user->is_created) &&  $check_user->is_created == '0' ){
            return view("UserManagement::account-creation",compact('get_regions','get_roles','user_id','clean_user_id','check_user','check_user_access'));
        }else{
            return view("UserManagement::404_error");
        }
    
        
    }


    
    public function privacy_policy(){
        
   
            return view("UserManagement::privacy-policy");
        
    
        
    }


    public function send_account_creation_link(){
        $result = '';
        $user_id = Uuid::uuid4();
        $email = request('email');        
        $base64_user_id = base64_encode($user_id);
        $url =  url('/user/account-creation/'.$base64_user_id);   
        $role = request('role');

        try{
        DB::beginTransaction();

        $create_account = db::table('users')->insert([
            'user_id'  => $user_id,
            'email'    => $email,
            'username' => $email,
            'status'   => '3'
        ]);
    
        $create_user_access = db::table('user_access')                
        ->insert([
            'user_id'=>$user_id,
            "role_id" => $role,                      
        ]);
        
        
      
            Mail::send('UserManagement::account-creation-email', ["link" => $url], function ($message) use ($email) {
                $message->to($email)->subject('User Account Creation Link');                
            }); 
            if(count(Mail::failures()) == 0 ){
                if($create_account && $create_user_access ){
                    // AUDIT TRAIL
                    $action = "Successfully sent account creation link to email {$email}.";
                    Controller::audit_trail($action);

                    $result = ['message'=>'Successfully send a link.','result'=>'success'];
                } else{
                     // AUDIT TRAIL
                     $action = "Failed to send account creation link to email {$email}.";
                     Controller::audit_trail($action);

                    $result = ['message'=>'Failed to send a link.','result'=>'error'];
                }  
            }else{
                 // AUDIT TRAIL
                 $action = "Failed to send account creation link to email {$email}.";
                 Controller::audit_trail($action);
                $result = ['message'=>'Failed to send a link.','result'=>'error'];
            }
        DB::commit();
        return json_encode($result);
    }catch(\Exception $e){

        DB::rollBack();
        $result = ['message'=>'Failed to send a link.','result'=>'error'];

        return json_encode($result);
    }

    }


    
    public function send_recovery_link(){
        $result = '';
        $user_id = request('user_id');
        $email = request('email');
        $base64_user_id = base64_encode($user_id);
        $url =  url('/user/account-creation/'.$base64_user_id);   

        Mail::send('UserManagement::account-creation-email', ["link" => $url], function ($message) use ($email) {
            $message->to($email)->subject('User Account Creation Link');                
        }); 
        if(count(Mail::failures()) == 0 ){
            // AUDIT TRAIL
            $action = "Successfully resend account creation link to email {$email}.";
            Controller::audit_trail($action);

            $result = ['message'=>'Successfully send a link.','result'=>'success'];
            
        }else{
            // AUDIT TRAIL
            $action = "Failed to resend account creation link to email {$email}.";
            Controller::audit_trail($action);

            $result = ['message'=>'Failed to send a link.','result'=>'error'];
        }


        return response()->json($result);

    }



    public function filter_province($region_code)
    {       
        $get_province = db::table('geo_map')
                            ->select('prov_code','prov_name')
                            ->where('reg_code',$region_code)
                            ->distinct()->get();
        return json_encode($get_province);
    }


    public function filter_municipality($region_code,$province_code)
    {       
        $get_municipality = db::table('geo_map')
                            ->select('mun_code','mun_name')
                            ->where('reg_code',$region_code)
                            ->where('prov_code',$province_code)
                            ->distinct()->get();
        return json_encode($get_municipality);
    }

    public function filter_barangay($region_code,$province_code,$municipality_code)
    {       
        $get_barangay = db::table('geo_map')
                            ->select('bgy_code','bgy_name')
                            ->where('reg_code',$region_code)
                            ->where('prov_code',$province_code)
                            ->where('mun_code',$municipality_code)
                            ->distinct()->get();
        return json_encode($get_barangay);
    }

    public function filter_role($agency_loc)
    {       
        $get_roles = db::table('roles')                          
                            ->where('rfo_use',($agency_loc == 'RFO' ? '1' : '0' ) )
                            ->whereNotIn('role_id',$agency_loc == 'RFO' ? [5,6,7,9,11,12,16,17] : [14,15,3,13]  )
                            ->get();
        return json_encode($get_roles);
    }

    public function store(){

        $result = '';
        
        try{
            DB::beginTransaction();

            $user_id         = request('user_id');            
            $first_name     = request('first_name');
            $middle_name    = request('middle_name');
            $last_name      = request('last_name');
            $ext_name       = request('ext_name');
            $email          = request('email');
            $contact        = request('contact');                    
                     
            $region         = request('region');
            $province       = request('province');
            $municipality   = request('municipality');
            $barangay       = request('barangay');
            $password       = request('password');
            
            $geo_code = db::table('geo_map')
                            ->where('reg_code',$region)
                            ->where('prov_code',$province)
                            ->where('mun_code',$municipality)   
                            ->where('bgy_code',$barangay)
                            ->first();
            if($geo_code){
                db::table('users')
                        ->where('user_id',$user_id)
                        ->update([
                                'is_created' => '1',                                
                                'password'  => bcrypt($password),                                        
                                // 'geo_code'  => $geo_code->geo_code,
                                'reg' =>$region,
                                'prov' =>$province,
                                'mun' =>$municipality,
                                'bgy' =>$barangay,
                                'first_name' => $first_name,
                                'middle_name' => $middle_name,
                                'last_name' => $last_name,
                                'ext_name' => $ext_name,
                                'contact_no' => $contact,
                                'first_login' =>'0',
                                'status'   => '1',
                                'date_created' => Carbon::now('GMT+8')->toDateTimeString()
                ]);
            
            
           
                
                // AUDIT TRAIL
                $trail_uuid = Uuid::uuid4();
                $action = "Email {$email} successfully created account.";

                db::table("audit_trail")->insert([
                    "trail_id" => $trail_uuid,
                    "trail_action" => $action,
                    "created_by_id" => $user_id,
                    "created_by_name"=> "{$first_name} {$last_name}"
                ]);

                $result = json_encode(['message'=>'Successfully created your account.You will redirect to Login Page','result'=>'success']);
                DB::commit();
            }else{
                DB::rollback();
                 // AUDIT TRAIL
                 $trail_uuid = Uuid::uuid4();
                 $action = "Failed to create account.";
 
                 db::table("audit_trail")->insert([
                     "trail_id" => $trail_uuid,
                     "trail_action" => $action,
                     "created_by_id" => $user_id,
                     "created_by_name"=> "{$first_name} {$last_name}"
                 ]);

                $result = json_encode(['message'=>'','result'=>'error']);
            }

           
        }catch(\Exception $e){
            DB::rollback();

            // AUDIT TRAIL
            $trail_uuid = Uuid::uuid4();
            $action = $e->getMessage();

            db::table("audit_trail")->insert([
                "trail_id" => $trail_uuid,
                "trail_action" => $action,
                "created_by_id" => $user_id,
                "created_by_name"=> "{$first_name} {$last_name}"
            ]);


            return json_encode(['message'=>'Something went wrong','result'=>'error',"err"=>$e->getMessage()]);
        }
        return $result;
        
    }


}   
