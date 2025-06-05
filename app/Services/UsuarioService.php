<?php

namespace App\Services;

use App\Repositories\UsuarioRepository;
use App\Models\Usuario;

class UsuarioService {
    public function __construct(protected UsuarioRepository $usuarioRepository)
    {
    }

    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->usuarioRepository->all();
    }

    public function create(array $data): ?Usuario {
        return $this->usuarioRepository->create($data);
    }

    public function find(int $id): ?Usuario {
        return $this->usuarioRepository->find($id);
    }

    public function findReviewsByUser(int $userId): \Illuminate\Database\Eloquent\Collection
    {
        return $this->usuarioRepository->findReviewsByUser($userId);
    }

    public function update(array $data, $id): int {
        return $this->usuarioRepository->update($data, $id);
    }

    public function destroy($id): bool {
        return $this->usuarioRepository->destroy($id);
    }
}
