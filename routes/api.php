<?php

use App\Http\Controllers\Api\{
    CategoryController,
    CompanyController,
    ProductController,
    TableController
};
use Illuminate\Support\Facades\Route;

Route::resource('companies', CompanyController::class)->only(['index', 'show']);
Route::group([
    'as' => 'company.',
    'prefix' => '{company}'
], function () {
    Route::resource('categories', CategoryController::class)->only(['index', 'show']);
    Route::resource('tables', TableController::class)->only(['index', 'show']);
    Route::resource('products', ProductController::class)->only(['index', 'show']);
});
