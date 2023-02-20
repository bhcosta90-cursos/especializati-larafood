<?php

namespace App\Repositories\Eloquent;

use App\Models\Table;
use App\Repositories\Contracts\TableRepository;

class TableEloquentRepository implements TableRepository
{
    public function __construct(protected Table $table)
    {
        //
    }

    public function getAll(?int $perPage = 15, string $identify = null)
    {
        return $this->table->search(['identify' => $identify])->orderBy('identify')->paginate(perPage: $perPage);
    }

    public function findById(string $id)
    {
        return $this->table->find($id);
    }
}
