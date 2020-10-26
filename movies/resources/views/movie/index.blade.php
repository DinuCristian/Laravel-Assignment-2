@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            <a href="/movie/"><i class=""></i>Add New Movie</a>
            <ul>
                @foreach($movies as $movie)
                    <li>
                        {{ $movie->title }} : {{ $movie->genre }} : <a href="{{ $movie->path }}">Details</a>
                    </li>
                @endforeach
            </ul>
            {{ $movies -> links () }}
        </div>
    </main>
@endsection
