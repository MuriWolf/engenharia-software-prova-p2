<?php

namespace App\Repositories;

use App\Models\Review;

class ReviewRepository
{
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return Review::all();
    }

    public function create(array $data): ?Review
    {
        return Review::create($data);
    }

    public function find(int $id): ?Review
    {
        return Review::find($id);
    }

    public function update(array $data, $id): int
    {
        $review = Review::findOrFail($id);

        return $review->update($data);
    }

    public function destroy($id): bool
    {
        $review = Review::findOrFail($id);

        return $review->delete();
    }
}

