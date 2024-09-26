<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SearchController::class, 'index'])->name('index');
Route::get('/search', [SearchController::class, 'search'])->name('search');
