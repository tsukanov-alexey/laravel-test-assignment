<?php

use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', ProfileController::class)->only([
    'index', 'store'
]);
