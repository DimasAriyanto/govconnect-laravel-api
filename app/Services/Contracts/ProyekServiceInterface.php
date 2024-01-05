<?php

namespace App\Services\Contracts;

use App\Models\Proyek;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface ProyekServiceInterface
{
    public function getAll(): Collection;

    public function getById(string $id): Proyek;

    public function create(array $data): Proyek;

    public function getAllKontraktor(string $id);

    public function search($request);

    public function update(string $id, array $data);

    public function delete(string $id);
}
