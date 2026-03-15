<?php 

namespace App\Repositories\Interfaces;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function index();
    public function create(array $data);
    public function delete(Post $post);
}