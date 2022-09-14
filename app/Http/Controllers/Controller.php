<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Ramsey\Uuid\Uuid;
use DB;
class Controller extends BaseController
{
    public function index(){

        return view('auth.login');
    }

    public function error_page(){

        return view('404_error');
    }

    public function audit_trail($action){

        if(isset($action)){
            $uuid = Uuid::uuid4();
            db::table("audit_trail")->insert([
                "trail_id" => $uuid,
                "trail_action" => $action,
                "created_by_id" => session('uuid'),
                "created_by_name"=> session('first_name').' '.session('last_name')
            ]);
        }
    }
}
