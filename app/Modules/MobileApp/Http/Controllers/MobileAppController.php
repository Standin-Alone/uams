<?php

namespace App\Modules\MobileApp\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\MobileApp\Models\MobileApp;
class MobileAppController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("MobileApp::welcome");
    }

    public function login(){
        return MobileApp::login();        
    }
    
}
