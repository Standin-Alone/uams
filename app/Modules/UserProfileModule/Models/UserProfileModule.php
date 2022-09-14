<?php

namespace App\Modules\UserProfileModule\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\UserProfileModule\Http\Controllers\MailController;

class UserProfileModule extends Model
{
    use HasFactory;

    public function show_user_details($uuid){

        $query = DB::table('user_access as ua')
                        ->select('ua.user_id', 'ua.role_id', 'u.email', 'u.contact_no', 'ua.status', 'r.role')
                        ->leftJoin('roles as r', 'r.role_id', '=', 'ua.role_id')
                        ->leftJoin('users as u', 'u.user_id', '=', 'ua.user_id')
                        ->where('ua.user_id', '=', $uuid)
                        ->groupBy('u.user_id')
                        ->get();

        return $query;

    }

    public function get_user_email($uuid){

        $query = DB::table('users as u')
                        ->select('u.email')
                        ->where('u.user_id', '=', $uuid)
                        ->first();

        return $query;

    }

    public function get_user($uuid){

        $query = DB::table('user_access as ua')
                        ->select('u.user_id', 'u.email', 'u.password', 'u.password_reset_status', 'u.username', 'u.first_name', 'u.last_name', 'u.ext_name', 'u.contact_no', 'r.role')
                        ->leftJoin('roles as r', 'r.role_id', '=', 'ua.role_id')
                        ->leftJoin('users as u', 'u.user_id', '=', 'ua.user_id')
                        ->where('ua.user_id', '=', $uuid)
                        ->groupBy('ua.user_id', 'ua.role_id')
                        ->get();

        return $query;

    }

    // find user password by uuid
    public function find_user_password($uuid){

        $query = DB::table('user_access as ua')
                        ->select('u.user_id', 'u.email', 'u.username', 'u.first_name', 'u.last_name', 'u.ext_name', 'u.password', 'u.password_reset_status', 'r.role')
                        ->leftJoin('roles as r', 'r.role_id', '=', 'ua.role_id')
                        ->leftJoin('users as u','u.user_id', '=', 'ua.user_id')
                        ->where('ua.user_id', '=', $uuid)
                        ->groupBy('ua.user_id', 'ua.role_id')
                        ->get();
    
        return $query;
    
    }

    public function update_email($uuid, $email){

        $query = DB::update('update users set email = ? where user_id = ?', [$email, $uuid]);
            
        return $query;

    }

    public function update_contact($uuid, $contact){

        $query = DB::update('update users set contact_no = ? where user_id = ?', [$contact, $uuid]);
        
        return $query;

    }

    public function update_all_info($uuid, $email, $contact){

        $query = DB::update('update users set email = ?, contact_no = ? where user_id = ?', [$email, $contact, $uuid]);

        return $query;

    }

    public function email_update_info($uuid, $email, $username, $firstname, $lastname, $extname, $contact, $role, $date_created){

        $query = MailController::send_update_info($uuid, $email, $username, $firstname, $lastname, $extname, $contact, $role, $date_created);

        return $query;

    }

    public function email_confirm_password($uuid, $email, $username, $firstname, $lastname, $extname, $role, $date_created){
        
        $query = MailController::send_confirmation_update_password($uuid, $email, $username, $firstname, $lastname, $extname, $role, $date_created);

        return $query;

    }

    public $timestamps = false;
}
