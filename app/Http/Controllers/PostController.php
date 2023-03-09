<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request){
      $this->authorize('viewAny', Post::class);
      return response()->json(Post::all()->with("author.name")->makeHidden(["content"]));
    }
    public function show(Request $request,Post $post){
      $this->authorize('view',$post);
      return response()->json($post);
    }
    // for nextjs static caching.
    // Gets data without user authorization. guarded by middleware "client" (of Laravel Passport) instead
    public function dataForStaticCaching(){
      return response()->json(Post::all());
    }

}
