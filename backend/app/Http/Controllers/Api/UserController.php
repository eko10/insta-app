<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function me()
    {
        $user = $this->userService->me(auth()->id());
        return new UserResource($user); 
    }

    public function edit(UserRequest $request)
    {
        $user = $this->userService->edit($request);

        return new UserResource($user);
    }
}
