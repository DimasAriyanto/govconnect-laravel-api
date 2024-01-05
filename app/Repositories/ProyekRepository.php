<?php

namespace App\Repositories;

use App\Models\Proyek;
use App\Repositories\Contracts\ProyekRepositoryInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ProyekRepository implements ProyekRepositoryInterface
{
    public function create(array $data): Proyek
    {
        return Proyek::create($data);
    }

    public function getAll(): Collection
    {
        return Proyek::all();
    }

    public function getById(string $id): Proyek|null
    {
        return Proyek::find($id);
    }

    public function getAllKontraktor(string $id)
    {
        return Proyek::where('kontraktor_id', $id)->get();
    }

    public function search($request)
    {
        $proyek = Proyek::query();

        $proyek = $proyek->where(function (Builder $builder) use ($request) {
            $nama = $request->input('nama');

            if ($nama) {
                $builder->whereRaw('LOWER(nama) like ?', ['%' . strtolower($nama) . '%']);
            }
        });

        return $proyek->get();
    }

    public function update(Proyek $proyek, array $data)
    {
        $proyek->update($data);

        return $proyek;
    }

    public function delete(Proyek $proyek)
    {
        $proyek->delete();

        return $proyek;
    }
}
