<?php

namespace App\Modules\CreatePartner\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CreateModel extends Model
{
    protected $table = "partner_site";
    protected $fillable = [
        'site_id',
        'partner_id',

        'site_name',
        'land_area',
        'no_of_manpower',
        'no_of_year',
        'site_own',
        'reg_code',
        'prov_code',
        'mun_code',
        'bgy_code',
        'reg_name',
        //'status' => $request-> status,
        'prov_name',
        'mun_name',
        'bgy_name',
        'site_address',
        'lat',
        'long',
    ];

    public function get_partnersite($partner_id){
        $table = 'partner_site';
        $query = DB::table($table)
                ->orderBy('partner_id', 'desc')
                ->get();

        return $query;
    }
}
