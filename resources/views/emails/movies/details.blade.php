@extends ('layouts.email')

@section ('header')

    <h1>Movies</h1>

@endsection

@section ('content')

    <p>
        {{ __('Dear') }} {{ Auth::user()->name }},
    </p>

    <p>
        {{ Translator::translate('Thank you for requesting details of your favourite movie.') }}
    </p>

    <img src="{{ $movie->imageUrl() }}" />


    <p>
        <b>{{ Translator::translate('Title: ')}}</b> {{ Translator::translate($movie->title) }} <br />
        <b>{{ Translator::translate('Genre: ')}}</b> {{ Translator::translate($movie->genre) }} <br />
    </p>

    <h2>
        {{ Translator::translate('Description') }}
    </h2>

    <p>
        {!! Translator::translate($movie->formattedNotes()) !!}
    </p>

@endsection
