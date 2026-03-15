<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    protected $token;

    public function __construct($resource, $token)
    {
        parent::__construct($resource);
        $this->token = $token;
    }

    public function toArray($request)
    {
        return [
            'token' => $this->token,
            'user' => new UserResource($this->resource)
        ];
    }
}
