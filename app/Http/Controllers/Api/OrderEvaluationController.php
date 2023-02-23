<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderEvaluationResource;
use App\Services\OrderEvaluationService;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class OrderEvaluationController extends Controller
{
    public function __construct(
        protected OrderEvaluationService $service,
    ) {
        //
    }

    public function store(FormSupport $formSupport, Request $request)
    {
        $data = $formSupport->data(\App\Forms\Admin\OrderEvaluationForm::class);
        return new OrderEvaluationResource($this->service->create($data + [
            'order_id' => $request->order,
            'customer_id' => auth()->user()->id,
        ]));
    }

    public function byCustomer()
    {
        return OrderEvaluationResource::collection($this->service->getAllWithCustomer(auth()->user()->id));
    }

    public function byOrder(Request $request)
    {
        return OrderEvaluationResource::collection($this->service->getAllWithOrder($request->order));
    }
}
