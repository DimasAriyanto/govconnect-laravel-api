<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function getByEmail(string $email): User|null;

    public function checkAvailable(string $email): bool;

    public function create(array $data): User;
}
