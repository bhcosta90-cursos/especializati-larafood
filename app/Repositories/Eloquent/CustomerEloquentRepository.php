<?php

namespace App\Repositories\Eloquent;

use App\Models\Customer;
use App\Repositories\Contracts\CustomerRepository;

class CustomerEloquentRepository implements CustomerRepository
{
    public function __construct(protected Customer $model)
    {
        //
    }

    public function register(array $data)
    {
        return $this->model->create($data);
    }

    public function findByEmail(string $email)
    {
        return $this->model->whereEmail($email)->first();
    }
}
