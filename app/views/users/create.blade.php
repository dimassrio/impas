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
						<form action="{{url('users')}}" method="POST">
							<div class="row">
								<div class="large-3 columns">
									<label for="username" class="right inline">Username :</label>
									<label for="password" class="right inline">Password :</label>
									<label for="name" class="right inline">Name :</label>
									<label for="email" class="right inline">Email :</label>
								</div>
								<div class="large-9 columns">
									<input type="text" id="username" name="username">
									<input type="password" id="password" name="password">
									<input type="text" id="name" name="name">
									<input type="text" id="email" name="email">
									<input type="submit" class="button right small">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop