<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>{{ str_replace("_", " ", config("app.name")) }}</title>

		<!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

		<!-- Styles -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>
	</head>
	<body class="antialiased">
		<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
			@if (Route::has('login'))
				<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
					@auth
						<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
					@else
						<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

						@if(Route::has('register'))
							<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
						@endif
					@endauth
				</div>
			@endif
		</div>
		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						<div class="pl-20 pb-20 italic font-bold text-gray-700 text-5xl">
							<a href="/">{{ str_replace("_", " ", config("app.name")) }}</a>
						</div>
						
						@yield("content")
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
