<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = [
        'model_name','manufacturer_name_id','color_code','manufacturing_year','registration_number','image1','image2','status','created_at','updated_at'
    ];

    public function Manufacture()
    {
        return $this->belongsTo(Manufacture::class, 'manufacturer_name_id');
    }

}
