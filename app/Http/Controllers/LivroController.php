<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Services\LivroService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function __construct(protected LivroService $livroService)
    {
    }

    public function index(): JsonResponse
    {
        $livros = $this->livroService->all();

        return response()->json($livros, 200);
    }

    public function show($id): JsonResponse
    {
        $livro = $this->livroService->find($id);

        return response()->json($livro, 200);

    }

    public function store(Request $request): JsonResponse
    {
        $livro = $this->livroService->create($request->all());

        if (!$livro instanceof Livro) {
            throw new \UnexpectedValueException('Falha ao criar livro');
        }

        return response()->json($livro, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $resultado = $this->livroService->update($request->all(), $id);

        if ($resultado <= 0) {
            throw new \UnexpectedValueException('Falha ao atualizar o livro');
        }

        return response()->json($id, 204);
    }

    public function destroy(int $id): JsonResponse
    {
        $resultado = $this->livroService->destroy($id);

        if (!is_bool($resultado)) {
            throw new \UnexpectedValueException('Falha ao deletar o livro');
        }

        return response()->json($resultado, 204);
    }
}
