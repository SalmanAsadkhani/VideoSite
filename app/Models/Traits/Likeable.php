<?php

namespace App\Models\Traits;

use App\Models\Like;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Comment;
use Illuminate\Support\Facades\Cache;


trait Likeable {


    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getlikeCountAttribute()
    {
        $CacheKeyName = 'Like_Count_For_' . class_basename($this) .'_' . $this->id;

       return Cache::remember($CacheKeyName , 30 , function (){
            return $this->likes()
                ->where('vote' , 1)
                ->count();
        });
    }
    public function getDislikeCountAttribute()
    {
        $CacheKeyName = 'disLike_Count_For_' . class_basename($this) .'_' . $this->id;

        return Cache::remember($CacheKeyName , 30 , function (){
            return $this->likes()
                ->where('vote' , -1)
                ->count();
        });
    }

    public function LikeBy(User  $user)
    {

        if ($this->isLiked($user))
        {
            return $this->Likes()
                ->where('vote' , 1)
                ->delete();
        }


        return $this->Likes()->create([
           'vote' => 1,
           'user_id' => $user->id,
        ]);

    }



    public function disLikeBy(User  $user)
    {
        if ($this->isDisLiked($user))

        {
            return $this->Likes()
                ->where('vote' , -1)
                ->delete();

        }


        return $this->Likes()->create([
           'vote' => -1,
           'user_id' => $user->id,
        ]);

    }


    public function isLiked(User  $user)
    {
        return $this->likes()
            ->where('vote' , 1)
            ->where( 'user_id',$user->id  )
            ->exists();
    }


    public function isDisLiked(User  $user)
    {
        return $this->likes()
            ->where('vote' , -1)
            ->where( 'user_id',$user->id  )
            ->exists();
    }




}
