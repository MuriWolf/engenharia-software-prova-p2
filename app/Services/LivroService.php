<?php

namespace App\Services;

use App\Models\Livro;
use App\Repositories\LivroRepository;

class LivroService {
    public function __construct(protected LivroRepository $livroRepository)
    {
    }

    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->livroRepository->all();
    }

    public function create(array $data): ?Livro {
        return $this->livroRepository->create($data);
    }

    public function find(int $id): ?Livro {
        return $this->livroRepository->find($id);
    }

    public function update(array $data, $id): int {
        return $this->livroRepository->update($data, $id);
    }

    public function destroy($id): bool {
        return $this->livroRepository->destroy($id);
    }
}
