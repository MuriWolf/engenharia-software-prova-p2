<?php

namespace App\Http\Controllers;

use App\Http\Resources\LivroDetalhesResource;
use App\Http\Resources\LivroResource;
use App\Http\Resources\ReviewResource;
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

        return LivroResource::collection($livros)->response()->setStatusCode(200);
    }

    public function show($id): JsonResponse
    {
        $livro = $this->livroService->find($id);

        return new LivroResource($livro)->response()->setStatusCode(200);
    }

    public function showReviewsByBook(int $bookId): JsonResponse
    {
        $reviews =  $this->livroService->findBookReviews($bookId);

        return ReviewResource::collection($reviews)->response()->setStatusCode(200);
    }

    public function getBookDetails(): JsonResponse 
    {
        $detalhes = $this->livroService->getBookDetails();

        return LivroDetalhesResource::collection($detalhes)->response()->setStatusCode(200);
    }

    public function store(Request $request): JsonResponse
    {
        $livro = $this->livroService->create($request->all());

        if (!$livro instanceof Livro) {
            throw new \UnexpectedValueException('Falha ao criar livro');
        }

        return new LivroResource($livro)->response()->setStatusCode(201);
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
