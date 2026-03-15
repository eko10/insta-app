<?php 

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function index()
    {
        return Post::with(['user','likes','comments'])->latest()->paginate(10);
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function delete(Post $post)
    {
        return $post->delete();
    }
}