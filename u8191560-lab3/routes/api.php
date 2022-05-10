<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\ApiV1\Modules\Buyers\Controllers\BuyerController;

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