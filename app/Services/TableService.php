<?php

namespace App\Services;

use App\Repositories\Contracts\TableRepository;

class TableService
{
    public function __construct(protected TableRepository $repository)
    {
        //
    }

    public function getAll($data = [])
    {
        return $this->repository->getAll(
            $data['limit'] ?? null,
            $data['identify'] ?? null
        );
    }

    public function findById(string $id)
    {
        return $this->repository->findById($id);
    }
}
