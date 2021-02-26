<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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






Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('users', function(){
    return response()->json(\App\Models\User::all());
});

Route::post('users',[UserController::class, 'apiStore']);
Route::get('users', [UserController::class, 'apiReturn']);
Route::get('users/{user}', [UserController::class, 'getUser']);

//http://127.0.0.1:8000/api/users
Route::post('login',[UserController::class, 'apiLogin']);
Route::get('posts/{post}/likes', [PostController::class, 'apiGetLikes']);
Route::patch('posts/{posts}', [PostController::class, 'apiUpdate']);
Route::group(['middleware'=> ['auth:api']], function(){

    Route::get('users/{user}', [UserController::class, 'getUser']);

    // Route::patch('posts/{posts}/likes', [PostController::class, 'apiUpdateLikes']);
    // Route::get('posts/{post}/likes', [PostController::class, 'apiGetLikes']);
});

Route::get('user',function(){

})->middleware(('auth:api'));
