<?php

namespace App\Http\Controllers\backend;

use App\models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class categories extends backendController
{

    public function __construct(category $model)
    {
        parent::__construct($model);
    }

      //
      public function index() {

        $cats = category::paginate(10);
        return view('back_end.cats.index',compact('cats'));
    }

    public function create() {
        return view('back_end.cats.create');

    }

    public function store(Request $request) {
        $request->validate([
            'name' =>  'required|max:191',
            'meta_keywords' => 'required|max:191',
            'meta_des' => 'required|max:191',
        ]);
        $category = new category() ;
        $category->name =  $request->name ;
        $category->meta_keywords =  $request->meta_keywords ;
        $category->meta_des =  $request->meta_des ;
        $category->save();
        return redirect()->route('cats.index')->with('status', 'cat was created !');
    }

    public function edit($id) {
        $category = category::find($id);
        return view('back_end.cats.edit', compact('category'));


    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' =>  'required|max:191',
            'meta_keywords' => 'required|max:191',
            'meta_des' => 'required|max:191',
        ]);
        $category = category::find($id) ;
        $category->name =  $request->name ;
        $category->meta_keywords =  $request->meta_keywords ;
        $category->meta_des =  $request->meta_des ;
        $category->save();
        return redirect()->route('cats.index')->with('status', 'cat was updated !');
    }

    public function destroy($id) {
        $category = category::find($id) ;
        $category->delete();
        return redirect()->route('cats.index')->with('status', 'cat was deleted !');
    }
}
