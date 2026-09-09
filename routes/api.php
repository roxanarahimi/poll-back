<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function (Request $request) {
    return 'hooy';
});

Route::get('/questions', [\App\Http\Controllers\UserController::class, 'questions']);
Route::post('/saveAnswer', [\App\Http\Controllers\UserController::class, 'saveAnswer']);
