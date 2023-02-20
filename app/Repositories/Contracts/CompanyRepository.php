<?php

namespace App\Repositories\Contracts;

interface CompanyRepository
{
    public function getAll(?int $perPage = 15, string $name = null);

    public function findById(string $id);
}
