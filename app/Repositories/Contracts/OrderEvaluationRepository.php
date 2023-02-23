<?php

namespace App\Repositories\Contracts;

interface OrderEvaluationRepository
{
    public function createWithOrder(string $order, string $customer, int $star, ?string $comment);
    public function getAllWithOrder(string $order);
    public function getAllWithCustomer(string $customer);
}
