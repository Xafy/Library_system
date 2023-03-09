<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OAuthController;

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

//Auth routes
Route::middleware('isLogin')->group(function(){
    Route::get('/users/logout', [AuthController::class, 'logout'])->name('users.logout');
    Route::get('/users/notes', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/users/notes', [NoteController::class, 'store'])->name('notes.store');
});
Route::middleware('isGuest')->group(function(){
    Route::get('/users/register', [AuthController::class, 'registerForm'])->name('users.registerForm');
    Route::get('/users/login', [AuthController::class, 'loginForm'])->name('users.loginForm');
    Route::post('/users/register', [AuthController::class, 'register'])->name('users.register');
    Route::post('/users/login', [AuthController::class, 'login'])->name('users.login');
    Route::get('/users/login/github', [OAuthController::class, 'redirectToGithub'])->name('github.redirect');
    Route::get('/users/login/github/callback', [OAuthController::class, 'handleGithubCallback'])->name('github.callback');
});
Route::get('/users', [AuthController::class, 'getUsers'])->name('users.index');

//Books routes
Route::middleware('isLogin')->group(function(){
        Route::get('/books/create', [BookController::class, 'createForm'])->name('books.form');
        Route::get('/books/edit/{id}', [BookController::class, 'editBook'])->name('books.edit');
        Route::post('/books', [BookController::class, 'storeBook'])->name('books.store');
        Route::patch('/books/{id}', [BookController::class, 'updateBook'])->name('books.update');
        Route::delete('/books/{id}', [BookController::class, 'deleteBook'])->name('books.delete');
});
Route::get('/books', [BookController::class, 'index'])->name('books.index') ;
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show') ;

//Categories routes
Route::middleware('isLogin')->group(function(){
    Route::get('/categories/add', [CategoryController::class, 'addForm'])->name('categories.addForm');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'editForm'])->name('categories.editForm');
    Route::post('/categories', [CategoryController::class, 'addCategory'])->name('categories.add');
    Route::patch('/categories/{id}', [CategoryController::class, 'editCategory'])->name('categories.edit');
    Route::delete('/categories/{id}', [CategoryController::class, 'deleteCategory'])->name('categories.delete');
});
Route::get('/categories', [CategoryController::class, 'getCategories'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'getCategoryById'])->name('categories.show');
