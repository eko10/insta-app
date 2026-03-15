<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\LikeService;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function like($postId)
    {
        $liked = $this->likeService->toggleLike($postId);

        return ApiResponse::success([
            'liked' => $liked
        ]);
    }
}
