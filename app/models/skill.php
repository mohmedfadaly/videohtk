<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    //
    protected $fillable = [
        'name'
    ];
    public function videos(){
        return $this->belongsTo('App\models\video' , 'skills_videos');
    }
}
