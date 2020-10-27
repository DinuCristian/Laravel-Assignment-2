@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            <div class="flex justify-between">
                <div class="text-4xl mb-8">
                    <h1>{{ 'Add a Movie' }}</h1>
                </div>
            </div>

            <form method="post" action="/movie/">
                @csrf

                <div class="flex flex-wrap">
                    <div class="w-full">
                        <label class="block" for="name">
                            {{ 'Title' }}
                        </label>

                        <input class="block w-2/5 mt-2 @error ('title') border border-red-500 @enderror"
                               type="text" name="title" data-lpignore="true" autocomplete="off"
                               placeholder="{{ __("e.g. Titanic") }}"/>

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
                            {{ 'Genre' }}
                        </label>

                        <input class="block w-2/5 mt-2 @error ('genre') border border-red-500 @enderror"
                               type="text" name="genre" data-lpignore="true" autocomplete="off"
                               placeholder="{{ __("e.g. Drama") }}"/>

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
                                  rows="10"
                                  name="description"
                                  placeholder="{{ 'e.g. A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.' }}"></textarea>

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
                                type="submit">{{ 'Save' }}</button>
                        <a href="/">
                            <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    type="button">{{ 'Cancel' }}</button>
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </main>
@endsection
