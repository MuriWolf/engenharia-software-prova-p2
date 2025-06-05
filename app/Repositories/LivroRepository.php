<?php

namespace App\Repositories;

use App\Models\Livro;
use App\Models\Review;

class LivroRepository
{
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return Livro::all();
    }

    public function create(array $data): ?Livro
   {
        return Livro::create($data);
    }

    public function find(int $id): ?Livro
    {
        return Livro::find($id);
    }

    public function findBookReviews(int $bookId): \Illuminate\Database\Eloquent\Collection
    {
        return Livro::find($bookId)->review;
    }

    public function getBookDetails(): \Illuminate\Database\Eloquent\Collection
    {
        return Livro::with('review', 'autor', 'genero')->get();
    }

    public function update(array $data, $id): int
    {
        $livro = Livro::findOrFail($id);

        return $livro->update($data);
    }

    public function destroy($id): bool
    {
        $livro = Livro::findOrFail($id);

        return $livro->delete();
    }
}

