<?php

namespace App\Services;

use App\Models\Autor;
use App\Repositories\AutorRepository;

class AutorService {
    public function __construct(protected AutorRepository $autorRepository)
    {
    }

    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->autorRepository->all();
    }

    public function create(array $data): ?Autor {
        return $this->autorRepository->create($data);
    }

    public function find(int $id): ?Autor {
        return $this->autorRepository->find($id);
    }

    public function findBooksByAuthor(int $autorId): \Illuminate\Database\Eloquent\Collection
    {
        return $this->autorRepository->findBooksByAuthor($autorId);
    }

    public function findAuthorsAndTheirBooks(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->autorRepository->findAuthorsAndTheirBooks();
    }

    public function update(array $data, $id): int {
        return $this->autorRepository->update($data, $id);
    }

    public function destroy($id): bool {
        return $this->autorRepository->destroy($id);
    }
}
