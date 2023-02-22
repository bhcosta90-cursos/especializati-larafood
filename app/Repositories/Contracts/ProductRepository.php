<?php

namespace App\Repositories\Contracts;

interface ProductRepository
{
    public function getAll(?int $perPage = 15, string $title = null, array $categories = []);

    public function findByFlag(string $flag);

    public function findById(string $id);
}
