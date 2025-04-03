<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function store(Request $request, string $likeable_type , $likeable_id)
    {

        if(\auth()->check()){
            $likeable_id->LikeBy(\auth()->user());
            return back();
        } else {

            return redirect()->route('login.create')->with('error', __('messages.please_first_login'));
        }

    }

    public function test(video $video)
    {
        dd('$video');
    }



}
