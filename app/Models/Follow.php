<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    protected $talbe= 'followers';
    
    protected $fillable = ['follower_id','following_id'];
    public $incrementing = true; // Bật auto-increment
}
    