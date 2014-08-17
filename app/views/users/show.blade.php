@extends('layout.layout-master')

@section('body')
<div id="users-view" class="min-height">
	<div class="row">
		<div class="large-8 large-offset-2 columns section">
			<h2 class="text-center">{{$user->name}}</h2>
			<h3>List of Files Uploaded</h3>
			<ul>
			@foreach($files as $key => $file)
				@if($file->type == 'audio')
					<audio src="{{asset($file->url)}}" preload="auto" />
				@endif
			@endforeach
			</ul>
		</div>
	</div>
</div>
@stop