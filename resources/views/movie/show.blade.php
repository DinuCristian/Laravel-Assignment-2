@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            <div class="flex justify-between">
                <div class="text-4xl mb-8">
                    <h1>{{ __("Movie Details") }}</h1>
                </div>
                <div>
                    <div class="mt-2 flex items-center text.black">
                        <a href="/" style="display: inline-block; white-space: nowrap; vertical-align: top">
                            <svg xmlns="http://www.w3.org/2000/svg" style="white-space: nowrap; display: inline-block"
                                 viewBox="0 0 20 20" fill="currentColor" width="25" height="25">
                                <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            <span>{{ __("Home") }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="md:flex mt-10">
                    <div class="md:flex-shrink-0">
                        <img class="rounded-lg md:w-100" src="{{ $movie->imageUrl() }}"
                             width="448" height="299"
                             alt="{{ __("This is the poster of :attribute movie.", ['attribute' => $movie->title]) }}">
                    </div>

                    <div class="mt-4 md:mt-0 md:ml-20">
                        <div class="uppercase tracking-wide text-sm text-indigo-600 font-bold">
                            <p>{{ $movie->title }}</p>
                        </div>
                        <p class="block mt-1 text-lg leading-tight font-semibold text-gray-900">{{ $movie->genre }}</p>
                        <p class="mt-2 text-gray-600">{{ $movie->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
