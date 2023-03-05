<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index') ;
Route::get('/books/create', [BookController::class, 'createForm'])->name('books.form');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show') ;
Route::post('/books', [BookController::class, 'storeBook'])->name('books.store');
Route::get('/books/edit/{id}', [BookController::class, 'editBook'])->name('books.edit');
Route::patch('/books/{id}', [BookController::class, 'updateBook'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'deleteBook'])->name('books.delete');
