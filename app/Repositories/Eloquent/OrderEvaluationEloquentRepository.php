<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Models\OrderEvaluation;
use App\Repositories\Contracts\OrderEvaluationRepository;

class OrderEvaluationEloquentRepository implements OrderEvaluationRepository
{
    public function __construct(protected OrderEvaluation $model)
    {
        //
    }

    public function createWithOrder(string $order, string $customer, int $star, ?string $comment)
    {
        return $this->model->create([
            'order_id' => $order,
            'customer_id' => $customer,
            'stars' => $star,
            'comment' => $comment,
        ]);
    }

    public function getAllWithOrder(string $order)
    {
        return $this->model->where('order_id', $order)->get();
    }

    public function getAllWithCustomer(string $customer)
    {
        return $this->model->where('customer_id', $customer)->get();
    }
}
