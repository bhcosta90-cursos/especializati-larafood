<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\TokenRequest;
use App\Http\Resources\CustomerResource;
use App\Services\CustomerService;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class AuthController extends Controller
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

    public function token(TokenRequest $request)
    {
        return $this->service->login($request->validated());
    }
}
