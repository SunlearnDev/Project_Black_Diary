<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    use HasFactory;
    protected $table = 'citys';

    protected $primaryKey = 'city_id';

    protected $fillable = [
        'city_id', 'city_name', 
    ];
}
