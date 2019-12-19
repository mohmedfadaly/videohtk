<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{

     protected $fillable = [
        'name' ,
        'des' ,
        'meta_des' ,
        'meta_keywords' ,
        'youtube' ,
        'cat_id' ,
        'user_id' ,
        'published',
        'image'
    ];
    public function user(){
        return $this->belongsTo('App\models\User');
    }
    public function cat(){
        return $this->belongsTo('App\models\category');
    }
    public function skills(){
        return $this->belongsToMany('App\models\skill' , 'skills_videos');
    }
    public function tags(){
        return $this->belongsToMany('App\models\tag' , 'tags_videos');
    }
    public function comments(){
        return $this->hasMany('App\models\comments');
    }
    public function scopePublished(){
        return $this->where('published' , 1);
    }
}
