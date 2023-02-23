<?php

namespace App\Repositories\Eloquent;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepository;

class CompanyEloquentRepository implements CompanyRepository
{
    public function __construct(protected Company $model)
    {
        //
    }

    public function getAll(?int $perPage = 15, string $name = null)
    {
        return $this->model->search(['name' => $name])->orderBy('name')->paginate(perPage: $perPage);
    }

    public function findByUrl(string $id)
    {
        return $this->model->where('url', $id)->first();
    }

    public function findById(string $id)
    {
        return $this->model->find($id);
    }
}
