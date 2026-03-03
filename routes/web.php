<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenresController;
use Illuminate\Support\Facades\Route;

Route ::get('/',[AuthController::class, 'index'])
->name('home.index');

//Route Auth

Route:: get('/login', [AuthController::class, 'login'])
->name('auth.login');

Route:: get('/register', [AuthController::class, 'register'])
->name('auth.register');

Route:: post('/login', [AuthController::class, 'actionLogin']) 
->name('action.login');

//End Route Auth

//Route Genres

Route::get('/genre',[GenresController::class, 'index'])
->name('genre.index');

Route::get('/genre/create',[GenresController::class, 'create'])
->name('genre.create');

Route::post('/genre/create',[GenresController::class, 'store'])
->name('genre.store');

Route::get('/genre/edit/{id}',[GenresController::class, 'edit'])
->name('genre.edit');

Route::put('/genre/edit/{id}',[GenresController::class, 'update'])
->name('genre.update');

Route::delete('/genre/delete/{id}',[GenresController::class, 'destroy'])
->name('genre.destroy');

//End Route Genres

//Route Author

Route::get('author',[AuthorsController::class, 'index'])
->name('penulis.index');

Route::get('author/create',[AuthorsController::class, 'create'])
->name('penulis.create');

Route::post('author/create',[AuthorsController::class, 'store'])
->name('penulis.store');

Route::get('author/show/{id}',[AuthorsController::class, 'show'])
->name('penulis.show');

Route::get('author/edit/{id}',[AuthorsController::class, 'edit'])
->name('penulis.edit');

Route::put('author/edit/{id}',[AuthorsController::class, 'update'])
->name('penulis.update');

Route::delete('author/delete/{id}',[AuthorsController::class, 'destroy'])
->name('penulis.destroy');

//End Route Author

// Route Book

Route::get('/books', [BooksController::class, 'index'])
->name('books.index');

Route::get('/books/create', [BooksController::class, 'create'])
->name('books.create');

Route::post('/books/create', [BooksController::class, 'store'])
->name('books.store');

Route::get('/books/detail/{id}', [BooksController::class, 'detail'])
->name('books.detail');

Route::get('books/edit/{id}', [BooksController::class, 'edit'])
->name('books.edit');

Route::put('books/edit/{id}', [BooksController::class, 'update'])
->name('books.update');

Route::delete('books/delete/{id}', [BooksController::class, 'destroy'])
 ->name('books.destroy');
