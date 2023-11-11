<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Citys;
use App\Models\DistrictModel;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'about',
        'address',
        'gender',
        'birthday',
        'city_id',
        'district_id',
        'role',
    ];

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
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id');
    }

    public function isFollowing(User $user)
    {
        return $this->following()->where('following_id', $user->id)->exists();
    }

    public function diary()
    {
        return $this->hasMany(DiaryModel::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
