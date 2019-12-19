<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    //
    protected $fillable = [
        'name'
    ];
    public function videos(){
        return $this->belongsTo('App\models\video' , 'tags_videos');
    }
}
