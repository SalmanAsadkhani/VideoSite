<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Resources\VideoColletion;
use App\Http\Resources\VideoResource;
use App\Models\User;
use App\Models\Video;
use App\Services\VideoService;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function show(Video $video)
    {
            return response()->json([
                'message' => 'ویدیو با موفقیت یافت شد',
                'data' =>  new VideoResource($video),
            ]);

    }

    public function index(Request $request , Video  $video)
    {
        $videos = Video::Filter($request->all())->paginate();
        return VideoResource::collection($videos);
    }

    public function store(StoreVideoRequest $request , Video  $video)
    {
        (new VideoService())->create(auth()->user() , $request->all());

        return response()->json([
            'message' => 'ویدیو با موفقیت ساخته شد',
        ], 201);
    }

    public function update(UpdateVideoRequest $request , Video  $video)
    {
        $this->authorize('update', $video);

        (new VideoService())->update($video, $request->all());

        return response()->json([
            'message' => 'ویدیو با موفقیت اپدیت گردید'
        ] , 200);

    }

    public function destroy(Video $video)
    {
        $this->authorize('delete', $video);

        $video->delete();
        return response()->json([
            'message' => 'ویدیو با موفقیت حذف گردید',
        ]);
    }


}
