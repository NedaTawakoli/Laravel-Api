<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('register',[UserController::class,'register']);
Route::get("product",[ProductController::class,'index']);
Route::get("product/add",[ProductController::class,'add']);
Route::get('product/{id}',[ProductController::class,'show']);
Route::get("product/{id}",[ProductController::class,'update']);
Route::get("product/{id}",[ProductController::class,'delete']);
