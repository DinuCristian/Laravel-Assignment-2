<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [MovieController::class, 'index'])->name('index');

Route::get('/movie/{movie}', [MovieController::class, 'show']);
Route::delete('/movie/{movie}', [MovieController::class, 'destroy']);

Route::get('/movie', [MovieController::class, 'create']);
Route::post('/movie/', [MovieController::class, 'store']);

Route::get('/movie/{movie}/edit', [MovieController::class, 'edit']);
Route::patch('/movie/{movie}/', [MovieController::class, 'update']);