@php
	if(Auth::check()) $layout = "layouts/app"; else $layout = "layouts/home";
	$name = "Post: Display";
@endphp
@extends($layout)
@section("content")
	<div class="shadow p-4 mb-8">
		<table class="flex w-auto">
			<tr>
				<td class="w-3/4 align-top align-top pl-8 pb-2 text-gray-700 font-bold text-2xl">
					{{ $post->title }}
				</td>
				<td class="w-1/4">
					@if(Auth::check() && auth()->user()->id == $post->user_id)
						<div class="flex justify-end pb-2 text-gray-700">
							<!-- Edit Icon -->
							<a href={{ route("posts.edit", ["post" => $post->id]) }} class="bg-transparent hover:bg-blue-200 rounded-full p-2 mr-1">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
								</svg>
							</a>
							<!-- Delete Icon -->
							<form action={{ route("posts.destroy", ["post" => $post->id]) }} method="post">
								{{ Form::token() }}
								{{ method_field("DELETE") }}
								<button type="submit" class="bg-transparent hover:bg-red-200 rounded-full p-2">
									<svg xmlns="http://www.w3.org/2000/svg"
										 class="h-6 w-6" fill="none"
										 viewBox="0 0 24 24"
										 stroke="currentColor">
										<path stroke-linecap="round"
											  stroke-linejoin="round"
											  stroke-width="2"
											  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
									</svg>
								</button>
							</form>
						</div>
					@endif
				</td>
			</tr>
			<tr>
				<td class="pl-8 pb-4" colspan="2">
					<div class="flex w-full content-center">
						{{ Html::image($post->image_url, "", ["class" => "mx-auto"]) }}
					</div>
				</td>
			</tr>
			<tr>
				<td class="pl-8 pb-4 text-gray-600" colspan="2">
					{{ $post->get_content_html() }}
				</td>
			</tr>
		</table>
	</div>
@endsection
