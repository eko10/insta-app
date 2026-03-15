<?php 

namespace App\Repositories;

use App\Models\Like;
use App\Repositories\Interfaces\LikeRepositoryInterface;

class LikeRepository implements LikeRepositoryInterface
{
    public function toggle($userId, $postId)
    {
        $like = Like::where('user_id', $userId)
            ->where('post_id', $postId)
            ->first();

        if($like) {
            $like->delete();
            return false;
        }

        Like::create([
            'user_id' => $userId,
            'post_id' => $postId
        ]);

        return true;
    }
}