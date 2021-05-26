	@php
	$label_style	= "block text-gray-500 font-bold float-right pr-4 align-top";
	$text_style		= "bg-gray-100 rounded w-1/3 text-gray-700 leading-tight focus:bg-white";
	$textarea_style	= "bg-gray-100 rounded w-auto text-gray-700 leading-tight focus:bg-white resize";
	$button_style	= "w-24 shadow bg-indigo-500 hover:bg-indigo-400 text-white font-bold py-2 px-4
					   rounded text-center cursor-pointer";
	$save_btn_attr	= [ "class" => $button_style, "name" => "action" ];
	$cancel_btn_attr= [ "class" => $button_style, "name" => "action" ];
	$name			= "Post: Edit";
@endphp
@extends("layouts.app")
@section("content")
	<script type="text/javascript">
		function change_image()
		{
			var current_image = document.getElementById("current_image");
			var select_image  = document.getElementById("select_image");

			current_image.style.display = "none";
			select_image.style.display  = "block";
		}
	</script>
	{!! Form::open([ "route" => [ "posts.update", $post->id], "method" => "post", "enctype" => "multipart/form-data" ]) !!}
		{{ Form::token() }}
		{{ method_field("PUT") }}
		<table class="table-auto" >
			<tr>
				<td class="pr-2 pb-2"> {{ Form::label("title", "Title", ["class" => $label_style]) }} </td>
				<td class="pr-2 pb-2"> {{ Form::text("title", $post->title, ["class" => $text_style, "placeholer" => ""]) }} </td>
			</tr>
			<tr>
				<td class="pr-2 pb-2"> {{ Form::label("content", "Content", ["class" => $label_style]) }} </td>
				<td class="pr-2 pb-2"> {{ Form::textarea("content", $post->content) }} </td>
			</tr>
			<tr>
				<td class="pr-2 pb-2"> {{ Form::label("cover_image", "Cover Image", [ "class" => $label_style ]) }} </td>
				<td class="pr-2 pb-2">
					<div id="current_image">
						<div class="w-48"> {{ Html::image($post->image_url) }} </div>
						<div class="{{ $button_style }} whitespace-nowrap w-48 mt-4" onclick="change_image()">Change Image</div>
					</div>
					<div id="select_image" style="display: none">
						{{ Form::file("cover_image", [ "class" => $text_style ]) }}
					</div>
				</td>
			</tr>
			<tr>
				<td class="pr-2 pb-2 pt-6"></td>
				<td class="pr-2 pb-2 pt-6 float-right"> {{ Form::submit("Cancel", $cancel_btn_attr) }} </td>
				<td class="pr-2 pb-2 pt-6 float-right"> {{ Form::submit("Save", $save_btn_attr) }} </td>
			</tr>
		</table>
	{!! Form::close() !!}
	<script>
		tinymce.init({
						selector: "#content",
						width: 900,
						height: 300,
						height: 300,
						skin: "oxide",
						statusbar: false,
						menubar: false,
						plugins: "link image code",
						toolbar: 'undo redo | styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code'
					});
	</script>
@endsection
