<?php

namespace App\Modules\ReportPartner\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\ReportPartner\Models\ReportPartner;

use PhpOffice\PhpWord\TemplateProcessor;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use Illuminate\Support\Facades\Response;

use File;
use Repsonse;

class ReportPartnerController extends Controller
{
    public function __construct(Request $request)
    {
        $this->query = new ReportPartner();
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

        return view("ReportPartner::index")
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

    public function export(Request $request) {
        // $partner_id = '11cb20dc-e274-492e-9d1d-df5599f6d078';
        $partner_id = $request->partner_id;

        \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
        
        $templateProcessor = new TemplateProcessor('word-template/monitoring-template.docx');

        $partner_info =  $this->query->get_partner_info($partner_id);
        $partner_name = $partner_info->partner_name;
        $address = $partner_info->site_address . ' ' . $partner_info->bgy_name . ', ' . $partner_info->mun_name . ', ' . $partner_info->prov_name . ', ' . $partner_info->reg_name;
        $is_sell_harvest = $partner_info->is_sell_harvest == 1 ? 'Yes' : 'No';
        $is_farmer_trained = $partner_info->is_farmer_trained == 1 ? 'Yes' : 'No';
        $is_apply_fertilizer = $partner_info->is_apply_fertilizer == 1 ? 'Yes' : 'No';
        $is_apply_pesticide = $partner_info->is_apply_pesticide == 1 ? 'Yes' : 'No';
        
        $fertilizer_type = $partner_info->fertilizer_type == null ? 'N/A' : $partner_info->fertilizer_type;        
        $pesticide = $partner_info->pesticide == null ? 'N/A' : $partner_info->pesticide;

        $templateProcessor->setValue('partner_name', $partner_info->partner_name);
        $templateProcessor->setValue('contact_person', $partner_info->contact_person);
        $templateProcessor->setValue('contact_no', $partner_info->contact_no);
        $templateProcessor->setValue('no_of_beneficiaries', $partner_info->no_of_beneficiaries);
        $templateProcessor->setValue('address', $address);

        $templateProcessor->setValue('is_sell_harvest', $is_sell_harvest);
        $templateProcessor->setValue('is_farmer_trained', $is_farmer_trained);
        $templateProcessor->setValue('is_apply_fertilizer', $is_apply_fertilizer);
        $templateProcessor->setValue('fertilizer_type', $fertilizer_type);
        $templateProcessor->setValue('is_apply_pesticide', $is_apply_pesticide);
        $templateProcessor->setValue('pesticide', $pesticide);

        /** Get the List of site of the Partner */
        $partner_site = $this->query->get_partner_site($partner_id);
        $count_site = count($partner_site);
        $templateProcessor->cloneBlock('clone_site', $count_site);

        $key_site = 0;
        while($key_site <= $count_site){
            if($key_site < $count_site){
                $templateProcessor->setValue('site_name', '${site_name'.$key_site.'}', 1);
                $templateProcessor->setValue('land_area', '${land_area'.$key_site.'}', 1);
                $templateProcessor->setValue('mp', '${mp'.$key_site.'}', 1); //no_of_manpower
                $templateProcessor->setValue('year', '${year'.$key_site.'}', 1); //no_of_year
                $templateProcessor->setValue('own', '${own'.$key_site.'}', 1);
                $templateProcessor->setValue('site_address', '${site_address'.$key_site.'}', 1);
                // $templateProcessor->setValue('lat', '${lat'.$key_site.'}', 1);
                // $templateProcessor->setValue('long', '${long'.$key_site.'}', 1);
            }
            $key_site++;
        }
        
        foreach ($partner_site as $partner_site_key => $site) {
            $site_address = $site->site_address . ' ' . $site->bgy_name . ', ' .
                            $site->mun_name . ', ' . $site->prov_name . ', ' . $site->reg_name;
            $templateProcessor->setValue('site_name'.$partner_site_key, $site->site_name , 1);
            $templateProcessor->setValue('land_area'.$partner_site_key, $site->land_area , 1);
            $templateProcessor->setValue('mp'.$partner_site_key, $site->no_of_manpower , 1);
            $templateProcessor->setValue('year'.$partner_site_key, $site->no_of_year , 1);
            $templateProcessor->setValue('own'.$partner_site_key, $site->site_own , 1);
            $templateProcessor->setValue('site_address'.$partner_site_key, $site_address , 1);
            // $templateProcessor->setValue('lat'.$partner_site_key, $site->lat , 1);
            // $templateProcessor->setValue('long'.$partner_site_key, $site->long , 1);
        }

        /** Get the Organization Type of the Partner */
        $partner_org = $this->query->get_partner_org($partner_id);
        $count_org = count($partner_org); //Number of Organzation
        $templateProcessor->cloneBlock('clone_org', $count_org);

        $key_org = 0;
        while($key_org <= $count_org){
            if($key_org < $count_org){
                $templateProcessor->setValue('org_name', '${org_name'.$key_org.'}', 1);
            }
            $key_org++;
        }
        
        foreach ($partner_org as $partner_org_key => $org) {
            $templateProcessor->setValue('org_name'.$partner_org_key, $org->org_name , 1);
        }

        
        /** Get the UA Technology of the Partner */
        $partner_tech = $this->query->get_partner_tech($partner_id);
        $count_tech = count($partner_tech);
        $templateProcessor->cloneBlock('clone_tech', $count_tech);

        $key_tech = 0;
        while($key_tech <= $count_tech){
            if($key_tech < $count_tech){
                $templateProcessor->setValue('tech_desc', '${tech_desc'.$key_tech.'}', 1);
            }
            $key_tech++;
        }
        
        foreach ($partner_tech as $partner_tech_key => $tech) {
            $templateProcessor->setValue('tech_desc'.$partner_tech_key, $tech->tech_desc , 1);
        }

        
        /** Get the Trainings of the Partner */
        $partner_training = $this->query->get_partner_training($partner_id);
        $count_training = count($partner_training);
        $templateProcessor->cloneBlock('clone_training', $count_training);

        $key_training = 0;
        while($key_training <= $count_training){
            if($key_training < $count_training){
                $templateProcessor->setValue('training_desc', '${training_desc'.$key_training.'}', 1);
            }
            $key_training++;
        }
        
        foreach ($partner_training as $partner_training_key => $training) {
            $templateProcessor->setValue('training_desc'.$partner_training_key, $training->training_desc , 1);
        }

        
        /** Get the Animals present in the Partner */
        $partner_animal = $this->query->get_partner_animal($partner_id);
        $count_animal = count($partner_animal);
        $templateProcessor->cloneBlock('clone_animal', $count_animal);

        $key_animal = 0;
        while($key_animal <= $count_animal){
            if($key_animal < $count_animal){
                $templateProcessor->setValue('animal_name', '${animal_name'.$key_animal.'}', 1);
            }
            $key_animal++;
        }
        
        foreach ($partner_animal as $partner_animal_key => $animal) {
            $templateProcessor->setValue('animal_name'.$partner_animal_key, $animal->animal_name , 1);
        }


        /** Get the Harvest of the Partner */
        $partner_harvest = $this->query->get_partner_harvest($partner_id);
        $count_harvest = count($partner_harvest);
        $templateProcessor->cloneBlock('clone_harvest', $count_harvest);

        // return $partner_harvest;
        $key_harvest = 0;
        while($key_harvest <= $count_harvest){
            if($key_harvest < $count_harvest){
                $templateProcessor->setValue('crop', '${crop'.$key_harvest.'}', 1);
                $templateProcessor->setValue('harvest_from', '${harvest_from'.$key_harvest.'}', 1);
                $templateProcessor->setValue('harvest_to', '${harvest_to'.$key_harvest.'}', 1);
                $templateProcessor->setValue('volume_harvest_from', '${volume_harvest_from'.$key_harvest.'}', 1);
                $templateProcessor->setValue('volume_harvest_to', '${volume_harvest_to'.$key_harvest.'}', 1);
            }
            $key_harvest++;
        }

        foreach ($partner_harvest as $partner_harvest_key => $harvest) {
            $templateProcessor->setValue('crop'.$partner_harvest_key, $harvest->crop , 1);
            $templateProcessor->setValue('harvest_from'.$partner_harvest_key, $harvest->harvest_from , 1);
            $templateProcessor->setValue('harvest_to'.$partner_harvest_key, $harvest->harvest_to , 1);
            $templateProcessor->setValue('volume_harvest_from'.$partner_harvest_key, $harvest->volume_harvest_from , 1);
            $templateProcessor->setValue('volume_harvest_to'.$partner_harvest_key, $harvest->volume_harvest_to , 1);
        }

        /** Download docx file */
        // $filename = 'Monitoring '.$partner_name;
        // $templateProcessor->saveAs($filename . '.docx');
        // return response()->download($filename . '.docx')->deleteFileAfterSend(true);
        
        header("Content-Disposition: attachment; filename=". $partner_name . '.docx');
        $templateProcessor->saveAs('php://output');
    }
}
