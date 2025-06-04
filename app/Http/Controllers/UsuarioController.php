<?php

namespace App\Http\Controllers;

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
        $users = $this->usuarioService->all();

        return response()->json($users, 200);
    }

    public function show($id): JsonResponse
    {
        $user = $this->usuarioService->find($id);

        return response()->json($user, 200);

    }

    public function store(Request $request): JsonResponse
    {
        $usuario = $this->usuarioService->create($request->all());

        if (!$usuario instanceof Usuario) {
            throw new \UnexpectedValueException('Falha ao criar usuario');
        }

        return response()->json($usuario, 201);
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
