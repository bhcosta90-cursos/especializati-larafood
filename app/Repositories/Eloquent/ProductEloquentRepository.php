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

    public function getAll(?int $perPage = 15, string $title = null, array $categories = [])
    {
        return $this->model
            ->search(['title' => $title])
            ->where(function ($query) use ($categories) {
                if ($categories) {
                    $query->whereHas('categories', fn ($query) => $query->whereIn('url', $categories));
                }
            })
            ->orderBy('title')
            ->paginate(perPage: $perPage);
    }

    public function findByFlag(string $flag)
    {
        return $this->model->where('flag', $flag)->first();
    }

    public function findById(string $id)
    {
        return $this->model->find($id);
    }
}
