<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        return Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $postId,
            'comment' => $request->comment
        ]);

        return response()->json(['message' => 'saved comment']);
    }
}
