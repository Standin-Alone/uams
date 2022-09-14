<?php

namespace App\Modules\PartnerInfoModule\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerInfoModuleController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("PartnerInfoModule::welcome");
    }

    public function partner_info_form_view(){

        return view("PartnerInfoModule::index");

    }

    public function create_partner_info(){


    }

    public function update_partner_info(){



    }
}
