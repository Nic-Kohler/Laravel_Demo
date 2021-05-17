@if(count($errors) || session("success") || session("error"))
	<div class="mt-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					@if(count($errors))
						@foreach($errors->all() as $error)
							<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-2" role="alert">
								<p><span class="font-bold">Be Warned:</span> {{ $error }}</p>
							</div>
						@endforeach
					@endif
					
					@if(session("success"))
						<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
							<p><span class="font-bold">Session Information: </span><span class="text-sm">{{ session("success") }}</span></p>
						</div>
					@endif
					
					@if(session("error"))
						<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
							<p class="font-bold">Session Warning</p>
							<p>{{ session("error") }}</p>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@endif
