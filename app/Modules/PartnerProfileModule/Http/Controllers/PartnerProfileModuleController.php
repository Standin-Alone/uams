<?php

namespace App\Modules\PartnerProfileModule\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Modules\PartnerProfileModule\Models\PartnerProfileModule;

class PartnerProfileModuleController extends Controller
{
    public function __construct(Request $request)
    {
        $this->PartnerProfileModel = new PartnerProfileModule;
    }


    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("PartnerProfileModule::welcome");
    }

    public function partner_profile_index(Request $request, $uuid){
        
        // GET PARTNER PROFILE QUERY in PARTNER PROFILE MODEL
        $get_partner_profile = $this->PartnerProfileModel->get_partner_profile_query($uuid);

        // // DATATABLE
        // if($request->ajax()){
        //     return DataTables::of($this->PartnerProfileModel->get_partner_profile_query($uuid))
        //     ->addColumn('action', function($row){
        //         $return = '<a href="'.url('/partner-profile/site_info/'.$row->partner_id.'/'.$row->site_id).'" 
        //                     id="viewBtn" type="button" class="btn btn-xs btn-outline-info" 
        //                     data-partner_id="'.$row->partner_id.'" data-site_id="'.$row->site_id.'" data-toggle="modal" data-target="#site_info_modal">
        //                     <i class="fa fa-eye"></i> Setup
        //                 </a>';

        //         return $return;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // }

        // GET IMAGE OF FARM


        // RETURN VIEW
        return view("PartnerProfileModule::index", ["get_partner_profile" => $get_partner_profile]);

    }

    // public function view_site_info($partner_id, $site_id){

    //     $get_site_info = $this->PartnerProfileModel->get_partner_site_query($partner_id, $site_id);

    //     // return response()->json($get_site_info);

    //     return view("PartnerProfileModule::index", ["get_site_info" => $get_site_info]);

    // }

}
