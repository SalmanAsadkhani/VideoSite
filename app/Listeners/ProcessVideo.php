<?php

namespace App\Listeners;

use App\Events\VideoCreated;
use App\Models\Video;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessVideo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct( )
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\VideoCreated  $event
     * @return void
     */
    public function handle(VideoCreated $event)
    {
        dump($event->video);
        dump('This a simple processVideo');
;    }
}
