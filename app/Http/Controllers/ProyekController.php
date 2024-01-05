<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyekCreateRequest;
use App\Http\Requests\ProyekUpdateRequest;
use App\Http\Resources\ProyekResource;
use App\Services\Contracts\ProyekServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function __construct(
        protected ProyekServiceInterface $proyekService,
    ) {
    }

    public function create(ProyekCreateRequest $request): JsonResponse
    {
        $data = $request->validated();

        $this->proyekService->create($data);

        return response()->json(['message' => 'success created'])->setStatusCode(201);
    }

    public function getAll(): JsonResponse
    {
        $proyek = $this->proyekService->getAll();
        return response()->json([
            'message' => 'success',
            'data' => ProyekResource::collection($proyek),
        ])->setStatusCode(200);
    }

    public function getOne(string $id): JsonResponse
    {
        $proyek = $this->proyekService->getById($id);
        return response()->json([
            'message' => 'success',
            'data' => new ProyekResource($proyek),
        ])->setStatusCode(200);
    }

    public function getAllKontraktor(string $kontraktorId): JsonResponse
    {
        $proyek = $this->proyekService->getAllKontraktor($kontraktorId);
        return response()->json([
            'message' => 'success',
            'data' => ProyekResource::collection($proyek),
        ])->setStatusCode(200);
    }

    public function search(Request $request): JsonResponse
    {
        $proyek = $this->proyekService->search($request);

        return response()->json([
            'message' => 'success',
            'data' => ProyekResource::collection($proyek),
        ])->setStatusCode(200);
    }

    public function update(string $id, ProyekUpdateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $proyek = $this->proyekService->update($id, $data);

        return response()->json([
            'message' => 'success updated',
            'data' => new ProyekResource($proyek),
        ])->setStatusCode(200);
    }

    public function delete(string $id): JsonResponse
    {
        $this->proyekService->delete($id);
        return response()->json([
            'data' => 'success delete',
        ])->setStatusCode(200);
    }
}
