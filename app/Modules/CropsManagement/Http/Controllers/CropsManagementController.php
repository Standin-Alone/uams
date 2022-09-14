<?php

namespace App\Modules\CropsManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Modules\CropsManagement\Models\CropsManagement;
use Yajra\DataTables\Facades\DataTables;
class CropsManagementController extends Controller
{
   
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(){
        
        
        return view('CropsManagement::index');
        
    }

    public function get_records(){

        $get_records = CropsManagement::get_records();
        return datatables($get_records)->toJson();
    }

    public function add_crop(){

        $add_crop = CropsManagement::add_crop();
        
        return response()->json($add_crop);
    }

    public function update_crop(){

        $update_crop = CropsManagement::update_crop();
        
        return response()->json($update_crop);
    }

    public function set_status_crop(){

        $set_status_crop = CropsManagement::set_status_crop();
        
        return response()->json($set_status_crop);
    }

}   
