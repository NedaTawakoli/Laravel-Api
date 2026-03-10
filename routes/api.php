<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Route::apiResource('author',AuthorController::class);
Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('authors',AuthorController::class);
    Route::apiResource('book',BookController::class);
    });
    Route::post('logout',[UserController::class,'logout']);
Route::apiResource('member',MemberController::class);
Route::apiResource('borrowing',BorrowingController::class)->only('index','store','show');
Route::post('borrowings/{borrowing}/return',[BorrowingController::class,'returnBook']);
Route::get('borrowings/overdue/list',[BorrowingController::class,'overDue']);

// authentivation routes
Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);

