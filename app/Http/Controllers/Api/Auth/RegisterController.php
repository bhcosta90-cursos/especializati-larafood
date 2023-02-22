<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Services\CustomerService;
use App\Support\FormSupport;

class RegisterController extends Controller
{
    public function __construct(protected CustomerService $service)
    {
        //
    }

    public function store(FormSupport $formSupport)
    {
        $data = $formSupport->data(\App\Forms\Admin\CustomerForm::class);
        return new CustomerResource($this->service->register($data));
    }
}
