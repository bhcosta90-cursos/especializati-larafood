<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryRepository $categoryRepository)
    {
        //
    }

    public function index(Request $request)
    {
        return CategoryResource::collection($this->categoryRepository->getAll($request->limit, $request->name));
    }

    public function show(Request $request)
    {
        return new CategoryResource($this->categoryRepository->findById($request->category));
    }
}
