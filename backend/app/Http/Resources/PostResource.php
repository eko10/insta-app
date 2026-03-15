<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author' => $this->user ? [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
            ] : null,
            'comments' => $this->comments->map(function($comment) {
                return [
                    'id' => $comment->id,
                    'user' => ($comment->user) ? [
                        'id' => $comment->user->id,
                        'name' => $comment->user->name,
                        'email' => $comment->user->email,
                    ] : null,
                    'comment' => $comment->comment,
                    'created_at' => $comment->created_at->diffForHumans(),
                ];
            }),
            'likes' => $this->likes->map(function($like) {
                return [
                    'id' => $like->id,
                    'user' => ($like->user) ? [
                        'id' => $like->user->id,
                        'name' => $like->user->name,
                        'email' => $like->user->email,
                    ] : null,
                    'created_at' => $like->created_at->diffForHumans(),
                ];
            }),
            'caption' => $this->caption,
            'image' => $this->image ? asset('storage/'.$this->image) : null,
            'total_comments' => (int) $this->comments_count,
            'total_likes' => (int) $this->likes_count,
            'is_liked' => (bool) $this->is_liked,
            'created_at' => $this->created_at ? $this->created_at->diffForHumans() : null,
        ];
    }
}
