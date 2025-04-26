<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Video;
use App\Models\VideoRating;
use App\Services\FFmpegAdapter;
use App\Services\VideoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{




    public function create()
    {
        if (!auth()->check())
        {
            return redirect()->route('login.create');
        }

        $categories = Category::all();
        return view('videos.create', compact('categories'));
    }

    public function store(StoreVideoRequest $request)
    {

        (new VideoService())->create($request->user(), $request->all());

        return redirect()->route('index')->with('success', __('messages.success'));
    }

    public function show( Video $video , Comment $comment  )
    {
        $videosRating = Video::with('ratings')->get();


        return view('videos.show', compact('video' , 'comment' , 'videosRating' ));
    }

    public function edit(Video $video)
    {

        $this->authorize('update', $video);

        $categories = Category::all();
        return view('panel.video.edit', compact('video', 'categories'));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        (new VideoService())->update($video, $request->all());

        return redirect()->route('panel.show.all')->with('success', __('messages.video_edited'));
    }


    public function popular(Request $request)
    {
        $videos = Video::orderBy('rating', 'desc')
            ->search($request->all())
            ->simplePaginate(12);

        return view('videos.popular', compact('videos'));

    }

    public function recommended(Request $request , Video $video)
    {
        $videos = Video::search($request->all())->simplePaginate(12);
        return view('videos.recommended', compact('videos'));
    }

    public function latest(Request $request)
    {
        $newVideos =  Video::orderBy('created_at', 'desc')->search($request->all())->simplePaginate(12);

        return view('videos.latest', compact('newVideos'));
    }





}
