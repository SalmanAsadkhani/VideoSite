<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use App\Models\Video;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{



    public function store(Request $request)
    {


        $user = auth()->user();
        $videoId = $request->video_id;

        $favorite = Favorite::where('user_id', $user->id)->where('video_id', $videoId)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['status' => 'removed']);
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'video_id' => $videoId,
                'is_favorite' => true
            ]);


            return response()->json(['status' => 'added']);
        }


    }

    public function show()
    {
        $userId = Auth::id();

        $favoriteVideos = Video::whereIn('id', function ($query) use ($userId) {
            $query->select('video_id')
                ->from('favorites')
                ->where('user_id', $userId);
        })->simplePaginate(12);



        return view('videos.favorite' , compact('favoriteVideos') );
    }



}
