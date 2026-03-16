<?php 

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Post;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    public function create(array $data)
    {
        if (!Post::where('id', $data['post_id'])->exists()) {
            throw new \Exception('Post not found');
        }

        return Comment::create($data);
    }

    public function getByPost($postId)
    {
        if (!Post::where('id', $postId)->exists()) {
            throw new \Exception('Post not found');
        }

        return Comment::where('post_id', $postId)->latest()->paginate(10);
    }
}