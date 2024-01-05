<?php

namespace App\Repositories\Contracts;

use App\Models\Proyek;
use Illuminate\Database\Eloquent\Collection;

interface ProyekRepositoryInterface
{
    public function create(array $data): Proyek;

    public function getAll(): Collection;

    public function getById(string $id): Proyek|null;

    public function getAllKontraktor(string $id);

    public function search($request);

    public function update(Proyek $proyek, array $data);

    public function delete(Proyek $proyek);
}
