<?php

namespace App\Modules\AuditTrail\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\AuditTrail\Models\AuditTrail;
use DB;
use Ramsey\Uuid\Uuid;

use Yajra\DataTables\Facades\DataTables;
class AuditTrailController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("AuditTrail::index");
    }

    public function get_trail()
    {
        $get_trail = AuditTrail::get_trail();

        return datatables($get_trail)->toJson();
    }
}
