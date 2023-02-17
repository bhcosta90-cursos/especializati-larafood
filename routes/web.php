<?php

use App\Http\Controllers\Admin\{DetailPlanController, PlanController};
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
], function(){
    Route::resource('plans', PlanController::class);

    Route::group([
        'prefix' => '{url}',
        'as' => 'plan.'
    ], function () {
        Route::resource('detail', DetailPlanController::class)->only(['create', 'store', 'destroy']);
    });
});
