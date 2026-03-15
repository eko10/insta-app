<?php 

namespace App\Services;

use App\Repositories\Interfaces\AuthRepositoryInterface;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(array $data)
    {
        $user = $this->authRepository->register($data);

        $token = $user->createToken('instaapp-token')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user
        ];
    }

    public function login(array $credentials)
    {
        $user = $this->authRepository->login($credentials);

        if(!$user) {
            return null;
        }

        $token = $user->createToken('instaapp-token')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user
        ];
    }
}