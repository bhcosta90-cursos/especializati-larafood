<?php

namespace App\Repositories\Contracts;

interface TableRepository
{
    public function getAll(?int $perPage = 15, string $identify = null);

    public function findById(string $id);
}
