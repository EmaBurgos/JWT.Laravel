<?php

use App\Http\Controllers\EmailConfirm;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EmailController;
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

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::get('send-email',[EmailController::class,'store']);
Route::put('send-email/confirm/{token}',[EmailConfirm::class,'update'])->name('send-email.confirm');


Route::middleware(['jwt.verify','admin'])->group(function(){
    Route::get('users',[UserController::class,'index']);
    Route::get('users/company',[UserController::class,'show']);
    Route::put('users/{user}',[UserController::class,'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);
});

Route::middleware(['jwt.verify'])->group(function(){
    Route::post('orders',[OrderController::class,'store']);
});