<?php

namespace App\Providers;

use App\Events\VideoCreated;
use App\Listeners\ProcessVideo;
use App\Listeners\SendEmail;
use App\Models\Like;
use App\Models\User;
use App\Models\Video;
use App\Observers\LikeObserver;
use App\Observers\UserObserver;
use App\Observers\VideoObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
//        VideoCreated::class => [
//            SendEmail::class,
//            ProcessVideo::class,
//        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
//        Like::observe(LikeObserver::class);
        Video::observe(VideoObserver::class);
        User::observe(UserObserver::class);
    }

    public function shouldDiscoverEvents()
    {
        return true;
    }
}
