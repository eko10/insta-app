<?php 

namespace App\Repository;

use App\Models\User;
use App\Repository\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    public function login(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            return null;
        }

        return Auth::user();
    }
}