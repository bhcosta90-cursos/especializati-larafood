<?php

namespace App\Repositories\Eloquent;

use App\Models\Table;
use App\Repositories\Contracts\TableRepository;

class TableEloquentRepository implements TableRepository
{
    public function __construct(protected Table $model)
    {
        //
    }

    public function getAll(?int $perPage = 15, string $identify = null)
    {
        return $this->model->search(['identify' => $identify])->orderBy('identify')->paginate(perPage: $perPage);
    }

    public function findById(string $id)
    {
        return $this->model->find($id);
    }
}
