<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use App\Services\VideoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PanelControllers extends Controller
{


    public function home()
    {
        $topVideos = Video::withCount(['likes as vote' => function ($query) {
            $query->where('vote', 1);
        }])->orderBy('vote', 'desc')->simplePaginate(10);


        $oldVideos = Video::orderBy('created_at', 'asc')->simplePaginate(5);

        $users = User::withCount('videos')->orderBy('videos_count', 'desc')->get();


        return view('panel-admin.home', compact('topVideos', 'oldVideos', 'users'));
    }


    public function categoryVideos()
    {

        $registeredUsers = User::orderBy('created_at', 'desc')->get();

        $newVideos = Video::orderBy('created_at', 'desc')->simplePaginate(10);


        return view('panel-admin.category-videos', compact('registeredUsers', 'newVideos'));
    }


    public function showAll()
    {
        $videos = Video::orderBy('created_at', 'desc')->simplePaginate(12);


        return view('panel-admin.videos.show-all', compact('videos'));
    }

    public function show(Video $video)
    {
        return view('panel-admin.videos.show', compact('video'));
    }

    public function showDetails()
    {
        ;
        $videos = Video::orderBy('id', 'desc')->simplePaginate(10);

        return view('panel-admin.videos.show-details', compact('videos'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('panel-admin.videos.create', compact('categories'));
    }

    public function store(StoreVideoRequest $request)
    {
        (new VideoService())->create($request->user(), $request->all());

        return redirect()->route('panel.show.all')->with('alert', __('messages.success'));
    }

    public function showEdit()
    {
        $videos = Video::orderBy('id', 'desc')->simplePaginate(20);
        $categories = Category::all();

        return view('panel-admin.videos.show-video-edit', compact('videos', 'categories'))
            ->with('alert', __('messages.edit-video-success'));
    }

    public function edit(Video $video)
    {
        $categories = Category::all();
        return view('panel-admin.videos.edit', compact('video', 'categories'));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        (new VideoService())->update($video, $request->all());

        return redirect()->route('panel.show.all')->with('alert', __('messages.video_edited'));
    }




    // ajax
    public function status(Request $request  )
    {

        $video = Video::all()->find(['id' => $request->get('video_id')])->firstOrFail();


        if (!$video) {
            return response()->json([
                'success' => false,
            ]);
        }

        $video->update([
            'status' => $request->status
        ]);

        return response()->json(['success' => true , 'status' => $video->status  , 'error' =>  "خطایی رخ داده است."]);

    }

    public function delete(Request $request)
    {
        $video = Video::all()->find(['id' => $request->get('video_id')])->firstOrFail();


        $video->delete();

        return response()->json(['success' => true , 'delete' => 'ویدیو با موفقیت حذف گردید']) ;

    }

}
