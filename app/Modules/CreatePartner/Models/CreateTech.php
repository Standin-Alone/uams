<?php

namespace App\Modules\CreateTech\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;


class CreateTech extends Model
{
    use HasFactory;
    protected $table = "partner_tech";
    protected $fillable = ['partner_id','tech_id','tech_desc'];

    public function setCategoryAttribute($value)
    {
        $this->attributes['tech_id'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['tech_id'] = json_decode($value);
    }
}
