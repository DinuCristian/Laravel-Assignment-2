<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [MovieController::class, 'index'])->name('index');