<?php 

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function me($id)
    {
        return $this->userRepository->me($id);
    }

    public function edit($request)
    {
        $user = auth()->user();

        $data = [
            'name' => $request->name ?? $user->name,
            'username' => $request->username ?? $user->username,
            'email' => $request->email ?? $user->email,
        ];

        if ($request->hasFile('avatar')) {
            $imagePath = $request->file('avatar')->store('profiles', 'public');

            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $data['avatar'] = $imagePath;
        }

        return $this->userRepository->edit($data, $user->id);
    }
}