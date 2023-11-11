<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryModel extends Model
{
    use HasFactory;
    protected $table = 'diary';

    protected $fillable = [
        'image',
        'title',
        'content',

    ];
     /**
     * Get the roles that owns the UserModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
    public function hastag(){
        return $this->belongsTo(Hastag::class, 'id_hastag', 'hastag_id');
    }
    public function hashtags()
    {
        return $this->belongsToMany(Hastag::class, 'diary_hashtags', 'diary_id', 'hashtag_id');
    }
    
}
