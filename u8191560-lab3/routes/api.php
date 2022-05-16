<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\ApiV1\Modules\Buyers\Controllers\BuyerController;
use App\Http\ApiV1\Modules\Items\Controllers\ItemController;
use App\Http\ApiV1\Modules\Shops\Controllers\ShopController;
use App\Http\ApiV1\Modules\Orders\Controllers\OrderController;

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

Route::get("/v1/buyers", [BuyerController::class, 'getList']);

Route::get("/v1/buyers/{id}", [BuyerController::class, 'get']);

Route::post("/v1/buyers", [BuyerController::class, 'post']);

Route::delete("/v1/buyers/{id}", [BuyerController::class, 'delete']);

Route::patch("/v1/buyers/{id}", [BuyerController::class, 'patch']);

Route::put("/v1/buyers/{id}", [BuyerController::class, 'put']);

Route::get("/v1/items", [ItemController::class, 'getList']);

Route::get("/v1/items/{id}", [ItemController::class, 'get']);

Route::post("/v1/items", [ItemController::class, 'post']);

Route::delete("/v1/items/{id}", [ItemController::class, 'delete']);

Route::patch("/v1/items/{id}", [ItemController::class, 'patch']);

Route::put("/v1/items/{id}", [ItemController::class, 'put']);

Route::get("/v1/shops", [ShopController::class, 'getList']);

Route::get("/v1/shops/{id}", [ShopController::class, 'get']);

Route::post("/v1/shops", [ShopController::class, 'post']);

Route::delete("/v1/shops/{id}", [ShopController::class, 'delete']);

Route::patch("/v1/shops/{id}", [ShopController::class, 'patch']);

Route::put("/v1/shops/{id}", [ShopController::class, 'put']);

Route::get("/v1/orders", [OrderController::class, 'getList']);

Route::get("/v1/orders/{id}", [OrderController::class, 'get']);

Route::post("/v1/orders", [OrderController::class, 'post']);

Route::delete("/v1/orders/{id}", [OrderController::class, 'delete']);

Route::patch("/v1/orders/{id}", [OrderController::class, 'patch']);

Route::put("/v1/orders/{id}", [OrderController::class, 'put']);
