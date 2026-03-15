<?php 

namespace App\Repository\Interfaces;

interface AuthRepositoryInterface
{
    public function createUser(array $data);
    public function attemptLogin(array $credentials);
}