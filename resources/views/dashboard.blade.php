@extends("layouts/app")
@section("content")
	@php
		$posts = App\Models\Post::where("user_id", auth()->user()->id)->orderBy("created_at", "desc")->paginate(5);
	@endphp
	@include("/post_pages/show_all")
@endsection
