<?php

namespace App\Http\Controllers;

use App\Http\Resources\GeneroResource;
use App\Models\Genero;
use App\Services\GeneroService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class GeneroController extends Controller
{
    public function __construct(protected GeneroService $GeneroService)
    {
    }

    public function index(): JsonResponse
    {
        $generos = $this->GeneroService->all();

        return GeneroResource::collection($generos)->response()->setStatusCode(200);
    }

    public function show($id): JsonResponse
    {
        $genero = $this->GeneroService->find($id);

        return new GeneroResource($genero)->response()->setStatusCode(200);
    }

    public function store(Request $request): JsonResponse
    {
        $genero = $this->GeneroService->create($request->all());

        if (!$genero instanceof Genero) {
            throw new \UnexpectedValueException('Falha ao criar gênero');
        }

        return new GeneroResource($genero)->response()->setStatusCode(201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $resultado = $this->GeneroService->update($request->all(), $id);

        if ($resultado <= 0) {
            throw new \UnexpectedValueException('Falha ao atualizar o gênero');
        }

        return response()->json($id, 204);
    }

    public function destroy(int $id): JsonResponse
    {
        $resultado = $this->GeneroService->destroy($id);

        if (!is_bool($resultado)) {
            throw new \UnexpectedValueException('Falha ao deletar o gênero');
        }

        return response()->json($resultado, 204);
    }
}
