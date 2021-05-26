<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>{{ str_replace("_", " ", config('app.name')) }}</title>

		<!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

		<!-- Styles -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>
		<script src="{{ asset("node_modules/tinymce/tinymce.js") }}"></script>
	</head>
	<body class="font-sans antialiased">
		<div class="min-h-screen bg-gray-100">
			@include("layouts/navigation")

			<!-- Page Heading -->
			<div class="bg-white shadow">
				<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
					<h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
						{{ $name }}
					</h2>
					<a class="w-auto shadow bg-indigo-500 hover:bg-indigo-400 text-white py-2 px-4 rounded float-right font-bold"
						href="/posts/create" role="button">+ New Post</a>
				</div>
			</div>

			<!-- Alert Messages -->
			@include("layouts/messages")

			<!-- Page Content -->
			<div class="py-12">
				<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
					<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
						<div class="p-6 bg-white border-b border-gray-200">
							@yield("content")
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
