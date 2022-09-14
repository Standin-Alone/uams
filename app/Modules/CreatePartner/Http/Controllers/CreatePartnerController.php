<?php

namespace App\Modules\CreatePartner\Http\Controllers;


use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Modules\CreatePartner\Models\CreatePartner;
use App\Modules\CreateModel\Models\CreateModel;

use PhpParser\Node\Stmt\TryCatch;
use Psy\Readline\Hoa\Console;

class CreatePartnerController extends Controller
{
    public function __construct(Request $request)
    {
        $this->query = new CreatePartner();
    }

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $organization = $this->query->get_organization();
        $animal = $this->query->get_animal();
        $technology = $this->query->get_technology();
        $get_regions = $this->query->get_region();
        return view('CreatePartner::index', compact('organization', 'animal', 'technology', 'get_regions'));
    }


    public function preview()
    {
        $organization = $this->query->get_organization();
        $animal = $this->query->get_animal();
        $technology = $this->query->get_technology();
        $get_regions = $this->query->get_region();
        return view('CreatePartner::preview', compact('organization', 'animal', 'technology', 'get_regions'));
    }

    public function save(Request $request)
    {

        $partner_id = Uuid::uuid4();


        $success_response = [
            'message' => '',
            'status' => '',
            'url' => ''
        ];

        try {
            //code...
            $isExists = DB::table('partner_info')->where('partner_name', $request->partner_name)->count();
            if ($isExists > 0) { //if has value
                //dont insert
                $success_response = [
                    'message' => 'Data exists',
                    'status' => 'fail',
                    'url' => ''
                ];

                return response()->json($success_response, 200);
            } else {
                //insert

                $data = [
                    'partner_id' => $partner_id,
                    'partner_name' => $request->partner_name,
                    'contact_person' => $request->contact_person,
                    'contact_no' => $request->contact_no,
                    'is_sell_harvest' => $request->is_sell_harvest,
                    // 'indicate_the_weight' => $request->indicate_the_weight,
                    'is_farmer_trained' => $request->is_farmer_trained,
                    'is_apply_fertilizer' => $request->is_apply_fertilizer,
                    'fertilizer_type' => $request->fertilizer_type,
                    'is_apply_pesticide' => $request->is_apply_pesticide,
                    'pesticide' => $request->pesticide,
                    'no_of_beneficiaries' => $request->no_of_beficiaries,
                    //'status' => $request-> status,
                    'reg_code' => $request->region,
                    'prov_code' => $request->province,
                    'mun_code' => $request->municipality,
                    'bgy_code' => $request->barangay,
                    'reg_name' => $request->reg_name,
                    'prov_name' => $request->prov_name,
                    'mun_name' => $request->mun_name,
                    'bgy_name' => $request->bgy_name,
                    'site_address' => $request->site_address,
                    'lat' => $request->lat,
                    'long' => $request->long,
                ];

                $query = DB::table('partner_info')->insert($data);

                if ($query) {
                    $success_response = [
                        'message' => 'Data has been saved',
                        'status' => 'success',
                        'url' => route('partner.view')
                    ];
                    return response()->json($success_response, 200);
                } else {
                    $success_response = [
                        'message' => 'Data failed to save, please try again',
                        'status' => 'fail',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
            // dd($th);

        }
    }


    public function getData()
    {

        // $partner_site_list = $this->CreateModel->get_partnersite();
        $users = DB::table('partner_info')
            ->orderBy('partner_id', 'desc')
            ->get();

        return view('CreatePartner::partnerdetails', compact('users'));
    }



    public function getSite()
    {

        // $partner_site_list = $this->CreateModel->get_partnersite();
        $datasite = DB::table('partner_site')
            ->orderBy('partner_id', 'desc')
            ->get();
        return $datasite;
    }




    public function getbyID($partner_id)

    {
        $organization = DB::table('partner_org')
            ->where('partner_id', $partner_id)
            ->orderBy('partner_id', 'desc')
            ->get();
        $animal = DB::table('partner_animal')
            ->where('partner_id', $partner_id)
            ->orderBy('partner_id', 'desc')
            ->get();
        $harvest  =  DB::table('partner_harvest')
            ->where('partner_id', $partner_id)
            ->orderBy('partner_id', 'desc')
            ->get();

        $technology = DB::table('partner_tech')
            ->where('partner_id', $partner_id)
            ->orderBy('partner_id', 'desc')
            ->get();

        $sites = DB::table('partner_site')
            ->where('partner_id', $partner_id)
            ->orderBy('partner_id', 'desc')
            ->get();
        $training = DB::table('partner_training')
            ->where('partner_id', $partner_id)
            ->orderBy('partner_id', 'desc')
            ->get();

        $partnersite = DB::table('partner_site')
            ->where('partner_id', $partner_id,)
            ->orderBy('site_id', 'desc')
            ->get();


        $ps_tech = $this->query->get_technology();
        $ps_org = $this->query->get_organization();
        $ps_animal = $this->query->get_animal();
        $ps_crop = $this->query->get_crop();
        $get_regions = $this->query->get_region();




        $user = DB::table('partner_info')->where('partner_id', $partner_id)->first();

        return view('CreatePartner::partnerview', compact('user', 'get_regions', 'ps_tech', 'ps_org', 'ps_animal', 'ps_crop', 'organization', 'animal', 'technology', 'sites', 'harvest', 'training'));
    }

    public function saveSite(Request $request)
    {

        $success_response = [
            'message' => '',
            'status' => '',
            'url' => ''
        ];

        $site_id = Uuid::uuid4();
        $get_regions = $this->query->get_region();


        try {



            $isExists = DB::table('partner_site')->where('site_name', $request->site_name)->count();
            if ($isExists > 0) { //if has value
                //dont insert
                $success_response = [
                    'message' => 'Data exists',
                    'status' => 'fail',
                    'url' => ''
                ];

                return response()->json($success_response, 200);
            } else {

                $site = [
                    'site_id' => $site_id,
                    'partner_id'  => $request->partner_id,
                    'site_name' => $request->site_name,
                    'land_area' => $request->land_area,
                    'no_of_manpower' => $request->no_of_manpower,
                    'no_of_year' => $request->no_of_year,
                    'site_own' => $request->site_own,
                    'reg_code' => $request->reg_code,
                    'prov_code' => $request->prov_code,
                    'mun_code' => $request->mun_code,
                    'bgy_code' => $request->bgy_code,
                    'reg_name' => $request->reg_name,
                    'prov_name' => $request->prov_name,
                    'mun_name' => $request->mun_name,
                    'bgy_name' => $request->bgy_name,
                    'site_address' => $request->site_address,
                    'lat' => $request->lat,
                    'long' => $request->long,
                ];


                $query = DB::table('partner_site')->insert($site);


                if ($query) {
                    $success_response = [
                        'message' => 'Partner site has been saved',
                        'status' => 'success',
                        // 'url' => route('partnersite.view')
                        'url' => route('')
                    ];
                    return response()->json($success_response, 200);
                } else {
                    $success_response = [
                        'message' => 'Data failed to save, please try again',
                        'status' => 'fail',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function saveTech(Request $request)
    {

        $success_response = [
            'message' => '',
            'status' => '',
            'url' => ''
        ];

        $id = Uuid::uuid4();
        $get_regions = $this->query->get_region();


        try {


            $tech = [
                'id' => $id,
                'partner_id'  => $request->partner_id,
                'tech_id' => $request->tech_id,
                'tech_desc' => $request->tech_desc,

            ];


            $query = DB::table('partner_tech')->insert($tech);

            if ($query) {
                $success_response = [
                    'message' => 'Technology has been saved',
                    'status' => 'success',
                    'url' => route('partnersite.view')
                ];
                return response()->json($success_response, 200);
            } else {
                $success_response = [
                    'message' => 'Data failed to save, please try again',
                    'status' => 'fail',
                    'url' => ''
                ];
                return response()->json($success_response, 200);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function saveTraining(Request $request)
    {
        $success_response = [
            'message' => '',
            'status' => '',
            'url' => ''
        ];

        $training_id = Uuid::uuid4();

        try {


            $training = [
                'training_id' => $training_id,
                'partner_id'  => $request->partner_id,
                'training_desc' => $request->training_desc,

            ];


            $query = DB::table('partner_training')->insert($training);

            if ($query) {
                $success_response = [
                    'message' => 'Training has been saved',
                    'status' => 'success',
                    'url' => route('partnersite.view')
                ];
                return response()->json($success_response, 200);
            } else {
                $success_response = [
                    'message' => 'Data failed to save, please try again',
                    'status' => 'fail',
                    'url' => ''
                ];
                return response()->json($success_response, 200);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function saveOrganization(Request $request)
    {
        $success_response = [
            'message' => '',
            'status' => '',
            'url' => ''
        ];

        $id = Uuid::uuid4();

        try {


            $organization = [
                'id' => $id,
                'partner_id'  => $request->partner_id,
                'org_id' => $request->org_id,
                'org_name' => $request->org_name,

            ];


            $query = DB::table('partner_org')->insert($organization);

            if ($query) {
                $success_response = [
                    'message' => 'Organization has been saved',
                    'status' => 'success',
                    'url' => route('partnersite.view')
                ];
                return response()->json($success_response, 200);
            } else {
                $success_response = [
                    'message' => 'Data failed to save, please try again',
                    'status' => 'fail',
                    'url' => ''
                ];
                return response()->json($success_response, 200);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function saveAnimal(Request $request)
    {
        $success_response = [
            'message' => '',
            'status' => '',
            'url' => ''
        ];

        $id = Uuid::uuid4();

        try {


            $animal = [
                'id' => $id,
                'partner_id'  => $request->partner_id,
                'animal_id' => $request->animal_id,
                'animal_name' => $request->animal_name,

            ];


            $query = DB::table('partner_animal')->insert($animal);

            if ($query) {
                $success_response = [
                    'message' => 'Animal has been saved',
                    'status' => 'success',
                    'url' => route('partnersite.view')
                ];
                return response()->json($success_response, 200);
            } else {
                $success_response = [
                    'message' => 'Data failed to save, please try again',
                    'status' => 'fail',
                    'url' => ''
                ];
                return response()->json($success_response, 200);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function saveHarvest(Request $request)
    {
        $success_response = [
            'message' => '',
            'status' => '',
            'url' => ''
        ];

        $harvest_id = Uuid::uuid4();

        try {


            $harvest = [
                'harvest_id' => $harvest_id,
                'partner_id'  => $request->partner_id,
                'crop_id' => $request->crop_id,
                'crop' => $request->crop,
                'harvest_from' => $request->harvest_from,
                'harvest_to' => $request->harvest_to,
                'volume_harvest_from' => $request->volume_harvest_from,
                'volume_harvest_to' => $request->volume_harvest_to,
                'status' => $request->status,

            ];


            $query = DB::table('partner_harvest')->insert($harvest);

            if ($query) {
                $success_response = [
                    'message' => 'Harvest profile has been saved',
                    'status' => 'success',
                    'url' => ''
                ];
                return response()->json($success_response, 200);
            } else {
                $success_response = [
                    'message' => 'Data failed to save, please try again',
                    'status' => 'fail',
                    'url' => ''
                ];
                return response()->json($success_response, 200);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function editSite(Request $request)
    {


        try {

            $success_response = [
                'message' => '',
                'status' => '',
                'url' => ''
            ];

            $site_id = $request->site_id;
            $sitedata = [
                'site_id' => $site_id ?? null,
                'partner_id'  => $request->partner_id ?? null,
                'site_name' => $request->site_name ?? null,
                'land_area' => $request->land_area ?? null,
                'no_of_manpower' => $request->no_of_manpower ?? null,
                'no_of_year' => $request->no_of_year ?? null,
                'site_own' => $request->site_own ?? null,
                'reg_code' => $request->reg_code ?? null,
                'prov_code' => $request->prov_code ?? null,
                'mun_code' => $request->mun_code ?? null,
                'bgy_code' => $request->bgy_code ?? null,
                'reg_name' => $request->reg_name ?? null,
                'prov_name' => $request->prov_name ?? null,
                'mun_name' => $request->mun_name ?? null,
                'bgy_name' => $request->bgy_name ?? null,
                'site_address' => $request->site_address ?? null,
                'lat' => $request->lat ?? null,
                'long' => $request->long ?? null,
            ];

            $editSite = DB::table('partner_site')->where('site_id', $site_id);
            // dd($editSite->count());
            if ($editSite->count()>0) {
                $query = $editSite->update($sitedata);
                // dd($query);
                if ($query) {
                    $success_response = [
                        'message' => 'Partnersite profile has been updated',
                        'status' => 'success',
                        'url' => route('partnersite.view')
                    ];
                    return response()->json($success_response, 200);
                } else {
                    $success_response = [
                        'message' => 'Data failed to save, please try again',
                        'status' => 'fail',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);
        }
    }


    public function editTech(Request $request)
    {

//dd($request);
        try {

            $success_response = [
                'message' => '',
                'status' => '',
                'url' => ''
            ];

            $id = $request->id;
            $techdata = [
                'id' => $id ?? null,
                'partner_id'  => $request->partner_id ?? null,
                'tech_id' => $request->tech_id ?? null,
                'tech_desc' => $request->tech_desc ?? null,

            ];

            $editSite = DB::table('partner_tech')->where('id', $id);
            // dd($editSite->count());
            if ($editSite->count()>0) {
                $query = $editSite->update($techdata);
                // dd($query);
                if ($query) {
                    $success_response = [
                        'message' => 'Partner technology profile has been updated',
                        'status' => 'success',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                } else {
                    $success_response = [
                        'message' => 'Data failed to save, please try again',
                        'status' => 'fail',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);
        }
    }


    public function editTraining(Request $request)
    {


        try {

            $success_response = [
                'message' => '',
                'status' => '',
                'url' => ''
            ];

            $training_id = $request->training_id;
            $traindata = [
                'training_id' => $training_id ?? null,
                'partner_id'  => $request->partner_id ?? null,
                'training_desc' => $request->training_desc ?? null,

            ];

            $editTrain = DB::table('partner_training')->where('training_id', $training_id);
            // dd($editSite->count());
            if ($editTrain->count()>0) {
                $query = $editTrain->update($traindata);
                //dd($query);
                if ($query) {
                    $success_response = [
                        'message' => 'Training profile has been updated',
                        'status' => 'success',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                } else {
                    $success_response = [
                        'message' => 'Data failed to save, please try again',
                        'status' => 'fail',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
            // dd($th);
        }
    }



    public function editOrganization(Request $request)
    {
// dd($request);

        try {

            $success_response = [
                'message' => '',
                'status' => '',
                'url' => ''
            ];

            $id = $request->id;
            $orgdata = [
                'id' => $id ?? null,
                'partner_id'  => $request->partner_id ?? null,
                'org_id'  => $request->org_id ?? null,
                'org_name' => $request->org_name ?? null,

            ];

            $editOrg = DB::table('partner_org')->where('id', $id);
            // dd($editSite->count());
            if ($editOrg->count()>0) {
                $query = $editOrg->update($orgdata);
        //dd($query);
                if ($query) {
                    $success_response = [
                        'message' => 'Organization profile has been updated',
                        'status' => 'success',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                } else {
                    $success_response = [
                        'message' => 'Data failed to save, please try again',
                        'status' => 'fail',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
            // dd($th);
        }
    }


    public function editAnimal(Request $request)
    {
// dd($request);

        try {

            $success_response = [
                'message' => '',
                'status' => '',
                'url' => ''
            ];

            $id = $request->id;
            $animdata = [
                'id' => $id ?? null,
                'partner_id'  => $request->partner_id ?? null,
                'animal_id'  => $request->animal_id ?? null,
                'animal_name' => $request->animal_name ?? null,

            ];

            $editAnim = DB::table('partner_animal')->where('id', $id);
            // dd($editSite->count());
            if ($editAnim->count()>0) {
                $query = $editAnim->update($animdata);
        //dd($query);
                if ($query) {
                    $success_response = [
                        'message' => 'Animal profile has been updated',
                        'status' => 'success',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                } else {
                    $success_response = [
                        'message' => 'Data failed to save, please try again',
                        'status' => 'fail',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
            // dd($th);
        }
    }



    public function editHarvest(Request $request)
    {
// dd($request);

        try {

            $success_response = [
                'message' => '',
                'status' => '',
                'url' => ''
            ];

            $harvest_id = $request->harvest_id;
            $cropdata = [
                'harvest_id' => $harvest_id ?? null,
                'partner_id'  => $request->partner_id ?? null,
                'crop_id'  => $request->crop_id ?? null,
                'crop'  => $request->crop ?? null,
                'harvest_from' => $request->harvest_from ?? null,
                'harvest_to' => $request->harvest_to ?? null,
                'volume_harvest_from' => $request->volume_harvest_from ?? null,
                'volume_harvest_to' => $request->volume_harvest_to ?? null,
                'status' => $request->status ?? null,

            ];

            $editHarvest = DB::table('partner_harvest')->where('harvest_id', $harvest_id);
            // dd($editSite->count());
            if ($editHarvest->count()>0) {
                $query = $editHarvest->update($cropdata);
        //dd($query);
                if ($query) {
                    $success_response = [
                        'message' => 'Harvest profile has been updated',
                        'status' => 'success',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                } else {
                    $success_response = [
                        'message' => 'Data failed to save, please try again',
                        'status' => 'fail',
                        'url' => ''
                    ];
                    return response()->json($success_response, 200);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
            // dd($th);
        }
    }

    // public function controller($name, $data){
    //     switch ($name) {
    //         case 'updateData':
    //             $this->updateData($data);
    //             break;
    //         case 'filter_province':
    //             $this->filter_province($data);
    //             break;
    //     }
    // }

    function removeSite(Request $request)
    {
        $site_id = $request->site_id;
        $removeSite = DB::table('partner_site')->where('site_id', $site_id)->delete();
        // dd($removeSite);
        return back()->with('data_deleted', 'Data has been deleted!');
    }

    public function updateSite(Request $request)
    {
        $updatedata = DB::table('partner_site')->find('site_id');
        $updatedata->site_name = $request->site_name;
        $updatedata->land_area = $request->land_area;
        $updatedata->no_of_manpower = $request->no_of_manpower;
        $updatedata->no_of_year = $request->no_of_year;
        $updatedata->site_own = $request->site_own;
        $updatedata->reg_code = $request->reg_code;
        $updatedata->prov_code = $request->prov_code;
        $updatedata->mun_code = $request->mun_code;
        $updatedata->bgy_code = $request->bgy_code;
        $updatedata->reg_name = $request->reg_name;
        $updatedata->no_of_beficiaries = $request->no_of_beficiaries;
        //'status' => $request-> status,
        $updatedata->reg_code = $request->region;
        $updatedata->prov_code = $request->province;
        $updatedata->mun_code = $request->municipality;
        $updatedata->bgy_code = $request->barangay;
        $updatedata->reg_name = $request->reg_name;
        $updatedata->prov_name = $request->prov_name;
        $updatedata->mun_name = $request->mun_name;
        $updatedata->bgy_name = $request->bgy_name;
        $updatedata->site_address = $request->site_address;
        $updatedata->lat = $request->lat;
        $updatedata->long = $request->long;
        $updatedata->save();
        return back()->with('CreatePartner::updatedata', 'Profile has been updated');
    }

    public function filter_province($region_code)
    {

        $get_province = db::table('geo_map')
            ->select('prov_code', 'prov_name')
            ->where('reg_code', $region_code)
            ->distinct()->get();
        // dd($get_province);
        return json_encode($get_province);
    }

    public function filter_municipality($region_code, $province_code)
    {
        $get_municipality = db::table('geo_map')
            ->select('mun_code', 'mun_name')
            ->where('reg_code', $region_code)
            ->where('prov_code', $province_code)
            ->distinct()->get();
        return json_encode($get_municipality);
    }

    public function filter_barangay($region_code, $province_code, $municipality_code)
    {
        $get_barangay = db::table('geo_map')
            ->select('bgy_code', 'bgy_name')
            ->where('reg_code', $region_code)
            ->where('prov_code', $province_code)
            ->where('mun_code', $municipality_code)
            ->distinct()->get();
        return json_encode($get_barangay);
    }


    public function process(Request $request)
    {

        // dd($request);
        $data = $request->all();


        try {
            // code...s

            $partner_id = Uuid::uuid4();

            $data = [
                'partner_id' => $partner_id,
                'partner_name' => $request->partner_name,
                'contact_person' => $request->contact_person,
                'contact_no' => $request->contact_no,
                'is_sell_harvest' => $request->is_sell_harvest,
                'indicate_the_weight' => $request->indicate_the_weight,
                'is_farmer_trained' => $request->is_farmer_trained,
                'is_apply_fertilizer' => $request->is_apply_fertilizer,
                'fertilizer_type' => $request->fertilizer_type,
                'is_apply_pesticide' => $request->is_apply_pesticide,
                'pesticide' => $request->pesticide,
                'no_of_beficiaries' => $request->no_of_beficiaries,
                //'status' => $request-> status,
                'reg_code' => $request->region,
                'prov_code' => $request->province,
                'mun_code' => $request->municipality,
                'bgy_code' => $request->barangay,
                'reg_name' => $request->reg_name,
                'prov_name' => $request->prov_name,
                'mun_name' => $request->mun_name,
                'bgy_name' => $request->bgy_name,
                'site_address' => $request->site_address,
                'lat' => $request->lat,
                'long' => $request->long,
            ];
            // $partner_site = Uuid::uuid4();
            // $site_id = Uuid::uuid4();
            // $data['partner_site']= [
            //     'partner_id' => $partner_id,
            //     'site_id' => $site_id,


            // ] ;

            $query = DB::transaction(function () use ($data) {
                DB::table('partner_info')->insert($data);
                //    DB::table('partner_site')->insert($data['partner_site']);
            }, 2);

            //response kung anong nangyare sa process
            //success


            $success_response = ["success" => true, "message" => "Proceed"];
            return response()->json($success_response, 200);
        } catch (\Throwable $th) {
            throw $th;
            return json_encode($th);
            // error response
        }
    }

    public function dropData()
    {
        return view('CreatePartner::partnerdrop');
    }

    /** Delete Functions */
    public function delete_technology(Request $request)
    {
        $delete = $this->query->delete_technology();
        return response()->json($delete);
    }

    public function delete_training(Request $request)
    {
        $delete = $this->query->delete_training();
        return response()->json($delete);
    }
    
    public function delete_organization(Request $request)
    {
        $delete = $this->query->delete_organization();
        return response()->json($delete);
    }
    
    public function delete_animal(Request $request)
    {
        $delete = $this->query->delete_animal();
        return response()->json($delete);
    }
    
    public function delete_harvest(Request $request)
    {
        $delete = $this->query->delete_harvest();
        return response()->json($delete);
    }
}
