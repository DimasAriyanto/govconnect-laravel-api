<?php

namespace App\Services\Contracts;

use App\Models\Kontraktor;
use Illuminate\Database\Eloquent\Collection;

interface KontraktorServiceInterface
{
    public function getAll(): Collection;

    public function getById(string $id): Kontraktor;

    public function create(array $data): Kontraktor;

    public function update(string $id, array $data);

    public function delete(string $id);
}
