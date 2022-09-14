<?php

namespace App\Modules\TechnologyManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Modules\TechnologyManagement\Models\TechnologyManagement;
use Yajra\DataTables\Facades\DataTables;
class TechnologyManagementController extends Controller
{
   
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(){
        
        
        return view('TechnologyManagement::index');
        
    }

    public function get_records(){

        $get_records = TechnologyManagement::get_records();
        return datatables($get_records)->toJson();
    }

    public function add_technology(){

        $add_technology = TechnologyManagement::add_technology();
        
        return response()->json($add_technology);
    }

    public function update_technology(){

        $update_technology = TechnologyManagement::update_technology();
        
        return response()->json($update_technology);
    }

    public function set_status_technology(){

        $set_status_technology = TechnologyManagement::set_status_technology();
        
        return response()->json($set_status_technology);
    }

}   
