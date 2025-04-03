<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
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


        return back()->with('success' , __('messages.change-profile-success'));

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



        return back()->with('success' , __('messages.change-password-success'));
    }


    public function myvideos()
    {
        $videos = Video::where('user_id', Auth::id())->simplePaginate(12);



        return view('profile.my-videos' , compact('videos') );
    }
}
