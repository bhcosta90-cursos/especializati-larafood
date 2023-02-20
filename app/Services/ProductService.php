<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepository;

class ProductService
{
    public function __construct(protected ProductRepository $repository)
    {
        //
    }

    public function getAll($data = [])
    {
        return $this->repository->getAll(
            $data['limit'] ?? null,
            $data['title'] ?? null
        );
    }

    public function findById(string $id)
    {
        return $this->repository->findById($id);
    }
}
