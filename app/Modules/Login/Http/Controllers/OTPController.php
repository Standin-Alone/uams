<?php

namespace App\Modules\Login\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Modules\Login\Models\OTP;
use Illuminate\Support\Facades\DB;
use App\Modules\Login\Models\Login;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Modules\Login\Models\Role_and_Permission;

class OTPController extends Controller
{
    public function __construct(Request $request)
    {
        $this->otpModel = new OTP;

        $this->roles_and_perms = new Role_and_Permission;
    }

    public function otp_page($uuid){
        $users_otp = DB::select('select * from user_otp where user_id = ?', [$uuid]);

        // return redirect()->route('otp_page', ['user_otp', $user_otp]);
        return view("Login::login_otp", compact('users_otp'));
    }

    public function verify_OTP_form(Request $request){
        $input_otp = $request->otp;
        $get_uuid = $request->user_uuid;
        $users_otp = $this->otpModel->get_otp_query($get_uuid);

        $perm_id = [];

        $no = 4;

        foreach($users_otp as $uOTP){
            if($uOTP->otp != $input_otp ){
                $error_response = ['error'=> true, 'message'=>'Invalid OTP!', 'auth'=>false];
                return response()->json( $error_response, 302); 
            }
            elseif($uOTP->otp == $input_otp){
                // Update OTP status "1" to status "0";
                $this->otpModel->update_otp_status_to_active($get_uuid);

                $users = $this->roles_and_perms->get_user_session($uOTP->user_id);
                
                // ==========  array of role_no of user(uuid)  ==========
                    $role_no_sets = $this->roles_and_perms->get_role_in_program_permission($get_uuid);

                    Session::put(['role_no_sets' => $role_no_sets]);
                // ==========  array of role_no of user(uuid)  ==========

                    // USER PROVINCE LIST
                    $user_prov_list = [];

                    // Query
                    $getUserProvince = $this->roles_and_perms->get_User_Province($uOTP->user_id);
                    
                    foreach ($getUserProvince as $key => $value) {
                            
                            $user_prov_list['prov_name'] = $value->prov_name;
                            $user_prov_list['prov_code'] = $value->prov_code;
                    }

                    Session::put(['user_prov_list'=>$user_prov_list]); 
                // ==========  Peter Session  ==========
   
                //  ==========  session for list of provinces under base on region
                $provinces_on_region = $this->roles_and_perms->get_reg_and_prov($get_uuid);
               
                Session::put(['provinces_on_region' => $provinces_on_region]);
                //  ==========  session for list of provinces under base on region

                
                // ==========  group by program with role  ==========  

                $get_reg = $this->roles_and_perms->get_region_geo_map($get_uuid);
                Session::put(['reg_reg' => $get_reg]);

                $permission_id = $this->roles_and_perms->get_sys_perm();
               
                $role_name_sets = [];
                
                

                foreach($users as $user){
                    Session::put('uuid', $user->user_id);
                    Session::put('email', $user->email);
                    Session::put('first_name', $user->first_name);
                    Session::put('middle_name', $user->middle_name);
                    Session::put('last_name', $user->last_name);
                    Session::put('ext_name', $user->ext_name);
                    Session::put('username', $user->username);

                    // get region name from "geo_region table"
                    Session::put('user_region_name', $user->region);
                    Session::put('geo_region_name', $user->reg_name);

                    // Region No., Province No., and Municipality No.
                    Session::put('region', $user->reg);
                    Session::put('province', $user->prov);
                    Session::put('municipality', $user->mun);

                    // Region name, Province name, and Municipality name
                    Session::put('region_name', $user->reg_name);
                    Session::put('province_name', $user->prov_name);
                    Session::put('municipality_name', $user->mun_name);

                    

                    // role
                    Session::put('role_id', $user->role_id);
                    Session::put('role', $user->role);

                    $role_name_sets[] = $user->role;                                                                                
                    $role_name[] = $user->role;

                    // PETER_DEV - ADDITIONAL SESSION
                    Session::put(['user_id'=>$user->user_id]); 
                    Session::put(['user_prv_code'=>$user->iso_prv]);                    
                    Session::put(['user_fullname'=>$user->first_name.' '.$user->middle_name.' '.$user->last_name.' '.$user->ext_name]);
                    Session::put(['reg_code'=>$user->reg]);                      
                   
                }

                // array of role name
                Session::put(['role_name_sets' => $role_name_sets]);
                

                // array of programs
                // Session::put(['programs_set' => $roles_and_perms->get_program_in_program_permission(Session::get('uuid'))]);

                // array of supplier id
                // Session::put(['supplier_ids_set' => $roles_and_perms->get_supplier_id(Session::get('uuid'))]);

                // dd(array_intersect(Session::get('role_no_sets'), [8, 11]));


                

                // array of list of roles
                Session::put(['list_of_roles' => $this->roles_and_perms->get_list_of_roles()]);

                

               // array of permission id's
                Session::put(['permission_id' => $permission_id]);

                // array of system permissions with module and role id
                // Session::put(['access_permission' => $this->roles_and_perms->get_permission($role_no_sets)]);

                Session::put(['main_modules'=>$this->roles_and_perms->get_main_module($role_no_sets)]);
                Session::put(['parent_modules'=>$this->roles_and_perms->get_parent_module()]);
                Session::put(['sub_modules'=>$this->roles_and_perms->get_sub_module($role_no_sets)]);

                Session::put(['session_param' => $this->roles_and_perms->get_user_session($uOTP->user_id)]);

                $otp_verified_response = ['success'=> true, 'message' => 'OTP is Valid!', 'auth' => false];
                return response()->json($otp_verified_response, 200);
            }
        }
        return view('Login::login_otp');
    }

    public function resend_otp(Request $request){
        $get_uuid = $request->user_uuid;
 
        $users = $this->otpModel->get_user_uuid($get_uuid);

        $role_sets = [];

        foreach($users as $user){
            $role = $user->role;
            $role_sets[] = $role;
            $resend_otp = $this->otpModel->generate_otp($user->user_id);
            $otp = $resend_otp['otp'];
            $date_created = $resend_otp['date_created']->toDateTimeString();
        }

        MailController::send_OTP_mail(
                                        $user->user_id, 
                                        $user->email, 
                                        $user->username, 
                                        $user->first_name, 
                                        $user->last_name, 
                                        $user->ext_name, 
                                        $role_sets, 
                                        $otp, 
                                        $date_created
                                    );

        $reset_otp_mail_success = ['success'=>true, 'message' => 'We send new OTP Pin through your email: "'.$user->email.'"', 'auth'=>false];
        return response()->json($reset_otp_mail_success, 200);
    }
}
