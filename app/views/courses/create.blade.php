@extends('layout.layout-master')

@section('body')
	<div id="courses-create-content" class="min-height">
		<div class="row row-white section">
			<div class="large-12 columns">
				<div class="row section">
					<div class="large-6 columns large-offset-3">
						<form action="{{url('courses')}}" method="POST" enctype="multipart/form-data">
						<h4>REGISTERING NEW COURSE</h4>
							<label for="name">COURSE NAME</label>
							<input type="text" id="name" name="name">
							<label for="description">DESCRIPTION</label>
							<textarea id="description" name="description"></textarea>
							<label for="image">IMAGE</label>
							<input type="file" id="image" name="image">
							<input type="submit" class="button right small">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop