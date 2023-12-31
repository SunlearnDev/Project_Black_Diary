<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictModel extends Model
{
    use HasFactory;
    protected $table = 'districts';

    protected $guarded = [
        'id'
    ];

    public function city()
    {
        return $this->belongsTo(Citys::class);
    }
}
