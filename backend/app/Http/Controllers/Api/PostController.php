<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function destroy(Post $post)
    {
        if($post->user_id != auth()->id()){
            return response()->json(['message' => 'Forbidden'], 403);
        }

        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return response()->json(['message' => 'post deleted']);
    }
}
