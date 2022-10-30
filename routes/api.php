<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;
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

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);
    Route::get('products', [ProductController::class, 'index']);

    Route::get('varian', [ProductController::class, 'VarianIndex']);
    Route::get('varian/{id}', [ProductController::class, 'VarianShow']);
    Route::post('varian/add', [ProductController::class, 'VarianAdd']);
    Route::post('varian/edit', [ProductController::class, 'VarianEdit']);
    Route::post('varian/delete', [ProductController::class, 'VarianDelete']);

    Route::get('products', [ProductController::class, 'ProductIndex']);
    Route::get('products/{id}', [ProductController::class, 'ProductShow']);
    Route::post('products/add', [ProductController::class, 'ProductAdd']);
    Route::post('products/edit', [ProductController::class, 'ProductEdit']);
    Route::post('products/delete', [ProductController::class, 'ProductDelete']);


}); 