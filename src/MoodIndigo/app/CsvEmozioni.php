<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsvEmozioni extends Model
{
    protected $table = 'csv_emozioni';
    protected $fillable = array('analysis_id','time', 'joy', 'sadness', 'disgust', 'contempt', 'anger', 'fear', 'surprise', 'valence', 'engagement');

    public function analyses_csv() {
        return $this->belongsTo('App\Analysis', 'analysis_id');
    }
}

