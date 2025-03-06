<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request ,Video $video)
    {


        $videos = $video->Filter($request->all())
            ->paginate()
            ->withQueryString();


        $RecommendedVideos = Video::all()->random(6);
        $LatestVideos = Video::orderBy('created_at', 'desc')->take(6)->get();
        $popularVideos = Video::all()->random(6);


        return view('index', compact( 'videos' , 'RecommendedVideos' , 'LatestVideos' , 'popularVideos'));
    }
}
