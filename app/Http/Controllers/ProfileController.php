<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{




    public function profile()
    {
        if (!auth()->check())
        {
            return redirect()->route('login.create');
        }

        return view('profile.profile');
    }


    public function information(Request $request , User $user)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => ['nullable' , 'email','max:255' , Rule::unique('users')->ignore($user)],
            'file' => 'nullable|mimes:jpg,jpeg,png|max:2000',
        ]);

        if ($request->hasFile('file')) {

            $path = Storage::putfile('avatar', $request->file('file'));

            $user->update([
                'name' =>  $request->name,
                'email' => $request->email,
                'avatar' => $path,
            ]);
        }


       $user->update([
            'name' =>  $request->name,
            'email' => $request->email,
        ]);


        ToastMagic::success( __('messages.change-profile-success'));
        return back();

    }

    public function password(Request $request , User $user)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $hash = Hash::make($request->password);

        $user->update([
            'password' => $hash
        ]);


        ToastMagic::success(__('messages.change-password-success'));
        return back();
    }


    public function myvideos(Request $request )
    {
        $videos = Video::where('user_id', Auth::id())
            ->search($request->all())
            ->simplePaginate(12)
            ->withQueryString();;



        return view('profile.my-videos' , compact('videos') );
    }
}
