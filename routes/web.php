<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Models\Video;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CategoryVideoController;
use  \App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \App\Http\Controllers\DisLikeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [IndexController::class, 'index'])
    ->name('index');


Route::get('/videos/create', [VideoController::class, 'create'])
    ->middleware('VerifyEmail')
    ->name('videos.create');

Route::post('/videos', [VideoController::class, 'store'])
    ->name('videos.store');


Route::get('/videos/{video}', [VideoController::class, 'show'])

    ->name('videos.show');
//    ->middleware('admin');

Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])
    ->name('videos.edit');

Route::post('/videos/{video}', [VideoController::class, 'update'])
    ->name('videos.update');

Route::get('/categories/{category:slug}/videos', [CategoryVideoController::class, 'index'])
    ->name('categories.videos.index');

Route::post('/videos/{video}/comments', [\App\Http\Controllers\CommentController::class, 'store'])
    ->name('comments.store');



Route::get('{likeable_type}/{likeable_id}/like' , [LikeController::class, 'store'])
    ->name('like.store');

Route::get('{likeable_type}/{likeable_id}/dislike' , [DisLikeController::class, 'store'])
    ->name('dislike.store');

//
//Route::get('cache' , function (){
//    $value = Cache::remember('video-count', 5, function () {
//         return Video::all()->count();
//    });
//
//    dd($value);
//});

require __DIR__ . '/auth.php';



// panel admin

Route::group([ 'prefix' => 'dashboard', 'middleware' => ['auth', 'admin']], function () {

    Route::get('home' , [\App\Http\Controllers\panel\PanelControllers::class, 'home'])
        ->name('panel.home');

    Route::get('category/videos' , [\App\Http\Controllers\panel\PanelControllers::class, 'categoryVideos'])
        ->name('panel.category.videos');


    Route::get('videos/all' , [\App\Http\Controllers\panel\PanelControllers::class, 'showAll'])
        ->name('panel.show.all');

    Route::get('videos/{video}' , [\App\Http\Controllers\panel\PanelControllers::class, 'show'])
        ->name('panel.show');

    Route::get('details' , [\App\Http\Controllers\panel\PanelControllers::class, 'showDetails'])
        ->name('panel.show.details');

    Route::get('video/create' , [\App\Http\Controllers\panel\PanelControllers::class, 'create'])
        ->name('panel.video.create');

    Route::post('videos' , [\App\Http\Controllers\panel\PanelControllers::class, 'store'])
        ->name('panel.videos.store');

    Route::get('video/edit' , [\App\Http\Controllers\panel\PanelControllers::class, 'showEdit'])
        ->name('panel.show.video.edit');

    Route::get('videos/{video}/edit' , [\App\Http\Controllers\panel\PanelControllers::class, 'edit'])
        ->name('panel.video.edit');

    Route::post('videos/{video}' , [\App\Http\Controllers\panel\PanelControllers::class, 'update'])
        ->name('panel.video.update');

    Route::delete('destroy/{video}' , [\App\Http\Controllers\panel\PanelControllers::class, 'destroy'])
        ->name('panel.video.destroy');





    Route::post('videos/change-status', [\App\Http\Controllers\panel\PanelControllers::class, 'changeStatus'])->name('videos.changeStatus');

});
//
//










////signed Route

//Route::get('/verify{id}' , function (){
//    dd(request()->hasValidSignature());
//         echo "hello";
//
//})->name('verify');
//Route::get('generate' , function (){
//
//    return URL::temporarySignedRoute('verify', now()->addSecond(10)  , ["id" => 4]);
//});




//
//Route::get('verify  ' , function (){
//    \App\Jobs\Otp::dispatch();
//
//});

//
//
//Route::get('jops' , function () {
//
//   \App\Jobs\ProcessVideo::dispatch();
//   \App\Jobs\Otp::dispatch();
//});
//
//Route::get('email',function (){
//    \Illuminate\Support\Facades\Mail::to('vpnsra@hi2.in')->send(new \App\Mail\VerifyEmail(User::first()));
//});


/*event*/

//Route::get('event' , function (){
//    $video = Video::first();
//    \App\Events\VideoCreated::dispatch($video);
//});



//Route::get('verify' , function (){
//     $user= User::find(6);
//     $user->notify(new VideoProcessed(Video::first()));
//});















