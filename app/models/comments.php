<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    //
    protected $fillable = ['user_id' , 'video_id' , 'comment'];
    public function user(){
        return $this->belongsTo('App\models\User');
    }
    public function video(){
        return $this->belongsTo('App\models\video');
    }
}
