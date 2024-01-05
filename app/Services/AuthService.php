<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthService implements AuthServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getByEmail(string $email): User
    {
        $user = $this->userRepository->getByEmail($email);
        if (!$user) {
            throw new ModelNotFoundException('User dengan email ' . $email . ' tidak ditemukan');
        }

        return $user;
    }

    public function checkAvailable(string $email): bool
    {
        return $this->userRepository->checkAvailable($email);
    }

    public function create(array $data): User
    {
        return $this->userRepository->create($data);
    }
}
