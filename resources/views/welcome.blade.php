<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        {{-- tailwind --}}
        @vite('resources/css/app.css')
        {{-- font awesome --}}
        @vite('node_modules/@fortawesome/fontawesome-free/css/fontawesome.css')
        @vite('node_modules/@fortawesome/fontawesome-free/css/solid.min.css')
        {{-- jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="crossorigin="anonymous"></script>
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900 dark:text-white">
        <div class="relative max-w-6xl mx-auto min-h-screen px-3 py-2 bg-gray-100 dark:bg-gray-900">
            
            <div class="flex justify-between">
                <div>
                    <p class="dark:text-white">EscuchaMexico</p>
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
        </script>
    </body>
</html>
