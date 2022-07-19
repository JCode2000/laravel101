<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class,'browse']);
Route::get('/product/insert', [ProductController::class,'insert']);
Route::post('/product/insert_action', [ProductController::class, 'insert_action']);
Route::get('/product/update{product_id}', [ProductController::class,'update']);
Route::post('/product/update_action', [ProductController::class, 'update_action']);
Route::get('/product/delete{product_id}',[ProductController::class, 'delete']);
Route::get('/coss',[ProductController::class,'coss']);


