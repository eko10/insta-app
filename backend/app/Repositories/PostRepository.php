<?php 

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function index()
    {
        return Post::with(['user','comments.user'])
            ->withCount(['likes','comments'])
            ->withExists([
                'likes as is_liked' => function ($query) {
                    $query->where('user_id', auth()->id());
                }
            ])
            ->latest()
            ->paginate(10);
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