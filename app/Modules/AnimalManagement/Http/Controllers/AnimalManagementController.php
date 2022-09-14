<?php

namespace App\Modules\AnimalManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Modules\AnimalManagement\Models\AnimalManagement;
use Yajra\DataTables\Facades\DataTables;
class AnimalManagementController extends Controller
{
   
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(){
        
        
        return view('AnimalManagement::index');
        
    }

    public function get_records(){

        $get_records = AnimalManagement::get_records();
        return datatables($get_records)->toJson();
    }

    public function add_animal(){

        $add_animal = AnimalManagement::add_animal();
        
        return response()->json($add_animal);
    }

    public function update_animal(){

        $update_animal = AnimalManagement::update_animal();
        
        return response()->json($update_animal);
    }

    public function set_status_animal(){

        $set_status_animal = AnimalManagement::set_status_animal();
        
        return response()->json($set_status_animal);
    }

}   
