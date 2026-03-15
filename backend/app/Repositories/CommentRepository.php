<?php 

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    public function create(array $data)
    {
        return Comment::create($data);
    }

    public function getByPost($postId)
    {
        return Comment::where('post_id', $postId)->latest()->get();
    }
}