<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Video;
use App\Services\FFmpegAdapter;
use App\Services\VideoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{






    public function create()
    {
        $categories = Category::all();
        return view('videos.create', compact('categories'));
    }

    public function store(StoreVideoRequest $request)
    {

        (new VideoService())->create($request->user(), $request->all());

        return redirect()->route('index')->with('alert', __('messages.success'));
    }

    public function show( Video $video)
    {
        return view('videos.show', compact('video' ));
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

        return redirect()->route('panel.show.all')->with('alert', __('messages.video_edited'));
    }
}
