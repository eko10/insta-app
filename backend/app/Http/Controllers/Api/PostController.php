<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return PostResource::collection(
            $this->postService->index()
        );
    }

    public function store(PostRequest $request)
    {
        $post = $this->postService->create($request);

        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        if($post->user_id != auth()->id()) {
            return ApiResponse::error('Forbidden access', 403);
        }

        $this->postService->delete($post);

        return ApiResponse::success(null, 'Post deleted');
    }
}
