<?php

namespace App\Repositories\Contracts;

interface CustomerRepository
{
    public function register(array $data);

    public function findByEmail(string $email);
}
