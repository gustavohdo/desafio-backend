<?php

use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;


Route::get('/', \App\Livewire\Web\Home::class)->name('home');
Route::get('/cadastrar', \App\Livewire\Web\CreateFilm::class)->name('create');
Route::get('/filme/{id}', \App\Livewire\Web\ViewFilm::class)->name('film.show');
