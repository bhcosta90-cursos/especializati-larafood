<?php

use App\Http\Controllers\Admin\{
    DetailPlanController,
    PermissionController,
    PlanController,
    ProfileController,
    PermissionProfileController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::resource('plans', PlanController::class);
    Route::resource('profiles', ProfileController::class);
    Route::resource('permissions', PermissionController::class);

    Route::group([
        'prefix' => 'plans/{url}',
        'as' => 'plans.'
    ], function () {
        Route::resource('details', DetailPlanController::class)->only(['index', 'store', 'destroy']);
    });

    Route::group([
        'prefix' => 'profiles/{id}',
        'as' => 'profiles.'
    ], function () {
        Route::resource('permissions', PermissionProfileController::class)->only(['index', 'destroy']);
        Route::put('permissions', [PermissionProfileController::class, 'update'])->name('permissions.store');
    });
});
