<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontEnd\Comments\store;
use App\models\category;
use App\models\Massage;
use App\models\comments;
use App\models\page;
use App\models\skill;
use App\models\tag;
use App\models\User;
use Illuminate\Support\Facades\Hash;
use App\models\video;

class dashbordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'commentUpdate' , 'commentStore', 'profileUpdate'
       ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = video::published()->orderBy('id' , 'desc');
        if(request()->has('search') && request()->get('search') != ''){
            $videos = $videos->where('name' , 'like' , "%".request()->get('search')."%");
        }
        $videos = $videos->paginate(30);
        return view('dashbord',compact('videos'));
    }
    public function category($id){
        $cat = category::findOrFail($id);
        $videos = video::published()->where('cat_id' , $id)->orderBy('id' , 'desc')->paginate(30);
        return view('front-end.category.index' , compact('videos' , 'cat'));
    }

    public function video($id){
        $video = Video::published()->with('skills' , 'tags' , 'cat' , 'user' , 'comments.user')->findOrFail($id);
        return view('front-end.video.index' , compact('video'));
    }


    public function skills($id){
        $skill = skill::findOrFail($id);
        $videos = video::published()->whereHas('skills' , function ($query) use ($id){
            $query->where('skill_id' , $id);
        })->orderBy('id' , 'desc')->paginate(30);
        return view('front-end.skill.index' , compact('videos' , 'skill'));
    }
    public function tags($id){
        $tag = tag::findOrFail($id);
        $videos = video::published()->whereHas('tags' , function ($query) use ($id){
            $query->where('tag_id' , $id);
        })->orderBy('id' , 'desc')->paginate(30);
        return view('front-end.tag.index' , compact('videos' , 'tag'));
    }

    public function commentUpdate($id , store $request){
        $comment = comments::findOrFail($id);
        if(($comment->user_id == auth()->user()->id) || auth()->user()->group == 'admin'){
            $comment->update(['comment' => $request->comment]);
            
        }
        return redirect()->route('frontend.video' , ['id' => $comment->video_id , '#commnets']);
    }

    public function commentStore($id , store $request){
        $video = video::published()->findOrFail($id);
        comments::create([
            'user_id' => auth()->user()->id,
            'video_id' => $video->id,
            'comment' => $request->comment
        ]);
        
        return redirect()->route('frontend.video' , ['id' => $video->id , '#commnets']);
    }

    public function messageStore(\App\Http\Requests\FrontEnd\Massages\store $request){
        Massage::create($request->all());
        
        return redirect()->route('frontend.landing');
    }
    public function welcome(){
        $videos = video::published()->orderBy('id' , 'desc')->paginate(9);
        $videos_count = video::published()->count();
        $comments_count = comments::count();
        $tags_count = tag::count();
        return view('welcome' , compact('videos' , 'tags_count' , 'comments_count' , 'videos_count'));
    }
    public function page($id , $slug = null){
        $page = page::findOrFail($id);
        return view('front-end.page.index' , compact('page'));
    }
    public function profile($id , $slug = null){
        $user = User::findOrFail($id);
        return view('front-end.profile.index' , compact('user'));
    }
    public function profileUpdate(\App\Http\Requests\FrontEnd\User\store $request){
        $user = User::findOrFail(auth()->user()->id);
        $array = [];
        if($request->email != $user->email){
            $email = User::where('email' , $request->email)->first();
            if($email == null){
                $array['email'] =  $request->email;
            }
        }
        if($request->name != $user->name){
            $array['name'] =  $request->name;
        }
        if($request->password != ''){
            $array['password'] =  Hash::make($request->password);
        }
        if(!empty($array)){
            $user->update($array);
        }

        return redirect()->route('front.profile' , ['id' => $user->id , 'slug' =>slug($user->name)]);
    }

}
