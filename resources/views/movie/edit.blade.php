@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            <div class="flex justify-between">
                <div class="text-4xl mb-8">
                    <h1>{{ __("Edit Movie") }}</h1>
                </div>
            </div>

            <form method="post" action="{{ $movie->path }}">
                @method ('PATCH')
                @csrf

                <div class="flex flex-wrap">
                    <div class="w-full">
                        <label class="block" for="name">
                            {{ __("Title") }}
                        </label>

                        <input class="block w-2/5 mt-2 @error ('title') border border-red-500 @enderror"
                               type="text" name="title" data-lpignore="true" autocomplete="off"
                               value="{{ $movie->title }}"/>

                        @error ('title')
                        <div class="alert-message text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap mt-8">
                    <div class="w-full">
                        <label class="block" for="name">
                            {{ __("Genre") }}
                        </label>

                        <input class="block w-2/5 mt-2 @error ('genre') border border-red-500 @enderror"
                               type="text" name="genre" data-lpignore="true" autocomplete="off"
                               value="{{ $movie->genre }}"/>

                        @error ('genre')
                        <div class="alert-message text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap mt-8">
                    <div class="w-full">
                        <label class="block" for="description">{{ __("Description") }}</label>

                        <textarea class="block w-8/12 mt-2 @error ('description') border border-red-500 @enderror"
                                  rows="10" name="description"
                                  placeholder="Movie's description">{{ $movie->description }}</textarea>

                        @error ('description')
                        <div class="alert-message text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap mt-8">
                    <div class="w-full">
                        <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit">{{ __("Save") }}</button>
                        <a href="/">
                            <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    type="button">{{ __("Cancel") }}</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
