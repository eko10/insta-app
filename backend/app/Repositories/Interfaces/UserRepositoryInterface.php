<?php 

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function me(int $id);
    public function edit(array $data, $id);
}