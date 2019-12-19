<?php

namespace App\Http\Controllers\backend;

use App\models\video;
use App\models\category;
use App\models\skill;
use App\models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class videos extends backendController
{
    //  //
    use CommentTrait;

    public function __construct(video $model)
    {
        parent::__construct($model);
    }


    public function index() {

        $videos = video::paginate(10);
        return view('back_end.videos.index',compact('videos'));
    }

    public function create() {
        $append = $this->append();
        return view('back_end.videos.create')->with($append);

    }

    public function store(Request $request) {


        $request->validate([
            'name' =>  'required|max:191',
            'meta_des' => 'required|max:191',
            'meta_keywords' => 'required|max:191',
            'des' =>  'required|max:250',
            'youtube' => 'required|min:10|url',
            'cat_id' => 'required|integer',
            'published' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png,jpg|max:1999',
        ]);


        $video = new video() ;
        $video->name =  $request->name ;
        $video->meta_des =  $request->meta_des ;
        $video->meta_keywords =  $request->meta_keywords ;
        $video->des =  $request->des ;
        $video->youtube =  $request->youtube ;
        $video->cat_id =  $request->cat_id ;
        $video->published =  $request->published ;
        $filename = $this->uploadImage($request);
        $requestArray =['user_id' => auth()->user()->id , 'image' => $filename] + $request->all();
        
        $video = $this->model->create($requestArray);
        $this->syncTagsSkills($video , $requestArray);
        $video->save();
        return redirect()->route('videos.index')->with('status', 'video was created !');
    }
    protected function syncTagsSkills($video , $requestArray){
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $video->skills()->sync($requestArray['skills']);
        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $video->tags()->sync($requestArray['tags']);
        }
    }
    protected function append()
    {
        $array =  [
            'categories' => category::get(),
            'skills' => skill::get(),
            'selectedSkills' => [],
            'tags' => tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments' => []
        ];
        if(request()->route()->parameter('video')){
            $array['selectedSkills']  = $this->model->find(request()->route()->parameter('video'))
                ->skills()->pluck('skills.id')->toArray();
            $array['selectedTags']  = $this->model->find(request()->route()->parameter('video'))
                ->tags()->pluck('tags.id')->toArray();
            $array['comments']  = $this->model->find(request()->route()->parameter('video'))
                ->comments()->orderBy('id' , 'desc')->with('user')->get();
        }
            return $array;
    }

    public function edit($id) {
        $video = video::find($id);
        $append = $this->append();
        
        return view('back_end.videos.edit', compact('video'))->with($append);


    }
    

    public function update(Request $request, $id) {
        

        $request->validate([
            'name' =>  'required|max:191',
            'meta_des' => 'required|max:191',
            'meta_keywords' => 'required|max:191',
            'des' =>  'required|max:250',
            'youtube' => 'required|min:10|url',
            'cat_id' => 'required|integer',
            'published' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png,jpg|max:1999',
            
        ]);
 
        $video = video::find($id) ;
        $video->name =  $request->name ;
        $video->meta_des =  $request->meta_des ;
        $video->meta_keywords =  $request->meta_keywords ;
        $video->des =  $request->des ;
        $video->youtube =  $request->youtube ;
        $video->cat_id =  $request->cat_id ;
        $video->published =  $request->published ;
        $requestArray =$request->all();
        if($request->hasFile('image')){
            $filename = $this->uploadImage($request);
            $requestArray = ['image' => $filename] + $requestArray;
        }
        $video->update($requestArray);
        $this->syncTagsSkills($video , $requestArray);
        $video->save();
        return redirect()->route('videos.index')->with('status', 'video was created !');
    }
    protected function uploadImage($request){
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension() ;
        $filename = 'cover_image' . '_' . time() . '.' . $ext ;
        $file->move(public_path('uploads') , $filename);
        return $filename;
    }

    public function destroy($id) {
        $this->model->FindOrFail($id)->delete();
        return redirect()->route('videos.index')->with('status', 'video was deleted !');
    }
    
}
