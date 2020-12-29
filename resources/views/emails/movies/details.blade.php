@extends ('layouts.email')

@section ('header')

    <h1>Movies</h1>

@endsection

@section ('content')

    <p>
        Dear {{ Auth::user()->name }},
    </p>

    <p>
        Thank you for requesting details of your favourite movie.
    </p>

    <img src="{{ $movie->imageUrl() }}" />


    <p>
        <b>Title: </b> {{ $movie->title }} <br />
        <b>Genre: </b> {{ $movie->genre }} <br />
    </p>

    <h2>
        Description
    </h2>

    <p>
        {!! $movie->formattedNotes() !!}
    </p>

@endsection
