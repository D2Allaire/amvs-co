<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'location', 'studio', 'website'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email', 'created_at', 'updated_at'
    ];

    /**
     * One-To-Many Relationship: One user has many AMVs.
     */
    public function amvs()
    {
        return $this->hasMany('App\AMV', 'user_id');
    }

    /**
     * One-To-Many Relationship: One user has many Likes.
     */
    public function likes()
    {
        return $this->hasMany('App\Like', 'user_id');
    }
}
