<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service)
    {
        //
    }

    public function index(Request $request)
    {
        return ProductResource::collection($this->service->getAll($request->all()));
    }

    public function show(Request $request)
    {
        return new ProductResource($this->service->findByFlag($request->product));
    }
}
