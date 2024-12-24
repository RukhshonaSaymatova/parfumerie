<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Маршруты для CRUD категорий
Route::apiResource('categories', CategoryController::class);

// Маршруты для CRUD продуктов
Route::apiResource('products', ProductController::class);

// Маршруты для CRUD покупателей
Route::apiResource('customers', CustomerController::class);

// Маршруты для CRUD заказов
Route::apiResource('orders', OrderController::class);