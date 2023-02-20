<?php

use App\Http\Controllers\Api\{
    CategoryController,
    CompanyController,
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
});
