<?php

namespace App\Policies;

use App\Models\User;
use App\Models\video;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class VideoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\video  $video
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, video $video)
    {
        return $video->user_id == $user->id ? Response::allow() :  Response::deny('messages.You_are_not_allowed_to_view_this_video.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\video  $video
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, video $video)
    {
        return $video->user_id == $user->id ? Response::allow() :  Response::deny('messages.You_are_not_allowed_to_edit_this_video.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\video  $video
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, video $video)
    {
        return $video->user_id == $user->id ? Response::allow() : Response::deny('messages.You_are_not_allowed_to_delete_this_video.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\video  $video
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, video $video)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\video  $video
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, video $video)
    {
        //
    }
}
