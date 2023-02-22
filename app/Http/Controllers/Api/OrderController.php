<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(protected OrderService $service)
    {
        //
    }

    public function store(FormSupport $formSupport)
    {
        $data = $formSupport->data(\App\Forms\Admin\OrderForm::class);
        return new OrderResource($this->service->create($data));
    }

    public function show(Request $request)
    {
        return new OrderResource($this->service->findByIdentify($request->order));
    }
}
