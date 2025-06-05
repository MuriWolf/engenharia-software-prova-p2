<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

route::controller(AutorController::class)->group(function () {
    route::get('/autores', 'index');
    route::get('/autores/{id}', 'show');
    route::get('/livros/autores', 'showAuthorsAndTheirBooks');
    route::get('/autores/{id}/livros', 'showBooksByAuthor');
    route::post('/autor', 'store');
    route::put('/autores/{id}', 'update');
    route::delete('/autores/{id}', 'destroy');
});

route::controller(UsuarioController::class)->group(function () {
    route::get('/usuarios', 'index');
    route::get('/usuarios/{id}', 'show');
    route::get('/usuarios/{id}/reviews', 'showReviewsByUser');
    route::post('/usuario', 'store');
    route::put('/usuarios/{id}', 'update');
    route::delete('/usuarios/{id}', 'destroy');
});

route::controller(GeneroController::class)->group(function () {
    route::get('/generos', 'index');
    route::get('/generos/{id}', 'show');
    route::get('/generos/{id}/livros', 'showBooksByGenre');
    route::get('/livros/generos', 'showGenresAndTheirBooks');
    route::post('/genero', 'store');
    route::put('/generos/{id}', 'update');
    route::delete('/generos/{id}', 'destroy');
});

route::controller(ReviewController::class)->group(function () {
    route::get('/reviews', 'index');
    route::get('/reviews/{id}', 'show');
    route::post('/review', 'store');
    route::put('/reviews/{id}', 'update');
    route::delete('/reviews/{id}', 'destroy');
});

route::controller(LivroController::class)->group(function () {
    route::get('/livros', 'index');
    route::get('/livros/{id}', 'show');
    route::get('/livros/{id}/reviews', 'showReviewsByBook');
    route::get('/livrosDetalhes', 'getBookDetails');
    route::post('/livro', 'store');
    route::put('/livros/{id}', 'update');
    route::delete('/livros/{id}', 'destroy');
});
