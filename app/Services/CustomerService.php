<?php

namespace App\Services;

use App\Repositories\Contracts\CustomerRepository;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomerService
{
    public function __construct(protected CustomerRepository $repository)
    {
        //
    }

    public function register(array $data = [])
    {
        $data['password'] = Hash::make($data['password']);
        return $this->repository->register($data);
    }

    public function login(array $data)
    {
        $objCustomer = $this->repository->findByEmail($data['email']);

        if (!$objCustomer || !Hash::check($data['password'], $objCustomer->password)) {
            throw new HttpException(404, trans('Credenciais inválidas'));
        }

        $token = $objCustomer->createToken($data['device'])->plainTextToken;
        return [
            'token' => $token,
        ];
    }
}
