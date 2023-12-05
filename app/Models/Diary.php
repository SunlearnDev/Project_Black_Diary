<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;
    protected $table = 'diary';

    protected $guarded = [
        'id'
    ]; 
    public $incrementing = true; // Bật auto-increment
     /**
     * Get the roles that owns the UserModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hashtags()
    {
    return $this->belongsToMany(Hashtag::class, 'diary_hashtags', 'diary_id', 'hashtag_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'diary_id');
    }

}
