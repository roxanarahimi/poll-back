<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', [\App\Http\Controllers\UserController::class, 'test']);

Route::post('/mobile/otp', [\App\Http\Controllers\UserController::class, 'sendOtp']);
Route::post('/mobile/verify', [\App\Http\Controllers\UserController::class, 'verifyMobile']);
Route::get('/questions', [\App\Http\Controllers\UserController::class, 'questions']);
Route::post('/saveAnswer', [\App\Http\Controllers\UserController::class, 'saveAnswer']);
Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'show']);
