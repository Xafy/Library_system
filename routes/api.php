<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('isApiUser')->group(function(){
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::post('/books', [ApiBookController::class, 'store']);
    Route::patch('/books/{id}', [ApiBookController::class, 'update']);
    Route::delete('/books/{id}', [ApiBookController::class, 'delete']);
});

Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);
Route::get('/books', [ApiBookController::class, 'index']);
Route::get('/books/{id}', [ApiBookController::class, 'show']);
