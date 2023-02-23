<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepository;
use App\Repositories\Contracts\ProductRepository;

class OrderService
{
    private $dataProduct = [];

    public function __construct(
        protected OrderRepository $repository,
        protected ProductRepository $productRepository,
    ) {
        //
    }

    public function create(array $data)
    {
        $this->cacheProduct($data['products']);

        $obj = $this->repository->create(
            identify: $this->getIdentifyOrder(),
            total: $this->getTotalByProducts($data['products']),
            status: 'open',
            customer: $data['customer'] ?? null,
            table: $data['table'] ?? null,
            comment: $data['comment'] ?? null,
        );

        $this->repository->registerProducts($obj->id, $data['products'], $this->dataProduct);

        return $obj;
    }

    public function findByIdentify(string $id)
    {
        return $this->repository->findByIdentify($id);
    }

    public function findByCustomer(string $customer)
    {
        return $this->repository->findByCustomer($customer);
    }

    private function getTotalByProducts(array $products): float
    {
        $total = 0;
        foreach ($products as $product) {
            $objProduct = $this->dataProduct[$product['product_id']];
            $total += $objProduct->price * $product['quantity'];
        }

        return $total;
    }

    private function cacheProduct(array $products)
    {
        $this->dataProduct = [];

        foreach ($products as $product) {
            if (!array_key_exists($product['product_id'], $this->dataProduct)) {
                $this->dataProduct[$product['product_id']] = $this->productRepository->findById($product['product_id']);
            }
        }
    }

    private function getIdentifyOrder(int $qtyCaraceters = 8)
    {
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;

        // $specialCharacters = str_shuffle('!@#$%*-');
        // $characters = $smallLetters.$numbers.$specialCharacters;
        $characters = $smallLetters . $numbers;

        $identify = substr(str_shuffle($characters), 0, $qtyCaraceters);

        if ($this->repository->findByIdentify($identify)) {
            $this->getIdentifyOrder($qtyCaraceters + 1);
        }

        return mb_strtoupper($identify);
    }
}
