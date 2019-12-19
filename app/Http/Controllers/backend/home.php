<?php

namespace App\Http\Controllers\backend;
use App\models\User;
use App\models\comments;


class home extends backendController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    //
    public function index() {
        $comments = comments::with('user' , 'video')->orderby('id' , 'desc')->paginate(20);
        return view('back_end.home' , compact('comments'));
    }
}
