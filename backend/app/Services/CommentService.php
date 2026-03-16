<?php 

namespace App\Services;

use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentService
{
    protected $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function create($postId, $comment)
    {
        return $this->commentRepository->create([
            'user_id' => auth()->id(),
            'post_id' => $postId,
            'comment' => $comment
        ]);
    }

    public function getByPost($postId)
    {
        return $this->commentRepository->getByPost($postId);
    }
}