<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    protected $table = 'reactions';

    protected $guarded = [
        'id'
    ];

    public function user(){
        return  $this->belongsTo(User::class);
    }
    public function diary(){
        return  $this->belongsTo(Diary::class);
    }

}
