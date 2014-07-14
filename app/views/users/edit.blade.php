@extends('layout.layout-master')

@section('body')
	<div id="user-content" class="min-height section">
		<div class="row row-white">
			<div class="large-12 columns">
				<div class="row">
					<div class="large-12 columns">
						<h4>Register</h4>
						<hr/>
					</div>
				</div>
				<div class="row">
					<div class="large-6 columns">
					{{Form::open(array('url' => url('users').'/'.$user->id, 'method' => 'put'))}}
							<div class="row">
								<div class="large-3 columns">
									<label for="username" class="right inline">Username :</label>
									<label for="name" class="right inline">Name :</label>
									<label for="email" class="right inline">Email :</label>
								</div>
								<div class="large-9 columns">
									<input type="text" id="username" name="username" placeholder="{{$user->username}}">
									<input type="text" id="name" name="name" placeholder="{{$user->name}}">
									<input type="text" id="email" name="email" placeholder="{{$user->email}}">
									<input type="submit" class="button right small">
								</div>
							</div>
						{{Form::close()}}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop