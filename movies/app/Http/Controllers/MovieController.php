<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::query()->paginate(6);

        return view('movie.index', ['movies' => $movies]);
    }

    public function create()
    {
        return view('movie.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:2|max:32',
                'description' => 'required|min:2|max:500',
                'genre' => 'required|min:2|max:32',
            ]
        );

        Movie::create($request->all());

        return redirect()->route('index');
    }

    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        //
    }

    public function update(Request $request, Movie $movie)
    {
        //
    }

    public function destroy(Movie $movie)
    {
        //
    }
}
