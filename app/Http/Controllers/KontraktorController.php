<?php

namespace App\Http\Controllers;

use App\Http\Requests\KontraktorCreateRequest;
use App\Http\Requests\KontraktorUpdateRequest;
use App\Http\Resources\KontraktorResource;
use App\Services\Contracts\KontraktorServiceInterface;
use Illuminate\Http\JsonResponse;

class KontraktorController extends Controller
{
    public function __construct(
        protected KontraktorServiceInterface $kontraktorService,
    ) {
    }

    public function create(KontraktorCreateRequest $request): JsonResponse
    {
        $data = $request->validated();

        $this->kontraktorService->create($data);

        return response()->json(['message' => 'success created'])->setStatusCode(201);
    }


    public function getAll(): JsonResponse
    {
        $kontraktor = $this->kontraktorService->getAll();
        return response()->json([
            'message' => 'success',
            'data' => KontraktorResource::collection($kontraktor),
        ])->setStatusCode(200);
    }

    public function getOne(string $id): JsonResponse
    {
        $kontraktor = $this->kontraktorService->getById($id);
        return response()->json([
            'message' => 'success',
            'data' => new KontraktorResource($kontraktor),
        ])->setStatusCode(200);
    }

    public function update(string $id, KontraktorUpdateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $kontraktor = $this->kontraktorService->update($id, $data);

        return response()->json([
            'message' => 'success updated',
            'data' => new KontraktorResource($kontraktor),
        ])->setStatusCode(200);
    }

    public function delete(string $id): JsonResponse
    {
        $this->kontraktorService->delete($id);
        return response()->json([
            'message' => 'success delete'
        ])->setStatusCode(200);
    }
}
