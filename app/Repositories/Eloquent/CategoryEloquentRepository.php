<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepository;

class CategoryEloquentRepository implements CategoryRepository
{
    public function __construct(protected Category $model)
    {
        //
    }

    public function getAll(?int $perPage = 15, string $name = null)
    {
        return $this->model->search(['name' => $name])->orderBy('name')->paginate(perPage: $perPage);
    }

    public function findById(string $id)
    {
        return $this->model->find($id);
    }
}
