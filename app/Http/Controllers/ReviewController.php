<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function __construct(protected ReviewService $reviewService)
    {
    }

    public function index(): JsonResponse
    {
        $reviews = $this->reviewService->all();

        return response()->json($reviews, 200);
    }

    public function show($id): JsonResponse
    {
        $review = $this->reviewService->find($id);

        return response()->json($review, 200);

    }

    public function store(Request $request): JsonResponse
    {
        $review = $this->reviewService->create($request->all());

        if (!$review instanceof Review) {
            throw new \UnexpectedValueException('Falha ao criar a review');
        }

        return response()->json($review, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $resultado = $this->reviewService->update($request->all(), $id);

        if ($resultado <= 0) {
            throw new \UnexpectedValueException('Falha ao atualizar a review');
        }

        return response()->json($id, 204);
    }

    public function destroy(int $id): JsonResponse
    {
        $resultado = $this->reviewService->destroy($id);

        if (!is_bool($resultado)) {
            throw new \UnexpectedValueException('Falha ao deletar a review');
        }

        return response()->json($resultado, 204);
    }
}
