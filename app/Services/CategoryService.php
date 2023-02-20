<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepository;

class CategoryService
{
    public function __construct(protected CategoryRepository $repository)
    {
        //
    }

    public function getAll($data = [])
    {
        return $this->repository->getAll(
            $data['limit'] ?? null,
            $data['name'] ?? null
        );
    }

    public function findById(string $id)
    {
        return $this->repository->findById($id);
    }
}
