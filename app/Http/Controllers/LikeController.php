<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Devrabiul\ToastMagic\Facades\ToastMagic;
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

            ToastMagic::warning((__'messages.please_first_login'));
            return redirect()->route('login.create');
        }

    }




}
