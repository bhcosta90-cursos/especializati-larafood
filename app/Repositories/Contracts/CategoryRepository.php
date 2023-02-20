<?php

namespace App\Repositories\Contracts;

interface CategoryRepository
{
    public function getAll(?int $perPage = 15, string $name = null);

    public function findById(string $id);
}
