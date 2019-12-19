<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $fillable = [
        'name', 'meta_keywords', 'meta_des',
    ];

    public function videos() {
        return $this->hasMany('App\models\video');
    }
}
