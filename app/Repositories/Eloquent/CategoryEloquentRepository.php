<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepository;

class CategoryEloquentRepository implements CategoryRepository
{
    public function __construct(protected Category $company)
    {
        //
    }

    public function getAll(?int $perPage = 15, string $name = null)
    {
        return $this->company->search(['name' => $name])->paginate(perPage: $perPage);
    }

    public function findById(string $id)
    {
        return $this->company->find($id);
    }
}
