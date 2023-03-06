<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

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

//Books routes
Route::get('/books', [BookController::class, 'index'])->name('books.index') ;
Route::get('/books/create', [BookController::class, 'createForm'])->name('books.form');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show') ;
Route::get('/books/edit/{id}', [BookController::class, 'editBook'])->name('books.edit');
Route::post('/books', [BookController::class, 'storeBook'])->name('books.store');
Route::patch('/books/{id}', [BookController::class, 'updateBook'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'deleteBook'])->name('books.delete');

//Categories routes
Route::get('/categories', [CategoryController::class, 'getCategories'])->name('categories.index');
Route::get('/categories/add', [CategoryController::class, 'addForm'])->name('categories.addForm');
Route::get('/categories/{id}', [CategoryController::class, 'getCategoryById'])->name('categories.show');
Route::get('/categories/edit/{id}', [CategoryController::class, 'editForm'])->name('categories.editForm');
Route::post('/categories', [CategoryController::class, 'addCategory'])->name('categories.add');
Route::patch('/categories/{id}', [CategoryController::class, 'editCategory'])->name('categories.edit');
Route::delete('/categories/{id}', [CategoryController::class, 'deleteCategory'])->name('categories.delete');
