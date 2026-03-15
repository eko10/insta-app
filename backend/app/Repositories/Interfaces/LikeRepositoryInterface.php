<?php 

namespace App\Repositories\Interfaces;

interface LikeRepositoryInterface
{
    public function toggle(int $userId, int $postId);
}