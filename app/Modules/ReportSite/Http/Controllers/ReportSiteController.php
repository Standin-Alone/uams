<?php

namespace App\Modules\ReportSite\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\ReportSite\Models\ReportSite;

use PhpOffice\PhpWord\TemplateProcessor;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use Illuminate\Support\Facades\Response;

use File;
use Repsonse;

class ReportSiteController extends Controller
{    
    public function __construct(Request $request)
    {
        $this->query = new ReportSite();
    }

    public function index()
    {
        $reg_list = $this->query->get_reg_name();
        $prov_list = $this->query->get_prov_name();
        $mun_list = $this->query->get_mun_name();
        $bgy_list = $this->query->get_bgy_name();
        $partner_list = $this->query->get_partner_name();

        if(request()->ajax()){
            return DataTables::of( $this->query->get_list($request))
                ->make(true);
        }

        return view("ReportSite::index")
            ->with('reg_list', $reg_list)
            ->with('prov_list', $prov_list)
            ->with('mun_list', $mun_list)
            ->with('bgy_list',$bgy_list)
            ->with('partner_list', $partner_list);
    }

    public function get(Request $request){
        $user_id = session('user_id');

        if($user_id == null) {
            return redirect()->route('error_page.index');
        }

        return $this->query->get_list($request);
    }
}
