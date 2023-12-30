<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Carbon;
// use Illuminate\Database\Eloquent\Casts\Attribute;

class Diary extends Model
{
    use HasFactory;
    protected $table = 'diary';

    protected $guarded = [
        'id'
    ];
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
        return $this->belongsToMany(Hashtag::class, 'diary_hashtags', 'diary_id', 'hashtag_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'diary_id');
    }
    public function likes(){
        return $this->belongsToMany(User::class, 'reactions')->withTimestamps();
    }
    public function isLikedBy(User $user)
    {
    return $this->likes->contains('user_id', $user->id);
    }


    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'diary_id');
    }
    

}
