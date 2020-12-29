<?php

use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});

Auth::routes();

Route::get('/auth/github/redirect', [GithubController::class, 'redirect'])->name('github.redirect');
Route::get('/auth/github/callback', [GithubController::class, 'callback'])->name('github.callback');

Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

Route::middleware('localization')->group(
    function () {
        Route::middleware('auth')->group(
            function () {
                Route::get('/', [MovieController::class, 'index'])->name('index');

                Route::get('/movie/{movie}', [MovieController::class, 'show']);
                Route::delete('/movie/{movie}', [MovieController::class, 'destroy']);

                Route::get('/movie', [MovieController::class, 'create']);
                Route::post('/movie/', [MovieController::class, 'store']);

                Route::get ('/movie/{movie}/email', [MailController::class,'sendMovieDetails']);

                Route::get('/movie/{movie}/edit', [MovieController::class, 'edit']);
                Route::patch('/movie/{movie}/', [MovieController::class, 'update']);
            }
        );
    }
);
