<?php

namespace App\Http\Controllers\backend;

use App\models\page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;


class pages extends backendController
{
    public function __construct(page $model)
    {
        parent::__construct($model);
    }
      //
      public function index() {

        $pages = page::paginate(10);
        return view('back_end.pages.index',compact('pages'));
    }

    public function create() {
        return view('back_end.pages.create');

    }

    public function store(Request $request) {
        $request->validate([
            'name' =>  'required|max:191',
            'des' =>  'required|max:250',
            'meta_des' => 'required|max:191',
            'meta_keywords' => 'required|max:191',
        ]);
        $page = new page() ;
        $page->name =  $request->name ;
        $page->des =  $request->des ;
        $page->meta_des =  $request->meta_des ;
        $page->meta_keywords =  $request->meta_keywords ;
        $page->save();
        return redirect()->route('pages.index')->with('status', 'cat was created !');
    }

    public function edit($id) {
        $page = page::find($id);
        return view('back_end.pages.edit', compact('page'));


    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' =>  'required|max:191',
            'des' =>  'required|max:250',
            'meta_des' => 'required|max:191',
            'meta_keywords' => 'required|max:191',
        ]);
        $page = page::find($id) ;
        $page->name =  $request->name ;
        $page->des =  $request->des ;
        $page->meta_des =  $request->meta_des ;
        $page->meta_keywords =  $request->meta_keywords ;
        $page->save();
        return redirect()->route('pages.index')->with('status', 'cat was updated !');
    }

    public function destroy($id) {
        $page = page::find($id) ;
        $page->delete();
        return redirect()->route('pages.index')->with('status', 'cat was deleted !');
    }
}
