<?php

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('blog/')->controller(BlogController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/tambah', 'store');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});

Route::prefix('product/')->controller(ProductController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/tambah', 'store');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});