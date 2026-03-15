<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::with('user', 'likes', 'comments')->latest()->paginate(10);
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('posts', 'public');

        $post = Post::create([
            'user_id' => auth()->id(),
            'caption' => $request->caption,
            'image' => $path
        ]);

        return response()->json($post);
    }
}
