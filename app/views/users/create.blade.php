@extends('layout.layout-master')

@section('body')
	<div id="user-content" class="min-height section">
		<div class="row section-white">
			<div class="large-8 large-offset-2 columns">
				<div class="row">
					<div class="large-12 columns">
						<h2 class="text-center">REGISTER</h2>
						<hr/>
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<form action="{{url('users')}}" method="POST" data-parsley-validate>
							<div class="row">
								<div class="large-3 columns"><label for="username" class="right inline">Username :</label></div>
								<div class="large-9 columns"><input type="text" id="username" name="username" required data-parsley-minlength="6"></div>
							</div>
							<div class="row">
								<div class="large-3 columns"><label for="password" class="right inline">Password :</label></div>
								<div class="large-9 columns"><input type="password" id="password" name="password" required data-parsley-equalto="#password2"></div>
							</div>
							<div class="row">
								<div class="large-3 columns"><label for="password2" class="right inline">Password Confirmation :</label></div>
								<div class="large-9 columns"><input type="password" id="password2" name="password2" required></div>
							</div>
							<div class="row">
								<div class="large-3 columns"><label for="name" class="right inline">Name :</label></div>
								<div class="large-9 columns"><input type="text" id="name" name="name" required></div>
							</div>
							<div class="row">
								<div class="large-3 columns"><label for="email" class="right inline">Email :</label></div>
								<div class="large-9 columns"><input type="text" id="email" name="email" required data-parsley-trigger="change" data-parsley-type="email"></div>
							</div>
							<div class="row">
								<div class="large-3 columns"><label for="code" class="right inline">Identification Number :</label></div>
								<div class="large-9 columns"><input type="text" name="code" id="code"></div>
							</div>
							<div class="row">
								<div class="large-3 columns"><label for="classroom" class="right inline">Classroom :</label></div>
								<div class="large-9 columns"><select name="classroom" id="classroom"><option value="0">NO CLASSROOM</option></select></div>
							</div>
							<div class="row">
								<div class="large-3 columns"></div>
							</div>
							<div class="row">
								<div class="large-12 columns">
									<input type="submit" class="button right small" required>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop