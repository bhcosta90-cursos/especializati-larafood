<?php

use App\Http\Controllers\Api\{
    CategoryController,
    CompanyController,
    ProductController,
    TableController
};

use App\Http\Controllers\Api\Auth\{
    AuthController,
    RegisterController
};

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::resource('companies', CompanyController::class)->only(['index', 'show']);
    Route::prefix('auth')->group(function () {
        Route::post('register', [RegisterController::class, 'store']);
        Route::post('token', [AuthController::class, 'token']);
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('me', [AuthController::class, 'me']);
            Route::delete('logout', [AuthController::class, 'logout']);
        });
    });
    Route::group([
        'as' => 'company.',
        'prefix' => '{company}'
    ], function () {
        Route::resource('categories', CategoryController::class)->only(['index', 'show']);
        Route::resource('tables', TableController::class)->only(['index', 'show']);
        Route::resource('products', ProductController::class)->only(['index', 'show']);
    });
});
