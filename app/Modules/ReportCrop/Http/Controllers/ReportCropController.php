<?php

namespace App\Modules\ReportCrop\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\ReportCrop\Models\ReportCrop;

use PhpOffice\PhpWord\TemplateProcessor;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use Illuminate\Support\Facades\Response;

use File;
use Repsonse;

class ReportCropController extends Controller
{    
    public function __construct(Request $request)
    {
        $this->query = new ReportCrop();
    }

    public function index()
    {
        $reg_list = $this->query->get_reg_name();
        $prov_list = $this->query->get_prov_name();
        $mun_list = $this->query->get_mun_name();
        $bgy_list = $this->query->get_bgy_name();
        $partner_list = $this->query->get_partner_name();
        $crop_list = $this->query->get_crop();

        if(request()->ajax()){
            return DataTables::of( $this->query->get_list($request))
                ->make(true);
        }

        return view("ReportCrop::index")
            ->with('reg_list', $reg_list)
            ->with('prov_list', $prov_list)
            ->with('mun_list', $mun_list)
            ->with('bgy_list',$bgy_list)
            ->with('partner_list', $partner_list)
            ->with('crop_list', $crop_list);
    }

    public function get(Request $request){
        $user_id = session('user_id');

        if($user_id == null) {
            return redirect()->route('error_page.index');
        }

        return $this->query->get_list($request);
    }

    /** Get list of Harvested Crops based on Harvested date*/
    public function get_crop_byharvesteddate(Request $request){
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        $data = $this->query->get_crop_bydate($date_from, $date_to);
    }
}
