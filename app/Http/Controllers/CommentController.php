<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Video;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function  store(StoreCommentRequest  $request ,Video  $video)
    {

        $video->comments()->create([
            'user_id' => auth()->id(),
            'comment' => Request('comment')
        ]);

        ToastMagic::success(__('messages.your_comment_was_successfully'));

        return back();
   }


    public function show()
    {
        $comments = Comment::where('user_id', Auth::id())->with('video')->simplePaginate(10);


        return view('videos.comments' , compact('comments') );
   }


    public function latestComments()
    {
        $comments = Comment::where('user_id', Auth::id())->with('video')->latest()->simplePaginate(6);

        return view('videos.comments' , compact('comments'));
    }

    public function oldestComments()
    {
        $comments = Comment::where('user_id', Auth::id())->with('video')->oldest()->simplePaginate(6);

        return view('videos.comments' , compact('comments'));
    }

}
