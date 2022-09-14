<?php

namespace App\Modules\AuditTrail\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class AuditTrail extends Model
{
    use HasFactory;


    public function get_trail(){
        $get_trail  = db::table('audit_trail')->get();

        return $get_trail;
    }
}
