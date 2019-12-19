<?php

namespace App\Http\Controllers\backend;

use App\models\skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class skills extends backendController
{
    //
    public function __construct(skill $model)
    {
        parent::__construct($model);
    }
          public function index() {

            $skills = skill::paginate(10);
            return view('back_end.skills.index',compact('skills'));
        }
    
        public function create() {
            return view('back_end.skills.create');
    
        }
    
        public function store(Request $request) {
            $request->validate([
                'name' =>  'required|max:191',
            ]);
            $skill = new skill() ;
            $skill->name =  $request->name ;
            $skill->save();
            return redirect()->route('skills.index')->with('status', 'skill was created !');
        }
    
        public function edit($id) {
            $skill = skill::find($id);
            return view('back_end.skills.edit', compact('skill'));
    
    
        }
    
        public function update(Request $request, $id) {
            $request->validate([
                'name' =>  'required|max:191',
            ]);
            $skill = skill::find($id) ;
            $skill->name =  $request->name ;
            $skill->save();
            return redirect()->route('skills.index')->with('status', 'skill was updated !');
        }
    
        public function destroy($id) {
            $skill = skill::find($id) ;
            $skill->delete();
            return redirect()->route('skills.index')->with('status', 'skill was deleted !');
        }
}
