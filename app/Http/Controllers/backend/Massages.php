<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\FrontEnd\Massages\store;
use App\Mail\ReplayContact;
use App\models\Massage;
use Illuminate\Support\Facades\Mail;

class Massages extends backendController
{
    //
    public function __construct(Massage $model)
    {
        parent::__construct($model);
    }


         //
         public function index() {

            $rows = Massage::paginate(10);
            return view('back_end.messages.index',compact('rows'));
        }
    
        public function create() {
            return view('back_end.messages.create');
    
        }


    public function store(store $request){
        $this->model->create($request->all());
        return redirect()->route('messages.index')->with('status', 'massages was created !');
    }
    public function edit($id) {
        $row = Massage::find($id);
        return view('back_end.messages.edit', compact('row'));


    }
    public function update($id , store $request){
        $row  = Massage::findOrFail($id);
        $row->update($request->all());
        $row->name =  $request->name ;
        $row->email =  $request->email ;
        $row->message =  $request->message ;
        $row->save();
        return redirect()->route('messages.index')->with('status', 'messages was updated !');
    }
    public function destroy($id) {
        $row = Massage::find($id) ;
        $row->delete();
        return redirect()->route('messages.index')->with('status', 'messages was deleted !');
    }
    public function replay($id ,\App\Http\Requests\backend\Massages\store $request){
        $message = $this->model->findOrFail($id);
        Mail::send(new ReplayContact($message , $request->message));
        return redirect()->route('messages.edit' , ['id' => $message->id]);
    }


}
