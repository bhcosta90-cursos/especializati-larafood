<?php

use App\Http\Controllers\Api\{
    CategoryController,
    CompanyController,
    Auth\AuthController,
    ProductController,
    TableController
};
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::resource('companies', CompanyController::class)->only(['index', 'show']);
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'store']);
        Route::post('token', [AuthController::class, 'token']);
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
