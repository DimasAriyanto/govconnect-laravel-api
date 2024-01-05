<?php

namespace App\Services\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface AuthServiceInterface
{
    public function getByEmail(string $email): User;

    public function checkAvailable(string $email): bool;

    public function create(array $data): User;
}
