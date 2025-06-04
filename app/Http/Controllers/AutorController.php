<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutorResource;
use App\Models\Autor;
use App\Services\AutorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function __construct(protected AutorService $autorService)
    {
    }

    public function index(): JsonResponse
    {
        $autores = $this->autorService->all();

        return AutorResource::collection($autores)->response()->setStatusCode(200);
    }

    public function show($id): JsonResponse
    {
        $autor = $this->autorService->find($id);

        return new AutorResource($autor)->response()->setStatusCode(200);

    }

    public function store(Request $request): JsonResponse
    {
        $autor = $this->autorService->create($request->all());

        if (!$autor instanceof Autor) {
            throw new \UnexpectedValueException('Falha ao criar autor');
        }

        return new AutorResource($autor)->response()->setStatusCode(201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $resultado = $this->autorService->update($request->all(), $id);

        if ($resultado <= 0) {
            throw new \UnexpectedValueException('Falha ao atualizar o autor');
        }

        return response()->json($id, 204);
    }

    public function destroy(int $id): JsonResponse
    {
        $resultado = $this->autorService->destroy($id);

        if (!is_bool($resultado)) {
            throw new \UnexpectedValueException('Falha ao deletar o autor');
        }

        return response()->json($resultado, 204);
    }
}
