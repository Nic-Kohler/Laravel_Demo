@if(auth()->user()->id == $user_id)
	@extends("layouts.app")
	@section("content")
		@php
		$label_style	= "block text-gray-500 font-bold float-right pr-4 align-top";
		$text_style		= "bg-gray-100 rounded w-1/3 text-gray-700 leading-tight focus:bg-white";
		$textarea_style	= "bg-gray-100 rounded w-auto text-gray-700 leading-tight focus:bg-white resize";
		$button_style	= "w-24 shadow bg-indigo-500 hover:bg-indigo-400 text-white font-bold py-2 px-4
						   rounded text-center cursor-pointer";
		$save_btn_attr	= [ "class" => $button_style, "name" => "action" ];
		$cancel_btn_attr= [ "class" => $button_style, "name" => "action" ];
		@endphp
		{!! Form::open(["action" => "PostPagesController@store", "method" => "post", "enctype" => "multipart/form-data", auth()->user()->id]) !!}
			{{ Form::token() }}
			<table class="table-auto" >
				<tr>
					<td class="pr-2 pb-2"> {{ Form::label("title", "Title", ["class" => $label_style]) }} </td>
					<td class="pr-2 pb-2"> {{ Form::text("title", "", ["class" => $text_style, "placeholer" => ""]) }} </td>
				</tr>
				<tr>
					<td class="pr-2 pb-2"> {{ Form::label("content", "Content", ["class" => $label_style]) }} </td>
					<td class="pr-2 pb-2"> {{ Form::textarea("content") }} </td>
				</tr>
				<tr>
					<td class="pr-2 pb-2"> {{ Form::label("cover_image", "Cover Image", [ "class" => $label_style ]) }} </td>
					<td class="pr-2 pb-2"> {{ Form::file("cover_image", [ "class" => $text_style ]) }} </td>
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
@endif
