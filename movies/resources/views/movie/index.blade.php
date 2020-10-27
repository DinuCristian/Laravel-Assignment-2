@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            <div class="flex justify-between">
                <div class="text-4xl mb-8">
                    <h1>{{ 'All Movies' }}</h1>
                </div>
                <div>
                    <div class="mt-2 flex items-center text.black">
                        <a href="/movie/" style="display: inline-block; white-space: nowrap; vertical-align: top">
                            <svg xmlns="http://www.w3.org/2000/svg" style="white-space: nowrap; display: inline-block"
                                 viewBox="0 0 20 20" fill="currentColor" width="25" height="25">
                                <path fill-rule="evenodd"
                                      d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm3 2h6v4H7V5zm8 8v2h1v-2h-1zm-2-2H7v4h6v-4zm2 0h1V9h-1v2zm1-4V5h-1v2h1zM5 5v2H4V5h1zm0 4H4v2h1V9zm-1 4h1v2H4v-2z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span>{{ 'Add New Movie' }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <ul>
                <div class="flex flex-wrap">
                    @foreach($movies as $movie)
                        <div class="md:flex mb-10">
                            <div class="md:flex-shrink-0">
                                <img class="rounded-lg md:w-56" src="https://picsum.photos/id/{{ $movie->id }}/448/299"
                                     width="448" height="299"
                                     alt="This is the poster of {{ $movie->title }} movie.">
                            </div>

                            <div class="mt-4 md:mt-0 md:ml-6">
                                <div class="uppercase tracking-wide text-sm text-indigo-600 font-bold">
                                    <a href="{{ $movie->path }}">{{ $movie->title }}</a>
                                </div>
                                <p class="block mt-1 text-lg leading-tight font-semibold text-gray-900">{{ $movie->genre }}</p>
                                <p class="mt-2 text-gray-600">{{ $movie->description }}</p>

                                <div class="md:flex">
                                    <div class="mt-2 ml-4 items-center text-green-700">
                                        <a href="/movie/{{ $movie->id }}/edit"
                                           style="display: inline-block; white-space: nowrap; vertical-align: top">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 style="white-space: nowrap; display: inline-block" viewBox="0 0 20 20"
                                                 fill="currentColor" width="25" height="25">
                                                <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                            </svg>
                                            <span>{{ 'Edit' }}</span>
                                        </a>
                                    </div>

                                    <div class="mt-2 ml-4 items-center text-red-700">
                                        <form class="inline" method="post" action="{{ $movie -> path }}">
                                            @method ('DELETE')
                                            @csrf
                                            <button type="submit"
                                                    style="display: inline-block; white-space: nowrap; vertical-align: top">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     style="white-space: nowrap; display: inline-block"
                                                     viewBox="0 0 20 20" fill="currentColor" width="25" height="25">
                                                    <path fill-rule="evenodd"
                                                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                <span>{{ 'Delete' }}</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $movies -> links () }}
            </ul>
        </div>
    </main>
@endsection