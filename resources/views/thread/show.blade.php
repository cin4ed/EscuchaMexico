<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Laravel</title>
	@vite('resources/css/app.css')
	{{-- font awesome icons --}}
  @vite('node_modules/@fortawesome/fontawesome-free/css/fontawesome.css')
	@vite('node_modules/@fortawesome/fontawesome-free/css/solid.min.css')
	@vite('node_modules/@fortawesome/fontawesome-free/css/regular.min.css')
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="crossorigin="anonymous"></script>
</head>
<body class="antialiased bg-primary-500">
  <div style="background-image: url(/images/bg-quetzal.svg)">
		<x-header/>
		<div class="realtive max-w-6xl mx-auto min-h-screen px-3 py-2">
			<div class="grid grid-cols-5 gap-4 mt-4">
				{{-- sidebar --}}
				<div>
					{{-- user resume --}}
					<div class="rounded-md overflow-hidden bg-white">
						<div class="text-center p-3 bg-neutral-200">
							<p class="font-semibold text-neutral-600">{{ __('Autor') }}
						</div>
						<div class="flex justify-center py-4">
							<img class="rounded-sm" src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim( $thread->user->email ) ) ) }}?s=100">
						</div>
						<div class="flex flex-col items center border-3 p-2 text-center bg-neutral-200">
							<p class="text-neutral-700">{{ $thread->user->name }}</p>
							<p class="text-neutral-700">Hilos: {{ count($thread->user->threads) }}</p>
						</div>
					</div>
					{{-- voting section --}}
					<div class="mt-4 rounded-md overflow-hidden bg-white ">
						<div class="text-center py-2 hover:cursor-pointer bg-neutral-200 hover:bg-neutral-300"><i class="fa-solid fa-arrow-up text-neutral-600"></i></div>
						<div class="text-center py-4"><p class="text-neutral-700">14</p></div>
						<div class="text-center py-2 hover:cursor-pointer bg-neutral-200 hover:bg-neutral-300"><i class="fa-solid fa-arrow-down text-neutral-600"></i></div>
					</div>
				</div>
				{{-- thread --}}
				<div class="relative col-span-4 self-start">
					<div class="rounded-md shadow-md overflow-hidden bg-white">
						<div class="flex justify-between items-center py-4 px-6 bg-neutral-200">
							<h1 class="text-xl font-bold font-secondary text-neutral-600">{{ $thread->title }}</h1>
							<span class="text-sm text-neutral-500">{{ $thread->created_at->format('j M Y, g:i a') }}</span>
						</div>
						<div class="py-4 px-6 pb-8">
							<p>{{ $thread->message }}</p>
						</div>
					</div>
					<div class="absolute right-4 -bottom-4 rounded-md text-neutral-500 bg-neutral-200 overflow-hidden flex items-center">
						<span class="px-4 py-1 hover:cursor-pointer hover:bg-neutral-300"><i class="fa-regular fa-comment mr-2"></i><span class="text-sm">reply</span></span>
						<span class="mx-1">|</span>
						<span class="px-4 py-1 hover:cursor-pointer hover:bg-neutral-300"><i class="fa-solid fa-share mr-2"></i><span class="text-sm">share</span></span>
						<span class="mx-1">|</span>
						<span class="px-4 py-1 hover:cursor-pointer hover:bg-neutral-300"><i class="fa-solid fa-flag mr-2"></i><span class="text-sm">report</span></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
