@extends("layouts/home")
@section("content")
	@php
		$posts = App\Models\Post::select("posts.*", "users.name")->join("users", "posts.user_id", "=", "users.id")->paginate(5);
	@endphp
	@include("/post_pages/show_all")
@endsection

