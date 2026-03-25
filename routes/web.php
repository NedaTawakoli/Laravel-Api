<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
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
Route::get("addDate",[StudentController::class,'addDate']);
Route::get("addDate1",[StudentController::class,'add']);
Route::get("fetchStudent",[StudentController::class,'fetchStudent']);
Route::get("updateStudent",[StudentController::class,'updateStudent']);
Route::get("deleteStudent",[StudentController::class,'deleteStudent']);
Route::get("addProduct",[ProductController::class,'addProduct']);
Route::get("fetchProduct",[ProductController::class,'fetchProduct']);
Route::get("allProduct",[ProductController::class,'AllProduct']);
Route::get("whereProduct",[ProductController::class,'useWhere']);
Route::get("fetchDate",[StudentController::class,"fetchDate"]);
