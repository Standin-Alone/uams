<?php

namespace App\Modules\Login\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Modules\Login\Models\OTP;
use Illuminate\Support\Facades\DB;
use App\Modules\Login\Models\Login;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Modules\Login\Http\Controllers\MailController;

class LoginController extends Controller
{
    public function __construct(Request $request)
    {
        $this->loginModel = new Login;

        $this->otpModel = new OTP;
    }

    /**
     * View: login_page.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        /**
         * 1.) Check if the user session is active
         *     go to user session dashboard page.
         * 2.) else return to login page 
         */ 
        if(Session::has('email')){
            return redirect()->route("main.home");
        }
        return view("Login::login_page");
    }

    public function go_to_login(){
        return redirect()->route("main.page");
    }

    /**
     * Action: when user click "Sign me in"
     */
    public function login_action(Request $request){

        $email = $request->email;
        $password = $request->password;

        try {
                // check email if exists
                $check_email = $this->loginModel->check_email($email);
                
                // get user
                $users = $this->loginModel->get_user_access_query($email);
                if($check_email == true){
                    foreach($users as $user){
                        if (Hash::check($password, $user->password)) {
        
                            // Check if status is Active
                            if($user->status == 1){
                                // Generate new OTP
                                $generate_otp   = $this->otpModel->generate_otp($user->user_id);
                                $otp            = $generate_otp['otp'];
                                $date_created   = $generate_otp['date_created'];

                                $role_sets = $user->role;
                        
                                // send otp to email
                                $this->loginModel->email_otp(
                                                                $user->user_id, 
                                                                $email,
                                                                $user->username,
                                                                $user->first_name,
                                                                $user->last_name, 
                                                                $user->ext_name,
                                                                $role_sets,
                                                                $otp,
                                                                $date_created
                                                            );
                            
                                $otp_mail_success = ['success'=>true, 'message'=>'OTP has been sent to your email: "'.$email.'"', 'uuid'=>$user->user_id, 'auth'=>false];
                                return response()->json($otp_mail_success, 200);
        
                            // Check if status is InActive
                            }elseif($user->status == 0){
                                Auth::logout();
                                Session::flush();
                                $error_response = ['error'=> true, 'icon'=>'info', 'message'=>'Error! The account is <b>"INACTIVE"</b>. Please contact your administrator.', 'auth'=>false];
                                return response()->json($error_response, 302);
        
                            // Check if Status is Block
                            }elseif($user->status == 2){
                                Auth::logout();
                                Session::flush();
                                $error_response = ['error'=> true,  'icon'=>'info', 'message'=>'Error! The account is <b>"BLOCK"</b>. Please contact your administrator.', 'auth'=>false];
                                return response()->json($error_response, 302);
                            }
                        }   
                        else{
                            Auth::logout();
                            Session::flush();
                            $error_response = ['error'=> true,  'icon'=>'info', 'message'=>"The email or password is incorrect!", 'auth'=>false];
                            return response()->json($error_response, 302);
                        } 
                    }
                }
                else{
                    Auth::logout();
                    Session::flush();
                    $error_response = ['error'=> true, 'message'=>"The email: '".$email."' doesn't exists!", 'auth'=>false];
                    return response()->json($error_response, 302);
                } 
        
                return view("Login::login_otp");
        } catch (\Exception $e) {

            $error_response = ['error'=> true, 'icon'=>'info', 'message'=>'Error!', 'system_error'=>$e->getMessage(), 'auth'=>false];
            return response()->json($error_response, 302);

        }


    }

    /**
     * View: send_mail.blade.php
     */
    public function show_link_request_form(){
        return view("Login::password.send_email");
    }

    /**
     * Action: when user click "Send Reset Password Link"
     */
    public function send_btn_link_req_form(Request $request){

        // get requested email
        $email = $request->email;

        // check email if exists
        $check_email = $this->loginModel->check_email($request->email);

        // get user
        $get_user = $this->loginModel->get_user_access_query($request->email);
        
         // check if the user or user email exists
        if($check_email == true){
            foreach($get_user as $user){
                if($email == $user->email){

                    // User credentials for sending email notification
                    $uuid           = $user->user_id;
                    $email          = $user->email;
                    $username       = $user->username;
                    $firstname      = $user->first_name;
                    $lastname       = $user->last_name;
                    $extname        = $user->ext_name;
                    $role_sets      = $user->role;
                    $date_created   = Carbon::now('GMT+8')->toDateTimeString();

                    // Change password_reset_status to "1"
                    $this->loginModel->reset_status_active($uuid, $date_created);

                    // send reset link to email
                    $this->loginModel->email_reset_link($uuid, $email, $username, $firstname, $lastname, $extname, $role_sets, $date_created);
                    $success_response = ['success'=> true, 'message' => 'The reset password link is has been sent to your email: "'.$email.'".', 'auth' => false];
                    return response()->json($success_response, 200);
                }
                else{
                    $error_response = ['error'=> true, 'message'=>'The input email is incorrect', 'auth'=>false];
                    return response()->json($error_response, 302);
                }
            }
        }
        else{
            $error_response = ['error'=> true, 'message'=>"The email doesn't exists!", 'auth'=>false];
            return response()->json($error_response, 302);
        }
    }

    /**
     * View: change_password_page.blade.php
     */
    public function change_password_form($uuid){

        try {
                $users = $this->loginModel->get_user_id_and_password_status($uuid);
                
                foreach($users as $user){
           
                    if($this->loginModel->check_password_expiration($user->password_expired_status) == true){

                        DB::table('users')->where('user_id', $uuid)->update(['password_reset_status' => 0]);

                        return view("Login::404_error");

                    }
                    elseif(($this->loginModel->check_password_expiration($user->password_expired_status) == false) && $user->password_reset_status == 1){

                        return view("Login::password.change_password_page", ['user'=>$user]);

                    }
                    elseif($user->password_expired_status == null && $user->password_reset_status == 0){

                        return view("Login::404_error");

                    }

                }
        } catch (\Exception $e) {

            $msg_error = ['error'=> true, 'icon'=>'info', 'message'=>$e->getMessage(), 'auth'=>false];
            return response()->json($msg_error, 302);

        }

    }

    public function update_password(Request $request, $uuid){
 
        // $old_pwd = $request->old_password;
        $new_pwd = $request->new_password;

        DB::beginTransaction();

        try{
            $get_user = $this->loginModel->find_user_password($uuid);

            foreach($get_user as $user){

                // Update user password
                DB::table('users')->where('user_id', $uuid)->update(['password' => bcrypt($new_pwd), 'password_reset_status' => 0, 'password_expired_status' => NULL]);

                // User credentials for sending email notification
                $uuid           = $user->user_id;
                $email          = $user->email;
                $username       = $user->username;
                $firstname      = $user->first_name;
                $lastname       = $user->last_name;
                $extname        = $user->ext_name;
                $role_sets      = $user->role;
                $date_created   = Carbon::now('GMT+8')->toDateTimeString();
    
                // send confirmation update password to email
                $this->loginModel->email_confirm_password($uuid, $email, $username, $firstname, $lastname, $extname, $role_sets, $date_created);
    
                DB::commit();
                
                $success_response = ['success'=> true, 'message' => 'The new password is has been saved!', 'auth' => false];
                return response()->json($success_response, 200);
    
            }
        }catch(\Exception $e){
            DB::rollback();

            $msg_error = ['error'=> true, 'icon'=>'info', 'message'=>$e->getMessage(), 'auth'=>false];
            return response()->json($msg_error, 302);
        }

    }

    public function logout_action(){
        if(Session::has('uuid')){
            $this->otpModel->update_otp_status_to_active(Session::get('uuid'));
            Session::flush();
        }

        return redirect()->route("main.page");
    }
}
