<?php

namespace App\View\Components;

use App\Models\Video;
use Illuminate\View\Component;

class SidebarWrapper extends Component
{
    public $video;
    /**
     * Create a ew component instance.
     *
     * @return void
     */
    public function __construct(Video $video)
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
        return view('components.sidebar-wrapper');
    }
}
