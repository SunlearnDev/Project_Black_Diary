<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    use HasFactory;
    protected $table = 'citys';

    protected $guarded = [
        'id'
    ];

    public function districts()
    {
        return $this->hasMany(DistrictModel::class, 'city_id');
    }
}
