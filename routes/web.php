<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomePageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomePageController::class)->name('home');

Route::resource('/product', ProductController::class);
Route::resource('/blog', BlogController::class);

// Route::any("/login", [AuthController::class, 'login'])->name('login');
// Route::any("/register", [AuthController::class, 'register'])->name('register');