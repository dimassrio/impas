@extends('layout.layout-master')

@section('body')
	<div id="index-content" class="min-height">
		<div class="row">
			<div class="large-4 columns">
				<h4>SIGN <light>IN</light></h4>
				<form action="{{url('login')}}" method="POST">
					<label for="username">USERNAME</label>
					<input type="text" name="username" id="username">
					<label for="password">PASSWORD</label>
					<input type="password" name="password" id="password">
					<div class="clearfix"><input type="submit" class="button right small"></div>
				</form>
				@if(Session::has('messages'))
				<div data-alert class="alert-box alert">
					{{Session::get('messages')}}
					<a href="#" class="close">&times;</a>
				</div>
				@endif
			</div>

			<div class="large-6 columns">
				<h1>IMPAS</h1>
				<h4><light>Learn English right from your computer,</light></h4>
				<h4>
					<light>right here, right now.</light>
				</h4>
			</div>
		</div>
	</div>
@stop