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
                             alt="{{ __("This is the poster of :attribute movie.", ['attribute' => Translator::translate($movie->title)]) }}">
                    </div>

                    <div class="mt-4 md:mt-0 md:ml-20">
                        <div class="uppercase tracking-wide text-sm text-indigo-600 font-bold">
                            <p>{{ Translator::translate($movie->title) }}</p>
                        </div>
                        <p class="block mt-1 text-lg leading-tight font-semibold text-gray-900">{{ Translator::translate($movie->genre) }}</p>
                        <p class="mt-2 text-gray-600">{{ Translator::translate($movie->description) }}</p>

                        <div class="ml-4">
                            <div class="mt-2 flex items-center text.black">
                                <a href="{{ $movie->path('email') }}"
                                   style="display: inline-block; white-space: nowrap; vertical-align: top">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="white-space: nowrap; display: inline-block"
                                         viewBox="0 0 20 20" fill="currentColor" width="25" height="25">
                                        <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"/>
                                        <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"/>
                                    </svg>
                                    <span>{{ __("Email Details") }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10">
                <div class="text-2xl mb-8">
                    <h1>{{ __("Comments") }}</h1>
                </div>
                @include('partials._comment_replies', ['comments' => $movie->comments, 'movie_id' => $movie->id])
                <div class="mt-4">
                    <hr/>
                </div>
                <form method="post" action="{{ route('comment.add') }}">
                    @csrf
                    <div class="form-group mt-4">
                        <textarea type="text" name="comment_comment" class="form-control" rows="3" cols="40"></textarea>
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}"/>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                            {{ __("Add Comment") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
