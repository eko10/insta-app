<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;

class LikeController extends Controller
{
    public function like($postId)
    {
        Like::firstOrCreate([
            'user_id' => auth()->id(),
            'post_id' => $postId
        ]);

        return response()->json(['message' => 'liked this post']);
    }
}
