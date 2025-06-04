<?php

namespace App\Services;

use App\Models\Review;
use App\Repositories\ReviewRepository;

class ReviewService {
    public function __construct(protected ReviewRepository $reviewRepository)
    {
    }

    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->reviewRepository->all();
    }

    public function create(array $data): ?Review {
        return $this->reviewRepository->create($data);
    }

    public function find(int $id): ?Review {
        return $this->reviewRepository->find($id);
    }

    public function update(array $data, $id): int {
        return $this->reviewRepository->update($data, $id);
    }

    public function destroy($id): bool {
        return $this->reviewRepository->destroy($id);
    }
}
