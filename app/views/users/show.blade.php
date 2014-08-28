@extends('layout.layout-master')

@section('body')
<div id="users-view" class="min-height">
	<div class="row">
		<div class="large-8 large-offset-2 columns section">
			<h2 class="text-center">{{$user->name}}</h2>
			
		</div>
	</div>
</div>
@stop