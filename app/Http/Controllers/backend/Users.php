<?php

namespace App\Http\Controllers\backend;

use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class users extends backendController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    //
    public function index() {

        $users = User::paginate(10);
        return view('back_end.users.index',compact('users'));
    }

    public function create() {
        return view('back_end.users.create');

    }

    public function store(Request $request) {
        $request->validate([
            'name' =>  'required|max:200',
            'email' => 'required|max:500',
            'password' => 'required|max:500',
            'group' => ['required']
        ]);
        $user = new User() ;
        $user->name =  $request->name ;
        $user->email =  $request->email ;
        $user->password =  Hash::make ($request->password) ;
        $user->group =  $request->group ;
        $user->save();
        return redirect()->route('users.index')->with('status', 'user was created !');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('back_end.users.edit', compact('user'));


    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' =>  'required|max:200',
            'email' => 'required|max:500',
            'password' => 'required|max:500',
            'group' => ['required']
        ]);
        $user = User::find($id) ;
        $user->name =  $request->name ;
        $user->email =  $request->email ;
        $user->password =  Hash::make ($request->password) ;
        $user->group =  $request->group ;
        $user->save();
        return redirect()->route('users.index')->with('status', 'user was updated !');
    }

    public function destroy($id) {
        $user = User::find($id) ;
        $user->delete();
        return redirect()->route('users.index')->with('status', 'user was deleted !');
    }
}
