<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user ? [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'username' => $this->user->username,
                'email' => $this->user->email,
                'avatar' => $this->user->avatar_url,
            ] : null,
            'comment' => $this->comment,
            'created_at' => $this->created_at ? $this->created_at->diffForHumans() : null,
        ];
    }
}
