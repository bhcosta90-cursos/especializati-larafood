<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(
        protected CompanyService $companyService
    ) {
        //
    }

    public function index(Request $request)
    {
        return CompanyResource::collection($this->companyService->getAll($request->all()));
    }

    public function show(string $id)
    {
        return new CompanyResource($this->companyService->findById($id));
    }
}
