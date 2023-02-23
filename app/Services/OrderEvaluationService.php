<?php

namespace App\Services;

use App\Repositories\Contracts\OrderEvaluationRepository;
use App\Repositories\Contracts\OrderRepository;

class OrderEvaluationService
{
    public function __construct(
        protected OrderEvaluationRepository $repository,
        protected OrderRepository $order,
    ) {
        //
    }

    public function create($data = [])
    {
        return $this->repository->createWithOrder(
            $data['order_id'],
            $data['customer_id'],
            $data['star'],
            $data['comment']
        );
    }

    public function getAllWithCustomer(string $id)
    {
        return $this->repository->getAllWithCustomer($id);
    }

    public function getAllWithOrder(string $order)
    {
        return $this->repository->getAllWithOrder($order);
    }
}
