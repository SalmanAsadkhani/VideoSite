<?php


use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\VideoController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::prefix('v1')->group(function () {

    Route::get('videos/{video:slug}', [VideoController::class, 'show']);
    Route::get('videos', [VideoController::class, 'index']);
    Route::post('videos', [VideoController::class, 'store'])->middleware('auth:sanctum');
    Route::put('videos/{Video:slug}', [VideoController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('videos/{video:slug}', [VideoController::class, 'destroy'])->middleware('auth:sanctum');
});

Route::prefix('v1/auth')->group(function () {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('userinfo', [AuthController::class, 'userInfo'])->middleware('auth:sanctum');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

});
