<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowPostsResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function index()
    {
        $posts = ShowPostsResource::collection(Post::all());

        return response()->json(['posts' => $posts]);
    }

    public function create(Request $request)
    {
        return Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id
        ]);
    }
}
