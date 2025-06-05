<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Http\Resources\UsuarioResource;
use App\Models\Usuario;
use App\Services\UsuarioService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(protected UsuarioService $usuarioService)
    {
    }

    public function index(): JsonResponse
    {
        $usuarios = $this->usuarioService->all();

        return UsuarioResource::collection($usuarios)->response()->setStatusCode(200);
    }

    public function show($id): JsonResponse
    {
        $usuario = $this->usuarioService->find($id);

        return new UsuarioResource($usuario)->response()->setStatusCode(200);
    }

    public function showReviewsByUser(int $userId): JsonResponse 
    {
        $reviews = $this->usuarioService->findReviewsByUser($userId);

        return ReviewResource::collection($reviews)->response()->setStatusCode(200);
    }

    public function store(Request $request): JsonResponse
    {
        $usuario = $this->usuarioService->create($request->all());

        if (!$usuario instanceof Usuario) {
            throw new \UnexpectedValueException('Falha ao criar usuario');
        }

        return new UsuarioResource($usuario)->response()->setStatusCode(200);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $resultado = $this->usuarioService->update($request->all(), $id);

        if ($resultado <= 0) {
            throw new \UnexpectedValueException('Falha ao atualizar o usuario');
        }

        return response()->json($id, 204);
    }

    public function destroy(int $id): JsonResponse
    {
        $resultado = $this->usuarioService->destroy($id);

        if (!is_bool($resultado)) {
            throw new \UnexpectedValueException('Falha ao deletar o usuario');
        }

        return response()->json($resultado, 204);
    }
}
