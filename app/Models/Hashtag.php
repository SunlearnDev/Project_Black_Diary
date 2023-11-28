<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;
    protected $table = 'hashtag';

    protected $fillable = [
        'content',
    ];

    public function diary()
    {
        return $this->belongsToMany(DiaryModel::class);
    }
}
