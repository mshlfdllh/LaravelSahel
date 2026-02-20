<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\GenresController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

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

//End Route Author