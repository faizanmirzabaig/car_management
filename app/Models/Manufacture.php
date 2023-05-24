<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $fillable = [
        'name','status','created_at','updated_at'
    ];

    public function carmodel()
    {
        return $this->hasMany(CarModel::class, 'manufacturer_name_id', 'id')->where('status', true);
    }
}
