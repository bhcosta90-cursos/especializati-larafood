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
            $data['title'] ?? null,
            $data['categories'] ?? [],
        );
    }

    public function findByFlag(string $id)
    {
        return $this->repository->findByFlag($id);
    }
}
