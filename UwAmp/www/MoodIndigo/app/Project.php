<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = array('nome_progetto', 'descrizione_progetto', 'user_id', 'share_1_id', 'share_2_id', 'share_3_id');

    public function users() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function users_sharing_1() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function users_sharing_2() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function users_sharing_3() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function analyses() {
        return $this->hasMany('App\Analysis', 'analysis_id');
    }
}
