<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $guarded = [
        'id'
    ];
    public $incrementing = true; // Bật auto-increment
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
     * Get the roles that owns the UserModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function City()
    {
        return $this->belongsTo(Citys::class, 'city_id', 'city_id');
    }
    public function District()
    {
        return $this->belongsTo(DistrictModel::class, 'district_id', 'district_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id')->withTimestamps();
    }

    public function followersCount()
    {
        return $this->followers()->count();
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id')->withTimestamps();
    }

    public function followingCount()
    {
        return $this->following()->count();
    }

    public function diaries()
    {
        return $this->hasMany(Diary::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function diariesCount()
    {
        return $this->diaries()->count();
    }

    public function follows(User $user)
    {
        return  $this->following()->where('user_id', $user->id)->exists();
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'user_id');
    }

    // ─── Message ─────────────────────────────────────────────────────────

    public function messagesWith($receiverId)
    {
        return Message::where(function ($query) use ($receiverId) {
            $query->where('sender_id', $this->id)
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $this->id);
        })->get();
    }

    public function receivers()
    {
        return $this->belongsToMany(self::class, 'messages', 'sender_id', 'receiver_id')
            ->withPivot('id', 'content', 'read_at');
    }

    public function senders()
    {
        return $this->belongsToMany(self::class, 'messages', 'receiver_id', 'sender_id')
            ->withPivot('id', 'content', 'read_at')
            ->with(['unreadMessages' => function ($query) {
                $query->where('receiver_id', $this->id);
            }]);
    }

    public function contacts()
    {
        return $this->senders->concat($this->receivers)
            ->sortBy('pivot.id')->unique()->sortByDesc('pivot.id');
    }

    public function unreadMessages()
    {
        return $this->hasMany(Message::class, 'sender_id')->whereNull('read_at');
    }

    // public function sentMessages()
    // {
    //     return $this->hasOne(Message::class, 'sender_id')->latestOfMany();
    // }

    // public function receivedMessages()
    // {
    //     return $this->hasOne(Message::class, 'receiver_id')->latestOfMany();
    // }

    // public function latestMessage()
    // {
    //     return $this->sentMessages->merge($this->receivedMessages)->last();
    // }
}
