<?php

namespace App\Repositories;

use App\Models\Genero;

class GeneroRepository
{
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return Genero::all();
    }

    public function create(array $data): ?Genero
    {
        return Genero::create($data);
    }

    public function find(int $id): ?Genero
    {
        return Genero::find($id);
    }

    public function findBooksByGenre(int $generoId): \Illuminate\Database\Eloquent\Collection
    {
        return Genero::find($generoId)->livros;
    }

    public function findGenresAndTheirBooks(): \Illuminate\Database\Eloquent\Collection
    {
        return Genero::with('livros')->get();
    }

    public function update(array $data, $id): int
    {
        $genero = Genero::findOrFail($id);

        return $genero->update($data);
    }

    public function destroy($id): bool
    {
        $genero = Genero::findOrFail($id);

        return $genero->delete();
    }
}

