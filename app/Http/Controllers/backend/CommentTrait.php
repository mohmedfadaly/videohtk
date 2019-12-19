<?php
namespace App\Http\Controllers\backend;

use App\Http\Requests\backend\comments\Store;
use App\models\comments;
use App\models\video;
trait CommentTrait{
    public function commentStore(Store $request){
        $requestArray = $request->all() + ["user_id" => auth()->user()->id];
        comments::create($requestArray);
        return redirect()->route('videos.edit' , ['id' => $requestArray['video_id'] , '#comments']);
    }

    public function commentDelete($id){
        $row  = comments::findOrFail($id);
        $row->delete();
        return redirect()->route('videos.edit' , ['id' => $row->video_id , '#comments']);
    }
    public function commentUpdate($id , Store $request){
        $row  = comments::findOrFail($id);
        $row->update($request->all());
        return redirect()->route('videos.edit' , ['id' => $row->video_id , '#comments']);
    }
}
?>