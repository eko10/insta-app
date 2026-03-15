<?php 

namespace App\Repositories\Interfaces;

interface CommentRepositoryInterface
{
    public function create(array $data);
    public function getByPost(int $postId);
}