<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user ? [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
            ] : null,
            'caption' => $this->caption,
            'image' => $this->image,
            'created_at' => $this->created_at ? $this->created_at->diffForHumans() : null,
        ];
    }
}
