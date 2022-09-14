<?php

namespace App\Modules\UserProfileModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Modules\UserProfileModule\Models\UserProfileModule;

class UserProfileModuleController extends Controller
{
    public function __construct(Request $request)
    {
        $this->UserProfileModel = new UserProfileModule;

        // $this->middleware('session.module');
    }

    public function index(){

        $uuid = session()->get('uuid');

        $user_info = $this->UserProfileModel->show_user_details($uuid);

        if(request()->ajax()){
            return DataTables::of($this->UserProfileModel->show_user_details($uuid))->make(true);
        }

        return view("UserProfileModule::index", ["user_info"=>$user_info]);

    }

    public function user_information(Request $request){

        $email = $request->email;
        $contact = $request->contact;

        $user_id        = session()->get('uuid');
        $username       = session()->get('username');
        $first_name     = session()->get('first_name');
        $last_name      = session()->get('last_name');
        $ext_name       = session()->get('ext_name'); 
        $role           = session()->get('role');

        $date_created = Carbon::now('GMT+8')->toDateTimeString();

        DB::beginTransaction();

        try{
            if((!empty($email) == true) && (($contact == null) == true)){
        
                // Update Email only
                DB::table('users')->where('user_id', '=', $user_id)->update(['email' => $email]);

                $contact = session()->get('contact_no');

                // send update of email and contact no. to user registered email address
                $this->UserProfileModel->email_update_info($user_id, $email, $username, $first_name, $last_name, $ext_name, $contact, $role, $date_created);

                DB::commit();
    
                $success_response = ['success'=> true, 'message' => 'The new email info has been saved!', 'auth' => false];
                return response()->json($success_response, 200);
            }
            else if((!empty($contact) == true) && (($email == null) == true)){
                // Update Contact No only.
                DB::table('users')->where('user_id', $user_id)->update(['contact_no' => $contact]);

                $get_email = $this->UserProfileModel->get_user_email($user_id);

                // send update of email and contact no. to user registered email address
                $this->UserProfileModel->email_update_info($user_id, $get_email->email, $username, $first_name, $last_name, $ext_name, $contact, $role, $date_created);


                DB::commit();
    
                $success_response = ['success'=> true, 'message' => 'The new contact info has been saved!', 'auth' => false];
                return response()->json($success_response, 200);
            }
            else if((!empty($email) == true) && (!empty($contact) == true)){
                // Update Email and Contact No.
                $this->UserProfileModel->update_all_info(session()->get('uuid'), $email, $contact);
    
                $users = $this->UserProfileModel->get_user(session()->get('uuid'));
    
                foreach($users as $user){
                    $user_id        = $user->user_id;
                    $email          = $user->email; 
                    $username       = $user->username;                                                         
                    $first_name     = $user->first_name; 
                    $last_name      = $user->last_name;
                    $ext_name       = $user->ext_name; 
                    $contact        = $user->contact_no; 
                    $role_sets      = $user->role;
                    $date_created   = Carbon::now('GMT+8')->toDateTimeString();
    
                    // send update on email and contact no. to email
                    $this->UserProfileModel->email_update_info($user_id, $email, $username, $first_name, $last_name, $ext_name, $contact, $role_sets, $date_created);
                }

                DB::commit();
    
                $success_response = ['success'=> true, 'message' => 'The new info has been saved!', 'auth' => false];
                return response()->json($success_response, 200);
            }
            else{
                $error_response = ['error'=> true, 'message'=>"All input field are empty!", 'auth'=>false];
                return response()->json($error_response, 302);
            }
        }
        catch(\Exception $e){
            DB::rollback();

            $error_response = ['error'=> true, 'icon'=>'info', 'message' => "Error! ", 'system_error'=>$e->getMessage(), 'auth'=>false];
            return response()->json($error_response, 302);
        }

    }

    public function password(Request $request){

        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;

        $users_uuid = $this->UserProfileModel->find_user_password(session()->get('uuid'));

        DB::beginTransaction();

        try{
            foreach($users_uuid as $user_uuid){
                if(Hash::check($current_password, $user_uuid->password)){
                    
                    // check if the new password and confirm password is equal
                    if($new_password == $confirm_password){
                        DB::table('users')->where('user_id', $user_uuid->user_id)->update(['password' => bcrypt($confirm_password)]);
    
                        $user_id        = $user_uuid->user_id;
                        $email          = $user_uuid->email; 
                        $username       = $user_uuid->username;                                                         
                        $first_name     = $user_uuid->first_name; 
                        $last_name      = $user_uuid->last_name;
                        $ext_name       = $user_uuid->ext_name; 
                        $role_sets      = $user_uuid->role;
                        $date_created   = Carbon::now('GMT+8')->toDateTimeString();
        
                        // send confirmation update password to user registered email address
                        $this->UserProfileModel->email_confirm_password($user_id, $email, $username, $first_name, $last_name, $ext_name, $role_sets,$date_created);
        
                        DB::commit();

                        $success_response = ['success'=> true, 'message' => 'The new password has been saved!', 'auth' => false];
                        return response()->json($success_response, 200);
                    }
                    else{
                        $error_response = ['error'=> true, 'message'=>"The confirm password does not match!", 'auth'=>false];
                        return response()->json($error_response, 302);
                    }
                }
                else{
                    $error_response = ['error'=> true, 'message'=>"The current password is incorrect!", 'auth'=>false];
                    return response()->json($error_response, 302);
                }
            }
        }
        catch(\Exception $e){
            DB::rollback();

            $error_response = ['error'=> true, 'icon'=>'info', 'message' => 'ERROR!', 'system_error'=>$e->getMessage(), 'auth'=>false];
            return response()->json($error_response, 302);
        }
    }
}
