<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TableResource;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function __construct(protected TableService $service)
    {
        //
    }

    public function index(Request $request)
    {
        return TableResource::collection($this->service->getAll($request->all()));
    }

    public function show(Request $request)
    {
        return new TableResource($this->service->findById($request->category));
    }
}
