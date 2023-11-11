<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hastag extends Model
{
    use HasFactory;
    protected $table='hastag';


    protected $fillable = [
        'content',
        
    ];
}
