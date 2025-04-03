<?php

namespace App\View\Components;

use App\Models\Favorite;
use App\Models\User;
use App\Models\Video;
use Illuminate\View\Component;

class VideoBox extends Component
{

    public $video;


    public function __construct(Video  $video)
    {
        $this->video = $video;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.video-box' );
    }
}
