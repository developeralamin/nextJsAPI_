<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;



Route::post('/login', [AuthController::class, 'login']);
Route::post('/registration', [AuthController::class, 'registration']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('auth-user',[AuthController::class,'authUser']);
    Route::resource('/course', CourseController::class)->except(['create', 'edit']);
});

Route::apiResources([
    'shop' => ShopController::class,
    // 'course'=> CourseController::class
]);
// Route::resource('/course', CourseController::class)->except(['create', 'edit']);
