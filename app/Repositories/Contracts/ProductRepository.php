<?php

namespace App\Repositories\Contracts;

interface ProductRepository
{
    public function getAll(?int $perPage = 15, string $title = null);

    public function findById(string $id);
}
