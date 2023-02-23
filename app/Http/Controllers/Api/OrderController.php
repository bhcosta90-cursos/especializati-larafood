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

    public function index(Request $request)
    {
        return OrderResource::collection($this->service->findByCustomer($request->user()->id));
    }

    public function store(FormSupport $formSupport, Request $request)
    {
        $data = $formSupport->data(\App\Forms\Admin\OrderForm::class);
        return new OrderResource($this->service->create($data + ['customer' => $request->user()?->id]));
    }

    public function show(Request $request)
    {
        return new OrderResource($this->service->findByIdentify($request->order));
    }
}
