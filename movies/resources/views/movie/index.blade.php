@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            <ul>
                @foreach($movies as $movie)
                    <li>
                        {{ $movie->title }} : {{ $movie->genre }}
                    </li>
                @endforeach
            </ul>
            {{ $movies -> links () }}
        </div>
    </main>
@endsection
