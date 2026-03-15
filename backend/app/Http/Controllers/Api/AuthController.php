<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Helpers\ApiResponse;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthResource;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $result = $this->authService->register($request->validated());

        return ApiResponse::success(
            new AuthResource($result['user'], $result['token']),
            'Register success'
        );
    }

    public function login(LoginRequest $request)
    {
        $result = $this->authService->login($request->validated());

        if(!$result) {
            return ApiResponse::error('Invalid Email or Password', 401);
        }

        return ApiResponse::success(
            new AuthResource($result['user'], $result['token']),
            'Login success'
        );
    }
}
