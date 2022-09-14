<?php

namespace App\Modules\EncodedPartner\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\EncodedPartner\Models\EncodedPartner;

use PhpOffice\PhpWord\TemplateProcessor;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use Illuminate\Support\Facades\Response;

use File;
use Repsonse;

class EncodedPartnerController extends Controller
{
    public function __construct(Request $request)
    {
        $this->query = new EncodedPartner();
    }

    public function index()
    {
        $reg_list = $this->query->get_reg_name();
        $prov_list = $this->query->get_prov_name();
        $mun_list = $this->query->get_mun_name();
        $bgy_list = $this->query->get_bgy_name();

        if(request()->ajax()){
            return DataTables::of( $this->query->get_list($request))
                ->make(true);
        }

        return view("EncodedPartner::index")
            ->with('reg_list', $reg_list)
            ->with('prov_list', $prov_list)
            ->with('mun_list', $mun_list)
            ->with('bgy_list',$bgy_list);
    }

    public function get(Request $request){
        $user_id = session('user_id');

        if($user_id == null) {
            return redirect()->route('error_page.index');
        }
        return $this->query->get_list($request);
    }    

    public function get_site(Request $request){
        $user_id = session('user_id');

        if($user_id == null) {
            return redirect()->route('error_page.index');
        }
        return $this->query->get_list_site($request);
    }

    public function update_partner(Request $request) {        
        $set_status_partner = $this->query->update_partner_status();
        return response()->json($set_status_partner);
    }

    public function update_site(Request $request) {        
        $set_status_site = $this->query->update_site_status();
        return response()->json($set_status_site);
    }
}
