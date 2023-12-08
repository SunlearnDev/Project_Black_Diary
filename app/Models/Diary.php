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

    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'diary_id');
    }
    
    // protected function createdAt(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => Carbon::parse($value),
    //     );
    // }
}
