<?php

namespace App\Repositories\Contracts;

interface OrderRepository
{
    public function create(
        string $identify,
        float $total,
        string $status,
        ?string $comment,
        ?string $customer = null,
        ?string $table = null,
    );

    public function findByIdentify(string $identify);

    public function registerProducts(string $id, array $products);
}
