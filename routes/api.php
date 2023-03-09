<?php

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
    $user=$request->user();
    return collect($user->toArray())->merge([
        "can_see_content_group_ids"=>$user->can_see_content_groups->pluck("id")
      ]);
});

Route::group(["middleware"=>"client","prefix"=>"post/data","controller"=>"PostController"],function(){
  Route::get("","indexForStaticCaching");
  Route::get("{post}","showForStaticCaching");
});

Route::group(["prefix"=>"post","controller"=>"PostController"],function(){
  Route::group(["middleware"=>["auth:api"]],function(){
    Route::get("","index");
    Route::get("{post}","show");
  });
});
