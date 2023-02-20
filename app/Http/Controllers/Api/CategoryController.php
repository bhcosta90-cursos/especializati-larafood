<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $service)
    {
        //
    }

    public function index(Request $request)
    {
        return CategoryResource::collection($this->service->getAll($request->all()));
    }

    public function show(Request $request)
    {
        return new CategoryResource($this->service->findById($request->category));
    }
}
