@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <a href="/" style="display: inline-block; white-space: nowrap; vertical-align: top">
            Home
        </a>
        <div class="w-full sm:px-6">
            <h1 class="text-4x1">
                {{ $movie->title }}
            </h1>
            <h1 class="text-4x1">
                {{ $movie->genre }}
            </h1>
            <h1 class="text-4x1">
                {{ $movie->description }}
            </h1>
        </div>
    </main>
@endsection
