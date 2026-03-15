<?php 

namespace App\Services;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return $this->postRepository->index();
    }

    public function create($request)
    {
        $imagePath = $request->file('image')->store('posts','public');

        return $this->postRepository->create([
            'user_id' => auth()->id(),
            'caption' => $request->caption,
            'image' => $imagePath
        ]);
    }

    public function delete(Post $post)
    {
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        return $this->postRepository->delete($post);
    }
}