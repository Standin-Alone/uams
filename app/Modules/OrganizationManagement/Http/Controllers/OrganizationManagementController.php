<?php

namespace App\Modules\OrganizationManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Modules\OrganizationManagement\Models\OrganizationManagement;
use Yajra\DataTables\Facades\DataTables;
class OrganizationManagementController extends Controller
{
   
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(){
        
        
        return view('OrganizationManagement::index');
        
    }

    public function get_records(){

        $get_records = OrganizationManagement::get_records();
        return datatables($get_records)->toJson();
    }

    public function add_organization(){

        $add_organization = OrganizationManagement::add_organization();
        
        return response()->json($add_organization);
    }

    public function update_organization(){

        $update_organization = OrganizationManagement::update_organization();
        
        return response()->json($update_organization);
    }

    public function set_status_organization(){

        $set_status_organization = OrganizationManagement::set_status_organization();
        
        return response()->json($set_status_organization);
    }

}   
