<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoRating;
use Illuminate\Http\Request;

class VideoRatingController extends Controller
{

    public function store(Request $request , Video $video)
    {



        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        VideoRating::updateOrCreate(
            ['video_id' => $video->id, 'user_id' => auth()->id()],
            ['rating' => $request->rating]
        );


        $averageRating = VideoRating::where('video_id', $video->id)->avg('rating');



         $rating= $video->update([
            'rating' => $video->averageRating(),
        ]);


        return response()->json(['success' => true, 'new_rating' => round($averageRating, 1)]);
    }




}
