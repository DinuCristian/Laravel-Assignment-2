@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            <div class="flex justify-between">
                <div class="text-4xl mb-8">
                    <h1>{{ __("All Movies") }}</h1>
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
                            <span>{{ __("Add New Movie") }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <form method="get" action="/search">
                @csrf
                <div class="grid md:grid-cols-3 md:gap-4">
                    <div class="flex justify-center md:justify-between">
                        <div class="mt-2">
                            <input class="h-10"
                                   type="text" name="title" data-lpignore="true" autocomplete="off" size="30"
                                   placeholder="  Search for a title"/>
                        </div>
                        <div class="">
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div>
                            <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
                            <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>

                            <style>
                                [x-cloak] {
                                    display: none;
                                }
                            </style>
                            <select x-cloak id="select">
                                <option value="" selected="selected">All genres</option>
                                @foreach($genres as $genre)
                                    <option value="{{$genre->genre}}">{{$genre->genre}}</option>
                                @endforeach
                            </select>

                            <div x-data="dropdown()" x-init="loadOptions()" class="w-full md:w-1/2 flex flex-col items-center mx-auto">
                                <form>
                                    <input name="genre" type="hidden" x-bind:value="selectedValues()">
                                    <div class="inline-block relative w-64">
                                        <div class="flex flex-col items-center relative">
                                            <div x-on:click="open" class="w-full  svelte-1l8159u">
                                                <div class="my-2 p-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
                                                    <div class="flex flex-auto flex-wrap">
                                                        <template x-for="(option,index) in selected" :key="options[option].value">
                                                            <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-blue-700 bg-blue-100 border border-blue-300 ">
                                                                <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="options[option]" x-text="options[option].text">
                                                            </div>
                                                            <div class="flex flex-auto flex-row-reverse">
                                                                <div x-on:click="remove(index,option)">
                                                                    <svg class="fill-current h-6 w-6 " role="button" viewBox="0 0 20 20">
                                                                        <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                           c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                           l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                           C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                                    </svg>

                                                                </div>
                                                            </div>
                                                    </div>
                                                    </template>
                                                    <div x-show="selected.length    == 0" class="flex-1">
                                                        <input placeholder="Select a option"
                                                               class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800"
                                                               x-bind:value="selectedValues()">
                                                    </div>
                                                </div>
                                                <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">
                                                    <button type="button" x-show="isOpen() === true" x-on:click="open" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                        <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                                            <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
	c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
	L17.418,6.109z" />
                                                        </svg>
                                                    </button>
                                                    <button type="button" x-show="isOpen() === false" @click="close" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                                            <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
	c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
	" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full px-4">
                                            <div x-show.transition.origin.top="isOpen()" class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj" x-on:click.away="close">
                                                <div class="flex flex-col w-full">
                                                    <template x-for="(option,index) in options" :key="option">
                                                        <div>
                                                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-blue-100" @click="select(index,$event)">
                                                                <div x-bind:class="option.selected ? 'border-blue-600' : ''" class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                                    <div class="w-full items-center flex">
                                                                        <div class="mx-2 leading-6" x-model="option" x-text="option.text">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

        <script>
            function dropdown() {
                return {
                    options: [],
                    selected: [],
                    show: false,
                    open() { this.show = true },
                    close() { this.show = false },
                    isOpen() { return this.show === true },
                    select(index, event) {

                        if (!this.options[index].selected) {

                            this.options[index].selected = true;
                            this.options[index].element = event.target;
                            this.selected.push(index);

                        } else {
                            this.selected.splice(this.selected.lastIndexOf(index), 1);
                            this.options[index].selected = false
                        }
                    },
                    remove(index, option) {
                        this.options[option].selected = false;
                        this.selected.splice(index, 1);


                    },
                    loadOptions() {
                        const options = document.getElementById('select').options;
                        for (let i = 0; i < options.length; i++) {
                            this.options.push({
                                value: options[i].value,
                                text: options[i].innerText,
                                selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                            });
                        }


                    },
                    selectedValues(){
                        return this.selected.map((option)=>{
                            return this.options[option].value;
                        })
                    }
                }
            }
        </script>
        </div>
        </div>

        <div class="flex justify-center md:justify-between">
            <div class="text-4xl mb-8">
            </div>
            <div class="mb-8 md:mt-2">
                <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        type="submit">
                    {{ __("Search") }}
                </button>
            </div>
        </div>
        </div>
        </form>

            <ul>
                <div class="flex flex-wrap">
                    @foreach($movies as $movie)
                        <div class="md:flex mb-10">
                            <div class="md:flex-shrink-0">
                                <img class="rounded-lg md:w-56" src="{{ $movie->imageUrl() }}"
                                     width="448" height="299"
                                     alt="{{ __("This is the poster of :attribute movie.", ['attribute' => $movie->title]) }}">
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
                                            <span>{{ __("Edit") }}</span>
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
                                                <span>{{ __("Delete") }}</span>
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
