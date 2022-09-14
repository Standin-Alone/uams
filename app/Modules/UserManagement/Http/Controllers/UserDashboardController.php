<?php

namespace App\Modules\UserManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Ramsey\Uuid\Uuid;
use Mail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
class UserDashboardController extends Controller
{
   
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(){
        
        return view("UserManagement::user-dashboard");
                    
    }


}   
