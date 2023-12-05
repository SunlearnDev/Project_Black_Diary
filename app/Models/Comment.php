<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";

    protected $guarded = [
        'id'
    ];

    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
