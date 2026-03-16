<?php 

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function me($id)
    {
        return User::find($id);
    }

    public function edit(array $data, $id)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }
}