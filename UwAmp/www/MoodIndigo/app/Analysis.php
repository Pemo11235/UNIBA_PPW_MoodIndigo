<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    protected $table = 'analyses';
    protected $fillable = array('nome_video', 'descrizione_video');

    public function projects() {
        return $this->belongsTo('App\Projects', 'project_id');
    }

    public function csvEmozioni() {
        return $this->hasMany('App\Csv_emozioni', 'csv_emozioni_id');
    }
}
