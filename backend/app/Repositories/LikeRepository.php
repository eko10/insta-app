<?php 

namespace App\Repositories;

use App\Models\Like;
use App\Models\Post;
use App\Repositories\Interfaces\LikeRepositoryInterface;

class LikeRepository implements LikeRepositoryInterface
{
    public function toggle($userId, $postId)
    {
        $postExists = Post::where('id', $postId)->exists();

        if (!$postExists) {
            throw new \Exception('Post not found');
        }

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