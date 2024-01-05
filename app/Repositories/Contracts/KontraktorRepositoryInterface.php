<?php

namespace App\Repositories\Contracts;

use App\Models\Kontraktor;
use Illuminate\Database\Eloquent\Collection;

interface KontraktorRepositoryInterface
{
    public function create(array $data): Kontraktor;

    public function getAll(): Collection;

    public function getById(string $id): Kontraktor|null;

    public function update(Kontraktor $kontraktor, array $data);

    public function delete(Kontraktor $kontraktor);
}
