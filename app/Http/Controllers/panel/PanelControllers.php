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


        return view('panel-admin.home', compact('topVideos','oldVideos' , 'users'));
    }


    public function categoryVideos()
    {

        $registeredUsers = User::orderBy('created_at', 'desc')->get();

        $newVideos =  Video::orderBy('created_at', 'desc')->simplePaginate(10);


        return view('panel-admin.category-videos' , compact('registeredUsers' , 'newVideos'));
    }


    public function showAll()
    {
        $videos = Video::orderBy('created_at', 'desc')->simplePaginate(12);


        return view('panel-admin.videos.show-all' , compact('videos'));
    }

    public function show(Video $video)
    {
        return view('panel-admin.videos.show' , compact('video'));
    }

    public function showDetails()
    {;
        $videos = Video::orderBy('id' , 'desc')->simplePaginate(10);

        return view('panel-admin.videos.show-details', compact('videos'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('panel-admin.videos.create' , compact('categories'));
    }

    public function store(StoreVideoRequest $request)
    {
        (new VideoService())->create($request->user(), $request->all());

        return redirect()->route('panel.show.all')->with('alert' , __('messages.success'));
    }

    public function showEdit()
    {
        $videos = Video::orderBy('id' , 'desc')->simplePaginate(20);
        $categories = Category::all();

        return view('panel-admin.videos.show-video-edit' , compact('videos' , 'categories'))
            ->with('alert' , __('messages.edit-video-success'));
    }

    public function edit(Video $video)
    {
        $categories = Category::all();
        return view('panel-admin.videos.edit', compact( 'video' , 'categories'));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        (new VideoService())->update($video, $request->all());

        return redirect()->route('panel.show.all')->with('alert', __('messages.video_edited'));
    }

//    public function destroy(Video $video)
//    {
//
////        $video->delete();
////        return back()->with('alert' , __('messages.video-delete-success'));
//    }

    public function destroy($slug)
    {
        $video = Video::where('slug', $slug)->first();

        if (!$video) {
            return response()->json(['success' => false, 'message' => 'ویدیو یافت نشد!']);
        }

        $video->delete(); // حذف ویدیو

        return response()->json(['success' => true, 'message' => 'ویدیو با موفقیت حذف شد']);

}









    // ajax
    public function changeStatus(Request $request)
    {

        $request->validate([
            'video_id' => 'required|exists:videos,id',
            'status' => 'required|in:1,2,3'
        ]);

        $video = Video::find($request->video_id);
        $video->status = $request->status;
        $video->save();

        return response()->json(['message' => 'وضعیت با موفقیت تغییر یافت.']);
    }





}
