<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        {{-- tailwind --}}
        @vite('resources/css/app.css')
        {{-- font awesome --}}
        @vite('node_modules/@fortawesome/fontawesome-free/css/fontawesome.css')
        @vite('node_modules/@fortawesome/fontawesome-free/css/solid.min.css')
        {{-- jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="crossorigin="anonymous"></script>
    </head>
    <body class="antialiased bg-primary-500">
        <div style="background-image: url(/images/bg-quetzal.svg)">
            <div class="relative max-w-6xl mx-auto min-h-screen px-3 py-2">
                {{-- nav --}}
                <div class="flex justify-between">
                    <div>
                        <p class="text-xl text-white">escuchamexico</p>
                    </div>
                    <div>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm py-1 px-3 rounded-sm bg-gray-200 hover:bg-gray-300 text-gray-800">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm py-1 px-3 rounded-sm bg-gray-200 hover:bg-gray-300 text-gray-800">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm py-1 px-3 rounded-sm bg-gray-200 hover:bg-gray-300 text-gray-800">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>

            @auth
            <div class="mt-4">
                <h1 class="text-xl font-semibold">{{ __('Crea un hilo') }}</h1>
                <div class="mt-1">
                    <form method="POST" action="{{ route('threads.store') }}" class="text-black">
                        @csrf
                        <div class="flex justify-between gap-1">
                            <div class="relative flex-1">
                                <textarea
                                    name="title"
                                    id="form-title"
                                    placeholder="{{ __('Título') }}"
                                    rows="1" maxlength="300" required
                                    class="w-full resize-none border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm overflow-x-hidden pr-20"
                                ></textarea>
                                <div class="absolute right-3 bottom-[17px] text-gray-400 text-sm"><span id="character-counter">0</span>/300</div>
                            </div>
                            <select name="state" class="h-[42px] text-gray-600 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                @foreach ($states as $state)
                                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <textarea
                            name="message"
                            placeholder="{{ __('¿Qué quieres decir?') }}"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        >{{ old('message') }}</textarea>
                        {{-- <x-input-error :messages="$errors->get('message')" class="mt-2" /> --}}
                        <button class="py-2 px-4 rounded-md w-full mt-2 shadow-sm bg-slate-800 text-white" type="submit">{{ __('Enviar') }}</button>
                    </form>
                </div>
            </div>
            @endauth

            <div class="mt-4">
                <h1 class="text-xl font-semibold">{{ __('Hilos') }}</h1>
                <div class="flex flex-col mt-2 gap-3">
                    @foreach ($threads as $thread)
                        <div class="p-4 rounded-md shadow-sm cursor-pointer hover:shadow-md bg-white dark:bg-slate-600">
                            <h1 class="text-lg font-semibold">{{ $thread->title }}</h1>
                            <p class="mt-2">{{ $thread->message }}</p>
                @endauth
                {{-- Threads --}}
                <div class="mt-8 mb-4">
                    <h1 class="text-xl font-semibold text-white mb-8">{{ __('Hilos') }}</h1>
                    <div class="flex flex-col mt-2 gap-8">
                        @foreach ($threads as $thread)
                        <div class="relative thread" data-redirect-url="{{ url("/threads/{$thread->id}") }}">
                            <img class="absolute -left-8 -top-5 rounded-md" src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($thread->user->email))) }}?s=55" alt="">
                            <div class="flex flex-col rounded-md overflow-hidden">
                                <div class="px-8 py-5 flex justify-between bg-gray-200 text-gray-800">
                                    <div class="flex gap-5">
                                        <p>{{ $thread->user->name }} - {{ $thread->state }}</p>
                                    </div>
                                    <div>
                                        <p>{{ $thread->created_at->format('j M Y, g:i a') }}</p>
                                    </div>
                                </div>
                                <div class="px-8 py-6 bg-white">
                                    <h1 class="text-xl font-semibold">{{ $thread->title }}</h1>
                                    <p class="mt-4 whitespace-pre">{{ $thread->message }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            // Update title character counter
            $("#form-title").on("input", function() {
                $("#character-counter").text($(this).val().length);
            });
						
						$(".thread").click(function() {
							window.location.href = $(this).data("redirect-url");
						});
        </script>
    </body>
</html>
