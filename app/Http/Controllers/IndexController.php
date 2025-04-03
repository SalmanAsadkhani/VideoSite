<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorite;
use App\Models\Video;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexController extends Controller
{




    public function index(Request $request)
    {



        $RecommendedVideos = Video::all()->random(4);
        $LatestVideos = Video::orderBy('created_at', 'desc')->take(4)->search($request->all())->get();

        $topVideos = Video::withCount(['likes as vote' => function ($query) {
            $query->where('vote', 1);
        }])->orderBy('vote', 'desc')->search($request->all())->take(4)->get();


        return view('index', compact(   'RecommendedVideos' , 'LatestVideos' , 'topVideos' ));
    }

    public function search(Request $request)
    {
        $videos = Video::all()->search($request->all());

        dd($videos);

        return view('search', compact('videos'));


    }
}
