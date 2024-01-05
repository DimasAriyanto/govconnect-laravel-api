<?php

namespace App\Services;

use App\Http\Resources\ProyekResource;
use App\Models\Proyek;
use App\Repositories\Contracts\ProyekRepositoryInterface;
use App\Services\Contracts\ProyekServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ProyekService implements ProyekServiceInterface
{
    protected $proyekRepository;

    public function __construct(ProyekRepositoryInterface $proyekRepository)
    {
        $this->proyekRepository = $proyekRepository;
    }

    public function getAll(): Collection
    {
        return $this->proyekRepository->getAll();
    }

    public function getById(string $id): Proyek
    {
        $proyek = $this->proyekRepository->getById($id);
        if (!$proyek) {
            throw new ModelNotFoundException('Proyek dengan Id ' . $id . ' tidak ditemukan');
        }

        return $proyek;
    }

    public function create(array $data): Proyek
    {
        return $this->proyekRepository->create($data);
    }

    public function getAllKontraktor(string $id)
    {
        return $this->proyekRepository->getAllKontraktor($id);
    }

    public function search($request)
    {
        return $this->proyekRepository->search($request);
    }

    public function update(string $id, array $data)
    {
        $proyek = $this->getById($id);

        return $this->proyekRepository->update($proyek, $data);
    }

    public function delete(string $id)
    {
        $proyek = $this->getByid($id);

        return $this->proyekRepository->delete($proyek);
    }
}
