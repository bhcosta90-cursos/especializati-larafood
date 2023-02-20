<?php

use App\Http\Controllers\Admin\{
    CategoryController,
    CategoryProductController,
    DetailPlanController,
    PermissionController,
    PlanController,
    ProfileController,
    PermissionProfileController,
    PlanProfileController,
    ProductController,
    UserController
};
use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'site.'], function () {
    Route::group(['as' => 'home.'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('/plan/{plan}', [HomeController::class, 'plan'])->name('plan');
    });
});

Auth::routes();

Route::middleware(['auth'])->get('/home', [PlanController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth'],
], function () {
    Route::resource('plans', PlanController::class);
    Route::resource('profiles', ProfileController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('permissions', PermissionController::class);

    Route::group([
        'prefix' => 'products/{id}',
        'as' => 'products.'
    ], function(){
        Route::get('categories', [CategoryProductController::class, 'index'])->name('categories.index');
        Route::put('categories', [CategoryProductController::class, 'store'])->name('categories.store');
    });

    Route::group([
        'prefix' => 'plans/{url}',
        'as' => 'plans.'
    ], function () {
        Route::resource('details', DetailPlanController::class)->only(['index', 'store', 'destroy']);
        Route::resource('profiles', PlanProfileController::class)->only(['index', 'destroy']);
        Route::put('profiles', [PlanProfileController::class, 'update'])->name('profiles.store');
    });

    Route::group([
        'prefix' => 'profiles/{id}',
        'as' => 'profiles.'
    ], function () {
        Route::resource('permissions', PermissionProfileController::class)->only(['index', 'destroy']);
        Route::put('permissions', [PermissionProfileController::class, 'update'])->name('permissions.store');
    });
});
