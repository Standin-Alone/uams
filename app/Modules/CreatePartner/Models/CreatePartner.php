<?php

namespace App\Modules\CreatePartner\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CreatePartner extends Model
{
    use HasFactory;

    protected $table = "partner_info";
    protected $fillable = [

        'partner_name',
        'contact_person',
        'contact_no',
        'is_sell_harvest',
        'indicate_the_weight',
        'is_farmer_trained',
        'is_apply_fertilizer',
        'fertilizer_type',
        'is_apply_pesticide',
        'pesticide',
        'no_of_beficiaries',
        //'status' => $request-> status,
        'reg_code',
        'prov_code',
        'mun_code',
        'bgy_code',
        'reg_name',
        'prov_name',
        'mun_name',
        'bgy_name',
        'site_address',
        'lat',
        'long',
    ];


    public function get_organization()
    {
        $table = 'lib_organization';
        $data = DB::table($table)->get();
        return $data;
    }

    public function get_animal()
    {
        $table = 'lib_animal';
        $data = DB::table($table)->get();
        return $data;
    }
    public function get_technology()
    {
        $table1 = 'lib_technology';
        $data1 = DB::table($table1)->get();
        return $data1;
    }

    public function get_region()
    {
        $table1 = 'geo_map';
        $data1 = DB::table($table1)
            ->groupBy('reg_name')
            ->get();
        return $data1;
    }

    public function get_crop()
    {
        $table1 = 'lib_crop';
        $data1 = DB::table($table1)
            ->groupBy('crop_english')
            ->get();
        return $data1;
    }




    public function insert_partner($insert)
    {
        $table = 'partner_info';


        $data = DB::table($table)->insert($insert);
        return $data;

        if ($data) {
            $response = [
                'message' => 'Data successfully saved',
                'status' => 'success',
                'url' => route('partnerorganization')
            ];
        } else {
            $response = [
                'message' => 'Data failed to saved',
                'status' => 'fail',
                'url' => ''
            ];
        }
        return json_encode($response);
    }



    /** Delete Functions */
    public function delete_technology() {  
        $id = request('id');         
        try {            
            DB::beginTransaction();

            DB::table('partner_tech')
                ->where('id', '=', $id)
                ->delete();

            DB::commit();

            $success_response = ['success'=>true, 'message'=>'Successfully delete.'];
            return response()->json($success_response, 200);
        } catch (\Exception $e) {
            DB::rollback();

            $error_response = ['error'=> true, 'icon'=>'info', 'message'=>$e->getMessage()];
            return response()->json($error_response, 302);
        }
    }

    public function delete_training() {  
        $id = request('id');         
        try {            
            DB::beginTransaction();

            DB::table('partner_training')
                ->where('training_id', '=', $id)
                ->delete();

            DB::commit();

            $success_response = ['success'=>true, 'message'=>'Successfully delete.'];
            return response()->json($success_response, 200);
        } catch (\Exception $e) {
            DB::rollback();

            $error_response = ['error'=> true, 'icon'=>'info', 'message'=>$e->getMessage()];
            return response()->json($error_response, 302);
        }
    }
}
