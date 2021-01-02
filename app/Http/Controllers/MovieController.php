<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Translator;


class MovieController extends Controller
{
    public function index()
    {
        $movies = QueryBuilder::for(Movie::class)->allowedFilters(['title', AllowedFilter::exact('genre')])->paginate(6);
        $genres = Movie::select('genre')->distinct()->get();

        return view('movie.index', ['movies' => $movies], ['genres' => $genres]);
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
                'description' => 'required|min:2|max:5000',
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
        return view('movie.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $attributes = request()->validate(
            [
                'title' => 'required|min:2|max:32',
                'description' => 'required|min:2|max:5000',
                'genre' => 'required|min:2|max:32',
            ]
        );

        $movie->update($attributes);

        return redirect()->route('index');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('index');
    }

    public function search(Request $request)
    {
        $title = $request->title;
        if ('en' != App::getLocale()) {
            $title = Translator::translate($title, 'en');
        }

        return redirect('/?filter[title]=' . $title . '&filter[genre]=' . $request->genre);
    }
}
