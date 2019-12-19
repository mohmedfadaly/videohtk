<?php

namespace App\Http\Controllers\backend;

use App\models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class tags extends backendController
{
    public function __construct(tag $model)
    {
        parent::__construct($model);
    }
     //
     public function index() {

        $tags = tag::paginate(10);
        return view('back_end.tags.index',compact('tags'));
    }

    public function create() {
        return view('back_end.tags.create');

    }

    public function store(Request $request) {
        $request->validate([
            'name' =>  'required|max:191',
        ]);
        $tag = new tag() ;
        $tag->name =  $request->name ;
        $tag->save();
        return redirect()->route('tags.index')->with('status', 'tag was created !');
    }

    public function edit($id) {
        $tag = tag::find($id);
        return view('back_end.tags.edit', compact('tag'));


    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' =>  'required|max:191',
        ]);
        $tag = tag::find($id) ;
        $tag->name =  $request->name ;
        $tag->save();
        return redirect()->route('tags.index')->with('status', 'tag was updated !');
    }

    public function destroy($id) {
        $tag = tag::find($id) ;
        $tag->delete();
        return redirect()->route('tags.index')->with('status', 'tag was deleted !');
    }
}
