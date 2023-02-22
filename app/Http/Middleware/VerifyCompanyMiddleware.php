<?php

namespace App\Http\Middleware;

use App\Services\CompanyService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class VerifyCompanyMiddleware
{
    public function __construct(protected CompanyService $companyService)
    {
        //
    }

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->company && !$this->companyService->findById($request->company)) {
            throw ValidationException::withMessages([
                'company' => ["company {$request->company} not found"]
            ]);
        }
        return $next($request);
    }
}
