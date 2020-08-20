<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_id', 'project_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects() {
        return $this->hasMany('App\Project', 'project_id', 'project_id');
    }

    public function projects_sharing_1() {
        return $this->hasMany('App\Project', 'share_1_id');
    }
    public function projects_sharing_2() {
        return $this->hasMany('App\Project', 'share_2_id');
    }
    public function projects_sharing_3() {
        return $this->hasMany('App\Project', 'share_3_id');
    }
}


