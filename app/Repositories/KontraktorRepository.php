<?php

namespace App\Repositories;

use App\Models\Kontraktor;
use App\Repositories\Contracts\KontraktorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class KontraktorRepository implements KontraktorRepositoryInterface
{
    public function getAll(): Collection
    {
        return Kontraktor::all();
    }

    public function getById(string $id): Kontraktor|null
    {
        return Kontraktor::find($id);
    }

    public function create(array $data): Kontraktor
    {
        return Kontraktor::create($data);
    }

    public function update(Kontraktor $kontraktor, array $data)
    {
        $kontraktor->update($data);

        return $kontraktor;
    }

    public function delete(Kontraktor $kontraktor)
    {
        $kontraktor->delete();

        return $kontraktor;
    }
}
