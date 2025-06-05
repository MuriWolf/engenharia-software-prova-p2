<?php

namespace App\Repositories;

use App\Models\Review;
use App\Models\Usuario;

class UsuarioRepository
{
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return Usuario::all();
    }

    public function create(array $data): ?Usuario
    {
        return Usuario::create($data);
    }

    public function find(int $id): ?Usuario
    {
        return Usuario::find($id);
    }

    public function findReviewsByUser(int $userId): \Illuminate\Database\Eloquent\Collection
    {
        return Usuario::find($userId)->reviews;
    }

    public function update(array $data, $id): int
    {
        $usuario = Usuario::findOrFail($id);

        return $usuario->update($data);
    }

    public function destroy($id): bool
    {
        $usuario = Usuario::findOrFail($id);

        return $usuario->delete();
    }
}

