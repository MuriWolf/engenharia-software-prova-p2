<?php

namespace App\Repositories;

use App\Models\Autor;

class AutorRepository {
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return Autor::all();
    }

    public function create(array $data): ?Autor
    {
        return Autor::create($data);
    }

    public function find(int $id): ?Autor
    {
        return Autor::find($id);
    }

    // public function findBooksByAuthor(int $autorId): \Illuminate\Database\Eloquent\Collection
    // {
    //     // return Autor::find($id);
    // }

    public function update(array $data, $id): int
    {
        $autor = Autor::findOrFail($id);

        return $autor->update($data);
    }

    public function destroy($id): bool
    {
        $autor = Autor::findOrFail($id);

        return $autor->delete();
    }
}

