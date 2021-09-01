<?php


namespace App\Http\Controllers\Backend;

use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Comment;

trait CommentTrait
{
    public function commentStore(Store $request){
        $requestArray = $request->all() + ['user_id' => auth()->user()->id];
        Comment::create($requestArray);
        $id = $requestArray['video_id'];
        return redirect(route('videos.edit', [$id, '#comments']));
    }

    public function commentUpdate($id , Store $request){
        $row  = Comment::findOrFail($id);
        $row->update($request->all());
        return redirect()->route('videos.edit', [$row->video_id, '#comments']);
    }

    public function commentDelete($id){
        $row  = Comment::findOrFail($id);
        $row->delete();
        return redirect()->route('videos.edit', [$row->video_id, '#comments']);
    }
}
