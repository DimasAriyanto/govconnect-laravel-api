<?php

namespace App\Services;

use App\Models\Kontraktor;
use App\Repositories\Contracts\KontraktorRepositoryInterface;
use App\Services\Contracts\KontraktorServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;

class KontraktorService implements KontraktorServiceInterface
{
    protected $kontraktorRepository;

    public function __construct(KontraktorRepositoryInterface $kontraktorRepository)
    {
        $this->kontraktorRepository = $kontraktorRepository;
    }

    public function getAll(): Collection
    {
        return $this->kontraktorRepository->getAll();
    }

    public function getById(string $id): Kontraktor
    {
        $kontraktor = $this->kontraktorRepository->getById($id);
        if (!$kontraktor) {
            throw new HttpResponseException(response()->json([
                'errors' => [
                    "message" => [
                        "not found"
                    ]
                ]
            ])->setStatusCode(404));
        }

        return $kontraktor;
    }

    public function create(array $data): Kontraktor
    {
        return $this->kontraktorRepository->create($data);
    }

    public function update(string $id, array $data)
    {
        $kontraktor = $this->getById($id);

        return $this->kontraktorRepository->update($kontraktor, $data);
    }

    public function delete(string $id)
    {
        $kontraktor = $this->getByid($id);

        return $this->kontraktorRepository->delete($kontraktor);
    }
}
