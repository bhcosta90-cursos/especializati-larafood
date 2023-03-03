<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepository;

class OrderEloquentRepository implements OrderRepository
{
    public function __construct(protected Order $model)
    {
        //
    }

    public function create(
        string $identify,
        float $total,
        string $status,
        ?string $comment,
        ?string $customer = null,
        ?string $table = null,
    ) {
        return $this->model->create([
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'customer_id' => $customer,
            'table_id' => $table,
            'comment' => $comment,
        ]);
    }

    public function findByIdentify(string $identify)
    {
        return $this->model->where('identify', $identify)->first();
    }

    public function registerProducts(string $id, array $products, array $cachedProducts = [])
    {
        $order = $this->model->find($id);
        $data = [];
        foreach ($products as $product) {
            $objProduct = $cachedProducts[$product['product_id']];
            /*array_push($data, [
                'id' => str()->uuid(),
                'quantity' => $product['quantity'],
                'product_id' => $product['product_id'],
                'price' => $objProduct->price,
            ]);*/
            $order->products()->create([
                'id' => str()->uuid(),
                'quantity' => $product['quantity'],
                'product_id' => $product['product_id'],
                'price' => $objProduct->price,
            ]);
        }

        //$order->products()->attach($data);
    }

    public function findByCustomer(string $customer)
    {
        return $this->model->where('customer_id', $customer)->latest()->paginate();
    }
}
