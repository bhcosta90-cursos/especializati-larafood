<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepository;

class ProductEloquentRepository implements ProductRepository
{
    public function __construct(protected Product $model)
    {
        //
    }

    public function getAll(?int $perPage = 15, string $title = null)
    {
        return $this->model->search(['title' => $title])->orderBy('title')->paginate(perPage: $perPage);
    }

    public function findById(string $id)
    {
        return $this->model->find($id);
    }
}
