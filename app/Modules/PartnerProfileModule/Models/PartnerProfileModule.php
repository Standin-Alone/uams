<?php

namespace App\Modules\PartnerProfileModule\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartnerProfileModule extends Model
{
    use HasFactory;

    public function get_partner_profile_query($uuid){

        $query = DB::table("partner_info as pi")
                        ->select('pi.partner_id', 'pi.partner_name', 'pi.contact_person', 'pi.contact_no', 'pi.reg_name', 'pi.prov_name', 'pi.mun_name', 'pi.bgy_name', 'pi.site_address', 'pi.lat', 'pi.long',
                                'ps.site_id', 'ps.site_name', 'ps.land_area', 'ps.no_of_manpower', 'ps.site_own', 'pi.status')
                        ->leftJoin('partner_site as ps', 'ps.partner_id', '=', 'pi.partner_id')
                        ->where('pi.partner_id', '=', $uuid)
                        ->get();


        return $query;

    }

    public function get_partner_site_query($uuid, $site_id){

        $query = DB::table("partner_info as pi")
                        ->select('pi.partner_name', 'pi.contact_person', 'pi.contact_no', 'pi.reg_name', 'pi.prov_name', 'pi.mun_name', 'pi.bgy_name', 'pi.site_address', 'pi.lat', 'pi.long',
                                'ps.site_id', 'ps.site_name', 'ps.land_area', 'ps.no_of_manpower', 'ps.site_own', 'pi.status')
                        ->leftJoin('partner_site as ps', 'ps.partner_id', '=', 'pi.partner_id')
                        ->where('pi.partner_id', '=', $uuid)
                        ->where('ps.site_id', '=', $site_id)
                        ->get();


        return $query;

    }
}
