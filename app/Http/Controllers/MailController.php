<?php

namespace App\Http\Controllers;

use App\Mail\MovieDetailsEmail;
use App\Models\Movie;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMovieDetails (Movie $movie)
    {
        Mail::to(auth()->user()->email)->send(new MovieDetailsEmail($movie));

        return redirect()->back();
    }
}
