<?php

namespace App\Services;

use App\Models\Genero;
use App\Repositories\GeneroRepository;

class GeneroService {
    public function __construct(protected GeneroRepository $generoRepository)
    {
    }

    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->generoRepository->all();
    }

    public function create(array $data): ?Genero {
        return $this->generoRepository->create($data);
    }

    public function find(int $id): ?Genero {
        return $this->generoRepository->find($id);
    }

    public function update(array $data, $id): int {
        return $this->generoRepository->update($data, $id);
    }

    public function destroy($id): bool {
        return $this->generoRepository->destroy($id);
    }
}
